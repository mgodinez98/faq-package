<?php

namespace JaopMX\FaqPackage\Traits;

use JaopMX\FaqPackage\Models\Post;

trait HasPosts
{
  public function posts()
  {
    return $this->morphMany(Post::class, 'author');
  }
}