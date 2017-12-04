<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'     => 'SNS_admin',
            'username' => str_slug('SNS Admin'),
            'email'    => 'admin@sns.com',
            'password' => bcrypt('admin@sns')
        ]);
    }
}
