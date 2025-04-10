<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use SoftDeletes;

    protected $table='questions';
    protected $primaryKey='id';
    protected $fillable = ['topic_id', 'content', 'img_url'];

    // Một câu hỏi thuộc một chủ đề (n-1)
    public function topics()
    {
        return $this->belongsTo(Topics::class); // n Question - 1 Topic
    }

    // Một câu hỏi có nhiều câu trả lời (1-n)
    public function answers()
    {
        return $this->hasMany(Answers::class); // 1 Question - n Answer
    }

    // Một câu hỏi có nhiều lượt người trả lời (1-n)
    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class); // 1 Question - n UserAnswer
    }
}
