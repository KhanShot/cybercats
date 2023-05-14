<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'content', 'subject_id', 'topic_id', 'animation'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
