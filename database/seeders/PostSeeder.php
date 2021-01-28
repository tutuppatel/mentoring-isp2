<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
        [
            'user_id' => '1',
            'title' => 'Laravel Installation',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '2',
            'title' => 'Food Sustainability',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '3',
            'title' => 'Database Schemas',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '4',
            'title' => 'Do we need more international diplomats',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '5',
            'title' => 'Website Application Development Tools',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '5',
            'title' => 'Financial Data Analysis Tools',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '1',
            'title' => 'Debugging a Heroku application on production',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '2',
            'title' => 'Food Sustainability',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ],
        [
            'user_id' => '1',
            'title' => 'Bioterrorism',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'status' => 'published',
        ]
        ];

        foreach($posts as $post)
          {
              Post::create([
               'user_id' => $post['user_id'],
               'title' => $post['title'],
               'detail' => $post['detail'],
               'status' => $post['status'],
             ]);
           }
    }
}