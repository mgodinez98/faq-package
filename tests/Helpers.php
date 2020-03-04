<?php

function createPost($user, $category_id)
{
    $data = [];
    $data['title'] = 'Titulo fake';
    $data['slug'] = Str::slug($data['title']);
    $data['active'] = 1;
    $data['body'] = 'Body fake';
    $data['category'] = $category_id;

    $post = $user->posts()->create($data);
    $post->categories()->attach($data['category']);

    return $post;
}