<?php

use Illuminate\Database\Seeder;
use Bookstore\Role;
use Bookstore\User;
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
        $user->name="site_admin";
        $user->email="gonzalo2706@gmail.com";
        $user->password= bcrypt("phpdeveloper");
        $user->save();
        /* $user=User::where('email','user2@gmail.com')->first(); */
        $user->roles()->attach($role_admin);
        
    }
}
