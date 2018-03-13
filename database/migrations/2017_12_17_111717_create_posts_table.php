<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        DB::statement('CREATE TABLE IF NOT EXISTS `posts` (
                      id INT UNSIGNED  AUTO_INCREMENT,
                      title VARCHAR(20) NOT NULL ,
                      body VARCHAR(255) NOT NULL ,
                      `created_at` timestamp NULL DEFAULT NULL,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      `type` ENUM(\'php\', \'java\', \'javascript\', \'ruby\'),
                       primary key(id)
                      
                      )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
    }

    public function down()
    {
        DB::statement('DROP TABLE IF EXISTS `posts`');
    }
}
