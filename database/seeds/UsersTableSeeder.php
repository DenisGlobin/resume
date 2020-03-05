<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Denis_Gl',
            'email' => 'globin.denis@gmail.com',
            'skype' => 'denis_gl2',
            'age' => 31,
            'location' => 'Berdyansk, Ukraine',
            'about' => 'I am a beginner web developer. I am looking for a job as a junior beck-end or full-stack programmer. I specialize in the development of sites using the Laravel and Vue.js. I wish to work in a team to gain professional experience.',
            'password' => Hash::make('password'),
        ]);
    }
}
