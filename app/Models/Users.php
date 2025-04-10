<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticatable
{
    use SoftDeletes, HasFactory, Notifiable;

    protected $table='users';
    protected $primaryKey='id';
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Một User có thể có nhiều câu trả lời đã chọn (1-n)
    public function answers()
    {
        return $this->hasMany(UserAnswers::class); // 1 Users - n UserAnswers
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
