<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Publisher
 *
 * table publishers
 *
 * @package App
 */
class Publisher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['publisher_name'];

    protected $hidden = ['created_at', 'updated_at'];
    /**
     * fetch all the books that has been published by the publisher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books() {
        return $this->hasMany('App\Book');
    }
}
