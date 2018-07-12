<?php 


class Helper 
{

     public static function showMenu($navBar, $parent_id = 0){
            $cate_child = array();
            foreach ($navBar as $key => $item)
            {
                if ($item['parent_id'] == $parent_id)
                {
                    $cate_child[] = $item;
                    unset($navBar[$key]);
                }
            }
             
            if ($cate_child)
            {
                echo '<ul class="sub-menu">';
                foreach ($cate_child as $key => $item)
                {
                    echo '<li class="nav-item">';
                    echo '<a href="{{ asset(' . $item['link'] . ') }}" class="nav-link nav-toggle">';
                    echo '<i class="icon-home"></i>';
                    echo '<span class="title">' . $item['name'] . '</span>';
                    echo '<span class="selected"></span>';
                    echo '<span class="arrow open"></span>';
                    echo '</a>';

                    self::showMenu($navBar, $item['id']);
                    
                    echo '</li>';
                }
                echo '</ul>';
            }
        }
}
