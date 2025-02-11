<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactInfo extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'email_address','facebook','user_id'];
}
