<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'user_id',
        'project_id',
        'parent_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date'
    ];

    /**
     * Relasi: Task ini milik sebuah Project.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relasi: Task ini memiliki banyak sub-task (children).
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    /**
     * Relasi: Task ini memiliki banyak sub-task (children).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    /**
     * Relasi: Task ini bisa memiliki banyak Tag.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
