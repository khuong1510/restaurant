<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\ViewComposers\NavBarComposer;
use App\NavBar;

class NavBarComposer
{
    protected $navBar;
    public function __construct(){
      $this->navBar = new NavBar; 
    }

    public function compose(View $view)
    {
      $navBarList = $this->navBar->getAll();
      $view->with('navBarList',$navBarList);
    }
}
