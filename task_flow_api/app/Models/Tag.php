<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = ['user_id', 'name_tag'];

    public function tasks(): BelongsToMany{
        return $this->belongsToMany(Task::class);
    }
}
