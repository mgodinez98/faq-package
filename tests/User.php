<?php

namespace JaopMX\FaqPackage\Tests;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use JaopMX\FaqPackage\Traits\HasPosts;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use HasPosts, Authorizable, Authenticatable;

    protected $guarded = [];

    protected $table = 'users';
}