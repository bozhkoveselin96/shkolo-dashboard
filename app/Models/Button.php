<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Button extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'link', 'color_id'];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

}
