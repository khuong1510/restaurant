<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = "navbar";
    protected $fillable = ['name','link','alias','icon','parent_id', 'page'];

    const HANDLE = 'navbar';
    const LIST_FIELD_CONFIG = 'navbar_list_field';
    const PAGE_SIZE = 'navbar_page_size';
    const PAGE_TYPE = [ 'admin', 'client' ];

    /**
     * Get Navbars by page type
     *
     * @param string $page
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($page = ''){
        if(!empty($page)){
            return $this->where('page', $page)->get();
        }
        return $this->get();
    }

    /**
     * Create new Navbar
     *
     * @param $array
     */
    public function insertOne($array){
        $this->fill($array);
        $this->save();
    }

    /**
     * Get Navbar by Id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function getOne($id){
        return $this->findOrFail($id);
    }

    /**
     * Update Navbar
     *
     * @param $array
     * @return bool
     */
    public function updateNavbar($array) {
        return $this->where('id', $array['id'])->update($array);
    }

    public function removeNavbar($id)
    {
        $children = $this->where('parent_id', $id)->get();
        if(count($children) > 0)
        {
            foreach ($children as $child)
            {
                self::removeNavbar($child->id);
            }
        }
        $this->destroy($id);
    }
}
