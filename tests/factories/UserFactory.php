<?php

use JaopMX\FaqPackage\Models\Category;
use JaopMX\FaqPackage\Models\Post;
use JaopMX\FaqPackage\Tests\User;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker){
    $name = $faker->realText(25);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'description' => $faker->text()
    ];
});

$factory->define(Post::class, function (Faker $faker){
    $author = factory(User::class)->create();

    $title = $faker->realText(25);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(),
        'active' => 1,
        'author_id' => $author->id,
        'author_type' => get_class($author)
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
