<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBasicNameInfo extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'middle_name','last_name','suffix_name','user_id'];
}
