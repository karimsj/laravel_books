<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 *
 * Table authors
 *
 * @package App
 */

class Author extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name'];

    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    /**
     * fetches all the books that has been written by the author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function books() {
        return $this->belongsToMany('App\Book', 'book_author', 'author_id', 'book_id');
    }
}
