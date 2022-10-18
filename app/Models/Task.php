<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public const SEVERITY_NORMAL = 'normal';
    public const SEVERITY_IMPORTANT = 'important';
    public const SEVERITY_ALARM = 'alarm';

    /**
     * @var array<string>
     */
    public const TASK_SEVERITIES = [
        self::SEVERITY_NORMAL,
        self::SEVERITY_IMPORTANT,
        self::SEVERITY_ALARM,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'severity',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
