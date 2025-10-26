<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PostSeeder::class,
        ]);

        // ::create()
        // ->save()
        // ::insert()

        // $record = DB::table('posts')->select([
        //     'id',
        //     'title',
        //     'content'
        // ])
        //     ->where('id', '=', 1)
        //     ->first(); // LIMIT 1

        // $record = Post::select('id', 'title', 'content')
        //     ->whereId(1) // =
        //     // ->whereNotNull('status')
        //     ->where('user_id', '=', 5)
        //     ->orWhere('user_id', '=', 6)

        // ->where(function ($query) {
        //     $query->where('title', 'test')
        //         ->where(function ($query) {
        //             $query->where('content', 'like', '%hello%')
        //                 ->orWhere('content', 'like', '%world%');
        //         });
        // })

        // ->toSql();
        // ->get()
        // ->toArray();

        // $record = DB::select('select * from posts where id = 1');
        // DB::update('update posts set title = ? where id = ?', [
        //     'Updated Title',
        //     1
        // ]);

        // dd($record);
    }
}
