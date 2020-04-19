<li class="nav-item">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
@can($permission::READ_USERS)
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Users
        </p>
    </a>
</li>
@endcan
@can($permission::UPDATE_USERS)
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Permissions
        </p>
    </a>
</li>
@endcan
@can($permission::READ_PROJECTS)
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Projects
        </p>
    </a>
</li>
@endcan
@can($permission::READ_MILESTONES)
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Milestones
        </p>
    </a>
</li>
@endcan
@can($permission::READ_PROJECT_TASK_CATEGORIES)
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Project categories
        </p>
    </a>
</li>
@endcan
@can($permission::READ_TASK_TYPES)
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Task types
        </p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>
            Settings
        </p>
    </a>
</li>
