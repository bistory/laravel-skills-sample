<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Box extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'maze_id',
        'x',
        'y',
        'is_allowed'
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function maze(): BelongsTo
    {
        return $this->belongsTo(Maze::class);
    }
}
