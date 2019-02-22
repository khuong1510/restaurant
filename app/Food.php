<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = "food";
    public $timestamps = true;

    const HANDLE = 'food';
    const LIST_FIELD_CONFIG = 'food_list_field';
    const PAGE_SIZE = 'food_page_size';
    const DEFAULT_IMAGE = 'default-user.png';
    const IMAGE_FOLDER = 'images/foods/';

    const FOOD_TYPE = [
        'food' => 'Food',
        'drink' => 'Drink'
    ];

    public function insertFood($array)
    {
        if(empty($array['image'])) {
            $array['image'] = self::DEFAULT_IMAGE;
        }
        else
        {
            $file = $array['image'];
            $file_extension = $file->getClientOriginalExtension(); //Get file original name
            $file_name =  "user_".str_random(4). "." . $file_extension;
            $file->move(self::IMAGE_FOLDER , $file_name);
            $array['image'] = $file_name;
        }
        $array['created_at'] = Carbon::now();
        $array['updated_at'] = Carbon::now();
        $this->insert($array);
    }

    public function updateFood($array, $id)
    {
        if(!empty($array['image'])) {
            $file = $array['image'];
            $file_extension = $file->getClientOriginalExtension(); //Get file original name
            $file_name =  "user_".str_random(4). "." . $file_extension;
            $file->move(self::IMAGE_FOLDER , $file_name);
            $array['image'] = $file_name;
        }
        $array['updated_at'] = Carbon::now();
        $this->where('id', $id)->update($array);
    }
}
