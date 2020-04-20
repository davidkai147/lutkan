<?php


namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Arr;

class RepoServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo-service {name} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tao repository service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository & Service';

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/interface.plain.stub';
    }

    /**
     * @return string
     */
    protected function getRepoStub()
    {
        return __DIR__ . '/stubs/repository.plain.stub';
    }

    /**
     * @return string
     */
    protected function getServiceStub()
    {
        return __DIR__ . '/stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultServiceNamespace()
    {
        return $this->rootNamespace() . '\Services';
    }

    protected function buildClass($name)
    {
        $repositoryNamespace = $this->getNamespace($name);

        $replace = [];

        $replace["use {$repositoryNamespace}\Repositories;\n"] = '';

        $replace["dummy"] = lcfirst($this->getNameInput());
        $replace["Dummy"] = ucfirst($this->getNameInput());

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

    protected function buildRepositoryClass($name)
    {
        $stub = $this->files->get($this->getRepoStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function buildServiceClass($name)
    {
        $stub = $this->files->get($this->getServiceStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param string $name
     * @return string
     */
    protected function buildRepository($name)
    {
        $replace = [];

        $replace["Dummy"] = ucfirst($this->getNameInput());

        return str_replace(
            array_keys($replace), array_values($replace), $this->buildRepositoryClass($name)
        );
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param string $name
     * @return string
     */
    protected function buildService($name)
    {
        $replace = [];

        $replace["Dummy"] = ucfirst($this->getNameInput());
        $replace["dummy"] = lcfirst($this->getNameInput());

        return str_replace(
            array_keys($replace), array_values($replace), $this->buildServiceClass($name)
        );
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $inputName = $this->getNameInput();
        $name = $this->qualifyClass($inputName . "/" . $inputName) . 'RepositoryInterface';
        $repoName = $this->qualifyClass($inputName . "/" . $inputName) . 'Repository';
        $serviceName = $this->getDefaultServiceNamespace() . "/" . $inputName . "/" . $inputName . 'Service';

        $path = $this->getPath($name);
        $repoPath = $this->getPath($repoName);
        $servicePath = $this->getPath($serviceName);
        //$route_path = $this->getPathRoute(Arr::last(explode('/',$this->getNameInput())));

        // First we will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($inputName. 'RepositoryInterface')) {
            $this->error($inputName . ' repository interface already exists!');

            return false;
        }

        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($inputName. 'Repository')) {
            $this->error($inputName . ' repository already exists!');

            return false;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);
        $this->makeDirectory($servicePath);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));
        $this->files->put($repoPath, $this->sortImports($this->buildRepository($name)));
        $this->files->put($servicePath, $this->sortImports($this->buildService($name)));

        $info = '';
        $info .= $this->type . " created successfully.\n";
        $info .= "Vui long copy doan sau va paste vao AppServiceProvider.php -> register()\n";
        $info .= "\App\Repositories\\{$inputName}\\{$inputName}RepositoryInterface::class,\n\App\Repositories\\{$inputName}\\{$inputName}Repository::class";
        $this->info($info);
    }

}
