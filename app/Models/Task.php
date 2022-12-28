<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'reminder',
        'completed',
        'category_id'
    ];


    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function shouldSendReminder() {
        return Carbon::parse($this->reminder)->isToday() && !$this->completed;
    }
}
