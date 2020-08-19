<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MazeSynchronization extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'maze_id',
        'boxes_hash',
    ];

    /**
     * Set the hash of boxes.
     *
     * @param  array  $boxes
     * @return void
     */
    public function setBoxesHashAttribute($boxes)
    {
        $this->attributes['boxes_hash'] = $this->md5Boxes($boxes);
    }

    /**
     * Return a bool indicated if the boxes has changes since the last sync.
     *
     * @param  array  $boxes
     * @return bool
     */
    public function boxesChanged($boxes)
    {
        return $this->md5Boxes($boxes) != $this->boxes_hash;
    }

    /**
     * Calculates a md5 has of the boxes array.
     *
     * @param  array  $boxes
     * @return string
     */
    private function md5Boxes($boxes)
    {
        return md5(json_encode($boxes));
    }
}
