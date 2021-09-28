<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {
    protected $table = "customers";
    protected $fillable = ['user_id', 'name', 'document', 'status'];
    public $timestamps = true;
}
