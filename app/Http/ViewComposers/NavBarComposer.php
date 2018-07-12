<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class NavBarComposer
{
    public function compose(View $view)
    {
      $view->with('name','huge');
    }
}
