<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        /* User::truncate(); */

        /* $user = User::create([ */
        /*     'name' => 'ali', */
        /*     'email' => 'alikaram@gmail.com', */
        /*     'password' => Hash::make('alikaram98'), */
        /* ]); */

        /* event(new Registered($user)); */

        /* Auth::login($user); */

        /* return redirect(RouteServiceProvider::HOME); */
    }
}
