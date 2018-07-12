<?php 

if(!function_exists('parse_menu')){
  function showMenu($menu, $parent_id = 0){
      $cate_child = array();
      foreach ($categories as $key => $item)
      {
          if ($item['parent_id'] == $parent_id)
          {
              $cate_child[] = $item;
              unset($categories[$key]);
          }
      }
       
      if ($cate_child)
      {
          echo '<ul class="sub-menu">';
          foreach ($cate_child as $key => $item)
          {
              echo '<li class="nav-item">'.$item['title'];
               
              showMenu($categories, $item['id']);
              echo '</li>';
          }
          echo '</ul>';
      }
  }
}