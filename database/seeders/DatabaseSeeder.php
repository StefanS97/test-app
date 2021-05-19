<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Name',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'password' => bcrypt('88888888'),
            ],
            [
                'name' => 'User Name',
                'email' => 'user@user.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'password' => bcrypt('88888888'),
            ],
        ]);
        DB::table('posts')->insert([
            [
                'name' => 'Post 1',
                'user_id' => '1',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis architecto quo vel totam laudantium unde excepturi aperiam mollitia hic dolores.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Post 2',
                'user_id' => '2',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis architecto quo vel totam laudantium unde excepturi aperiam mollitia hic dolores.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::table('comments')->insert([
            [
                'user_id' => '1',
                'post_id' => '2',
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis architecto quo vel totam laudantium unde excepturi aperiam mollitia hic dolores.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '2',
                'post_id' => '1',
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis architecto quo vel totam laudantium unde excepturi aperiam mollitia hic dolores.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
