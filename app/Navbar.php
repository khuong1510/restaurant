<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
  protected $table = "navbar";
  protected $fillable = ['name','link','alias','icon','parent_id', 'page'];


  public function getAll(){
    return $this->all();
  }

  public function insertOne($array){
    $this->fill($array);
    $this->save();
  }

}
