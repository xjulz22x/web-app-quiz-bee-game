<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'room_code',
        'subject_id'
    ];
    public function questions(){
        return $this->belongsToMany(Question::class, 'question_room','room_id', 'question_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}
