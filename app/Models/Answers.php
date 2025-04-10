<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answers extends Model
{
    use SoftDeletes;

    protected $table='answers';
    protected $primaryKey='id';
    protected $fillable = ['question_id', 'content', 'is_correct'];

    // Một câu trả lời thuộc về một câu hỏi (n-1)
    public function question()
    {
        return $this->belongsTo(Questions::class); // n Answer - 1 Question
    }

    // Một câu trả lời có thể được nhiều người chọn (1-n)
    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class); // 1 Answer - n UserAnswer
    }
}
