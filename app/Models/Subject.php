<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['subject_name', 'subject_code', 'user_id','grade_id'];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
