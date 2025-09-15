<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = ['user_id', 'name_project', 'description'];

    /**
     * Mendefinisikan relasi: Proyek ini milik seorang User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan relasi: Proyek ini memiliki banyak Task.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
