<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topics extends Model
{
    use SoftDeletes;

    protected $table='topics';
    protected $primaryKey='id';
    protected $fillable = ['name', 'description'];

    // Một chủ đề có nhiều câu hỏi (1-n)
    public function questions()
    {
        return $this->hasMany(Questions::class); // 1 Topic - n Question
    }
}
