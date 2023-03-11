<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basicInfo extends Model
{
    use HasFactory;
    protected $table = 'basic_information';
    protected $fillable = [
        'user_id', 'first_name', 'last_name','profession','email','phone','website','address','post_code','division',
    ];
}
