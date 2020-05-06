<template>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item" :data-permission="item.name" v-for="item in permissions" :key="item.name">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{ item.name }}
                </p>
            </a>
        </li>
        <li class="nav-item" data-permission="READ_USERS">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item" data-permission="READ_ROLES">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Roles
                </p>
            </a>
        </li>
        <li class="nav-item" data-permission="READ_PERMISSIONS">
            <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Permissions
                </p>
            </a>
        </li>
        <li class="nav-item menu_projects" data-permission="READ_PROJECTS">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Projects
                </p>
            </a>
        </li>
        <li class="nav-item menu_milestones" data-permission="READ_MILESTONES">
            <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Milestones
                </p>
            </a>
        </li>
        <li class="nav-item menu_project_categories" data-permission="READ_PROJECT_CATEGORIES">
            <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Project categories
                </p>
            </a>
        </li>
        <li class="nav-item menu_task_types" data-permission="READ_TASK_TYPES">
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
    </ul>
</template>

<script>
    import store from '../store'
    export default {
        name: "UserMenu",
        data() {
            return {
                permissions: ''
            }
        },
        created() {
            // Show hide menus based on role & permissions
            this.permissions = store.getters['auth/currentUser'].roles[0].permissions.filter(item => item.name.indexOf('READ_') >= 0);
        }
    }
</script>
