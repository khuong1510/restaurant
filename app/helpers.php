<?php 


class Helper 
{

     public static function showMenuSideBar($navBar, $parent_id = 0, $stt = 1){
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
                if($stt > 1){
                  echo '<ul class="sub-menu">';
                }
               
                foreach ($cate_child as $key => $item)
                {
                    echo '<li class="nav-item">';
                    echo '<a href="'. url('/admin'.$item['link']) .'" class="nav-link nav-toggle">';
                    echo '<i class="fa fa-' . $item['icon'] . '"></i>';
                    echo '<span class="title">' . $item['name'] . '</span>';
                    echo '<span class="selected"></span>';
                    echo '<span class="arrow open"></span>';
                    echo '</a>';

                    self::showMenuSideBar($navBar, $item['id'], ++$stt);
                    
                    echo '</li>';
                }

                if($stt > 1){
                  echo '</ul>';
                }
            }
        }
     
      public static function convertArrayForFormCollective($navBar, $parent_id = 0, $char = ''){
        foreach ($navBar as $key => $item)
        {
  
            if ($item['parent_id'] == $parent_id)
            {
              echo '<option value="'.$item['id'].'">';
              echo $char . $item['name'];
              echo '</option>';
           
              unset($navBar[$key]);
              
              self::convertArrayForFormCollective($navBar, $item['id'], $char.'|--');
            }
        }
    }

}
