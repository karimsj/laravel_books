<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * Table books
 *
 * @package App
 */
class Book extends Model
{
    /**
     * @var array $fillable data displayable to user
     */
    protected $fillable =['name', 'publish_date', 'edition', 'isbn_10', 'isbn_13'];

    /**
     * @var array $hidden data from user
     */
    protected $hidden = ['publisher_id', 'created_at', 'updated_at', 'pivot'];

    /**
     * fetches publisher detail associated with the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher() {
        return $this->belongsTo('App\Publisher');
    }

    /**
     * fetches author(s) who who have written the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors() {
        return $this->belongsToMany('App\Author', 'book_author', 'book_id', 'author_id');
    }
}
