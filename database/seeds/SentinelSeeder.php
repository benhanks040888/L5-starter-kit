<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class SentinelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::registerAndActivate(array(
          // 'username'    => 'admin',
          'email'       => 'admin@app.com',
          'password'    => '123456',
          'first_name'  => 'Admin',
          'last_name'   => 'App'
        ));

        $admin_role = Sentinel::getRoleRepository()->createModel()->create(array(
          'name'        => 'Admin',
          'slug'        => 'admin',
          'permissions' => array(
            'admin'     => 1,
            'users'     => 1,
          )
        ));

        $user_role = Sentinel::getRoleRepository()->createModel()->create(array(
          'name'        => 'Users',
          'slug'        => 'user',
          'permissions' => array(
            'admin'     => 0,
            'users'     => 1,
          )
        ));

        // Assign user permissions
        $credentials = [
          'login' => 'admin@app.com',
        ];

        $admin_user  = Sentinel::findUserByCredentials($credentials);
        $admin_role = Sentinel::findRoleBySlug('admin');
        $admin_role->users()->attach($admin_user);
    }
}
