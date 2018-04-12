<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class , 4)->create();
        
        DB::table('users') -> insert([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$YB0ah3.iqVhguJzfDgclPecUonG1JmY9rlmM1yNp8wC8yUJnxiKoK',
            'path' => '/storage/images/img_898525accb508ba3198.85973614.jpeg' , 
            'role_id' => 2,
            'address' => 'Bonn', 
        ]);
    }
}
