<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
  protected $table = "navbar";
  protected $fillable = ['name','link','alias','parent_id'];

  public function insertOne($array){

  }

}
