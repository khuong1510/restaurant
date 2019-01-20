<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    public $timestamps = true;

    const MENU_LIST_FIELD_CONFIG = 'menu_list_field';
    const PAGE_SIZE = 2;
}
