<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();

        $userIds = User::pluck('id');

        $userIds->each(function ($userId) {
            Profile::factory(1)->create([
                'user_id' => $userId
            ]);
        });
    }
}
