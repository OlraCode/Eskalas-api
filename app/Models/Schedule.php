<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;
    protected $fillable = ['date'];
}
