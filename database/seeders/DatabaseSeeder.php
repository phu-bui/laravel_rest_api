<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\NotiTemplate::factory()->create([
            'type' => 'Noti A',
            'template' => "<!DOCTYPE html>
        <html>
        <head>
            <title>StartBlog.com</title>
        </head>
        <body>
            <h1>Modyfi</h1>
            <p>Body</p>
            
            <p>Thank you</p>
        </body>
        </html>
        ",
        ]);
    }
}
