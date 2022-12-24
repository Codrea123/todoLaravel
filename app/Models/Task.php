<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'reminder',
        'completed'
    ];


    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
