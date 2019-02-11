<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    public $timestamps = true;

    const HANDLE = 'menu';
    const LIST_FIELD_CONFIG = 'menu_list_field';
    const PAGE_SIZE = 'menu_page_size';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'icon'
    ];

    /**
     * Insert new menu
     * @param $array
     */
    public function insertMenu($array)
    {
        if(empty($array['image'])) {
            $array['image'] = 'default-user.png';
        }
        else
        {
            $destinationPath = 'images/'.self::HANDLE.'/';
            $file = $array['image'];
            $file_extension = $file->getClientOriginalExtension(); //Get file original name
            $file_name =  self::HANDLE."_".str_random(4). "." . $file_extension;
            $file->move($destinationPath , $file_name);

            $array['image'] = $file_name;
        }
        $array["created_at"] = Carbon::now();
        $array["updated_at"] = Carbon::now();

        $this->insert($array);
    }

    /**
     * Update menu
     * @param $array
     * @return bool
     */
    public function updateMenu($array)
    {
        if(!empty($array['image'])) {
            $destinationPath = 'images/'.self::HANDLE.'/';
            $file = $array['image'];
            $file_extension = $file->getClientOriginalExtension(); //Get file original name
            $file_name =  self::HANDLE."_".str_random(4). "." . $file_extension;
            $file->move($destinationPath , $file_name);

            $this->image = $file_name;
        }
        $this->name = $array['name'];
        $this->description = $array['description'];
        $this->icon = $array['icon'];
        $this->active = $array['active'];
        $this->updated_at = Carbon::now();

        $isSuccess = $this->save();
        return $isSuccess;
    }
}
