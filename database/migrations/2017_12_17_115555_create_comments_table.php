<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        DB::statement('CREATE TABLE IF NOT EXISTS `comments` (
                      id INT UNSIGNED  AUTO_INCREMENT,
                      `value` VARCHAR(255) NOT NULL ,
                      post_id INT unsigned NOT NULL ,
                      `created_at` timestamp NULL DEFAULT NULL,
                      `updated_at` timestamp NULL DEFAULT NULL,
                       primary key(id),
                       FOREIGN KEY(post_id) REFERENCES posts(id) ON DELETE CASCADE ON UPDATE CASCADE
                      
                      )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
    }

    public function down()
    {
        DB::statement('DROP TABLE IF EXISTS `posts`');
    }
}
