<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBasicInfo extends Model
{
    use HasFactory;

    protected $fillable = ['age', 'sex','birthdate','religion','place_of_birth','current_address','user_id'];
}
