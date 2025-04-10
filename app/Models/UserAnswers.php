<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAnswers extends Model
{
    use SoftDeletes;

    protected $table='user_answers';
    protected $primaryKey='id';
    protected $fillable = ['user_id', 'question_id', 'answer_id'];

    // Một lượt trả lời thuộc về một người dùng (n-1)
    public function user()
    {
        return $this->belongsTo(Users::class); // n UserAnswer - 1 User
    }

    // Một lượt trả lời thuộc về một câu hỏi (n-1)
    public function question()
    {
        return $this->belongsTo(Questions::class); // n UserAnswer - 1 Question
    }

    // Một lượt trả lời trỏ tới một câu trả lời cụ thể (n-1)
    public function answer()
    {
        return $this->belongsTo(Answers::class); // n UserAnswer - 1 Answer
    }
}
