<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent
{
    protected $table = 'admins';
    protected $fillable = ['login', 'password'];
}