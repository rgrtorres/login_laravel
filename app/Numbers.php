<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Numbers extends Model {
    protected $table = "numbers";
    protected $fillable = ['customer_id', 'number'];
    public $timestamps = true;
}
