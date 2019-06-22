<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $fillable = [
        'forename', 'surname', 'birthday','gender',
    ];


    public function user() {
        $this->belongsTo(User::class);
    }
}