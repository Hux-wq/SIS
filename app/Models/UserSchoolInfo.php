<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UserSchoolInfo extends Model
{
    use HasFactory;

    
    protected $fillable = ['student_id', 'section_id','position'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
