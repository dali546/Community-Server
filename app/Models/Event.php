<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
