<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'user_id',
        'task_id',
    ];
}
