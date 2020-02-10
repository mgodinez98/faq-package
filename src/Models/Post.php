<?php

namespace JaopMX\FaqPackage\Models;

// use Laravel\Scout\Searchable;
// use HTMLPurifier_Config;
// use HTMLPurifier;
use JaopMX\FaqPackage\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $table = 'faq_posts';
    protected $fillable = ['title', 'body', 'active', 'slug'];

    public function author()
    {
        return $this->morphTo();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'faq_category_post');
    }
}