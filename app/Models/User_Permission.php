<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Permission extends Model
{
    use HasFactory;

    protected $table = 'user_permission';

    protected $primaryKey = ['user_id', 'permission_id'];

    protected $guarded = [];
}
