<?php

// app/Models/Account.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $table = 'accounts'; // Tên bảng

    protected $fillable = [
        'username',
        'password',
    ];

}
