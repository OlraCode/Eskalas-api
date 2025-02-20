<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    public $timestamps = false;
    protected $fillable = ['date'];
    protected $with = ['members'];

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
