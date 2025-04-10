<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionType extends Model
{
    use SoftDeletes;

    protected $table='question_types';
    protected $primaryKey='id';
    protected $fillable = ['name', 'label'];

    // Một loại câu hỏi có thể được nhiều câu hỏi sử dụng.
    public function questions()
    {
        return $this->hasMany(Questions::class); // 1 Question Type - n Question
    }
}
