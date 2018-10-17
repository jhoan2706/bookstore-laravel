<?php

use Illuminate\Database\Seeder;
use Prueba\Role;
use Prueba\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user= Role::where('name','user')->first();
        $role_admin= Role::where('name','admin')->first();
        
        $user=new User();
        $user->name="User";
        $user->email="user@email.com";
        $user->password= bcrypt('query');
        $user->save();        
        $user->roles()->attach($role_user);
        
        $user=new User();
        $user->name="Admin";
        $user->email="admin@email.com";
        $user->password= bcrypt('query');
        $user->save();        
        $user->roles()->attach($role_admin);
        
        $user=new User();
        $user->name="site_admin";
        $user->email="gonzalo2706@gmail.com";
        $user->password= bcrypt("phpdeveloper");
        $user->save();
        $user->roles()->attach($role_admin);
        
    }
}
