<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = ['name', "image"];
    public  function projects(): BelongsToMany
    {
        return $this->belongsToMany(Projects::class);
    }
}
