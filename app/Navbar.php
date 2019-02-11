<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = "navbar";
    protected $fillable = ['name','link','alias','icon','parent_id', 'page'];

    public function getAll($page = ''){
        if(!empty($page)){
            return $this->where('page', $page)->get();
        }
        return $this->get();
    }

    public function insertOne($array){
        $this->fill($array);
        $this->save();
    }

    public function getOne($id){
        return $this->findOrFail($id);
    }

}
