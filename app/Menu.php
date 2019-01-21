<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    public $timestamps = true;

    const LIST_FIELD_CONFIG = 'menu_list_field';
    const PAGE_SIZE = 'menu_page_size';
}
