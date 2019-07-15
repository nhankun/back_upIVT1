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
        $currentTime=date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'HoVanNhanabc',
                'email'=>'hovannhan.php@gmail.com',
                'password'=>bcrypt('123123123'),
                'user_type'=>0,
                'active'=>1,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
        ]);
    }
}
