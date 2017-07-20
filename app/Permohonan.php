<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    protected $fillable = [
      'user_id',
      'exam_id',
      'status'
    ];

    // Relation terhadap table user
    public function rekoduser()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation terhadap exam
    public function rekodexam()
    {
      return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}
