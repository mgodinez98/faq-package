<?php

namespace JaopMX\FaqPackage\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'faq_resources';
    protected $fillable = ['name', 'mime_type'];
}