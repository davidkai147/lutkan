<?php

use App\Constants\AppConstants;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        $user->assignRole(AppConstants::ROLE_SUPER_ADMIN);

        $user2 = User::create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'account_type' => 'user',
            'status' => 'active',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $user2->assignRole(AppConstants::ROLE_PROJECT_MANAGER);
    }
}
