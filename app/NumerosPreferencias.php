<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumerosPreferencias extends Model {
    protected $table = "number_preferences";
    protected $fillable = ['number_id', 'name', 'value'];
    public $timestamps = true;
}
