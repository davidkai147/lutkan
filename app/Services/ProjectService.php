<?php


namespace App\Services;

use App\Models\ProjectModel;

class ProjectService
{
    public function __construct()
    {
        $this->model = new ProjectModel();
    }

    public function list()
    {

    }
}
