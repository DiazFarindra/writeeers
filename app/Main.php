<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    //

    // Algolia Search
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'title', 'article'];

    /**
     * Join table One to Many(inverse)
     *
     * @var array
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
