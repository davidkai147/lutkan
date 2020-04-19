<?php

use App\Constants\AppConstants;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Projects
        Permission::create(['name' => AppConstants::CREATE_PROJECTS]);
        Permission::create(['name' => AppConstants::READ_PROJECTS]);
        Permission::create(['name' => AppConstants::UPDATE_PROJECTS]);
        Permission::create(['name' => AppConstants::DELETE_PROJECTS]);

        // Milestones
        Permission::create(['name' => AppConstants::CREATE_MILESTONES]);
        Permission::create(['name' => AppConstants::READ_MILESTONES]);
        Permission::create(['name' => AppConstants::UPDATE_MILESTONES]);
        Permission::create(['name' => AppConstants::DELETE_MILESTONES]);

        // Tasks
        Permission::create(['name' => AppConstants::CREATE_TASKS]);
        Permission::create(['name' => AppConstants::READ_TASKS]);
        Permission::create(['name' => AppConstants::UPDATE_TASKS]);
        Permission::create(['name' => AppConstants::DELETE_TASKS]);

        // Task types
        Permission::create(['name' => AppConstants::CREATE_TASK_TYPES]);
        Permission::create(['name' => AppConstants::READ_TASK_TYPES]);
        Permission::create(['name' => AppConstants::UPDATE_TASK_TYPES]);
        Permission::create(['name' => AppConstants::DELETE_TASK_TYPES]);

        // Project task categories
        Permission::create(['name' => AppConstants::CREATE_PROJECT_TASK_CATEGORIES]);
        Permission::create(['name' => AppConstants::READ_PROJECT_TASK_CATEGORIES]);
        Permission::create(['name' => AppConstants::UPDATE_PROJECT_TASK_CATEGORIES]);
        Permission::create(['name' => AppConstants::DELETE_PROJECT_TASK_CATEGORIES]);

        // Users
        Permission::create(['name' => AppConstants::CREATE_USERS]);
        Permission::create(['name' => AppConstants::READ_USERS]);
        Permission::create(['name' => AppConstants::UPDATE_USERS]);
        Permission::create(['name' => AppConstants::DELETE_USERS]);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => AppConstants::ROLE_PROJECT_MANAGER]);
        $role->givePermissionTo([
            AppConstants::CREATE_PROJECTS, AppConstants::READ_PROJECTS, AppConstants::UPDATE_PROJECTS, AppConstants::DELETE_PROJECTS,
            AppConstants::CREATE_USERS, AppConstants::READ_USERS, AppConstants::UPDATE_USERS, AppConstants::DELETE_USERS,
            AppConstants::CREATE_MILESTONES, AppConstants::READ_MILESTONES, AppConstants::UPDATE_MILESTONES, AppConstants::DELETE_MILESTONES,
            AppConstants::CREATE_TASKS, AppConstants::READ_TASKS, AppConstants::UPDATE_TASKS, AppConstants::DELETE_TASKS,
            AppConstants::CREATE_TASK_TYPES, AppConstants::READ_TASK_TYPES, AppConstants::UPDATE_TASK_TYPES, AppConstants::DELETE_TASK_TYPES,
            AppConstants::CREATE_PROJECT_TASK_CATEGORIES, AppConstants::READ_PROJECT_TASK_CATEGORIES, AppConstants::UPDATE_PROJECT_TASK_CATEGORIES, AppConstants::DELETE_PROJECT_TASK_CATEGORIES,
        ]);
//
//        // or may be done by chaining
//        $role = Role::create(['name' => 'moderator'])
//            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => AppConstants::ROLE_SUPER_ADMIN]);
        $role->givePermissionTo(Permission::all());
    }
}
