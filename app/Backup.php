<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    public $timestamps = false;
    protected $table = 'backup';
}
