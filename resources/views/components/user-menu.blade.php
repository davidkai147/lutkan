<li class="nav-item">
    <a href="{{ route('user.home') }}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item" data-permission="READ_USERS" style="display: none">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Users
        </p>
    </a>
</li>
<li class="nav-item" data-permission="READ_ROLES" style="display: none">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Roles
        </p>
    </a>
</li>
<li class="nav-item" data-permission="READ_PERMISSIONS" style="display: none">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Permissions
        </p>
    </a>
</li>
<li class="nav-item menu_projects" data-permission="READ_PROJECTS" style="display: none">
    <a href="{{ route('user.projects', ['token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sdXRrYW4uY29tXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6MTU4ODE3NzU0OSwiZXhwIjoxNTg4MTgxMTQ5LCJuYmYiOjE1ODgxNzc1NDksImp0aSI6ImNiQk53cGpYMTFkYWdEc0wiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJ0cGUiOiJ1c2VyIn0.JQZFa01Kt30O0Ua8q2RFmUoID2MRAdymcA-9H0OI-nY']) }}" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Projects
        </p>
    </a>
</li>
<li class="nav-item menu_milestones" data-permission="READ_MILESTONES" style="display: none">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Milestones
        </p>
    </a>
</li>
<li class="nav-item menu_project_categories" data-permission="READ_PROJECT_CATEGORIES" style="display: none">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Project categories
        </p>
    </a>
</li>
<li class="nav-item menu_task_types" data-permission="READ_TASK_TYPES" style="display: none">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Task types
        </p>
    </a>
</li>
<li class="nav-item menu_settings">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Settings
        </p>
    </a>
</li>
