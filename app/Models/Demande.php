<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'poste_id',
        'basic_information_id',
        'career_object_id',
        'certificate_id',
        'education_id',
        'work_id',
    ];

    public function user(){
        return $this->belongsTo(basicInfo::class);
    }

    
    public function education(){
        return $this->belongsTo(basicInfo::class);
    }
}
