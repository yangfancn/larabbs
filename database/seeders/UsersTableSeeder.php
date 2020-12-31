<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->count(10)->create();
        $user = User::first();
        $user->name = 'YangFan';
        $user->email = 'yf244190857@gmail.com';
        $user->password =  bcrypt('19950930');
        $user->avatar = "http://bbs.cc/uploads/images/avatars/202012/30/1_1609325971_58bErx12bj.jpg";
        $user->save();
    }
}
