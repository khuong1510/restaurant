<?php


class Helper
{
    // --------------------------- HTML HELPER -----------------------------------
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

    public static function convertArrayForFormCollective($navBar, $parent_id = 0, $char = '', $current_parent_id = null){
        foreach ($navBar as $key => $item)
        {
            if ($item['parent_id'] == $parent_id)
            {
                $selected = ($current_parent_id == $item['id'] && $current_parent_id != null) ? "selected" : "";
                echo '<option value="'.$item["id"].'" '.$selected.'>';
                echo $char . $item['name'];
                echo '</option>';

                unset($navBar[$key]);

                self::convertArrayForFormCollective($navBar, $item['id'], $char.$item['name'].'->', $current_parent_id);
            }
        }
    }

    public static function showActiveLabel($isActive)
    {
        if($isActive == 1)
            return '<span class="label label-success"> Active </span>';
        else
            return '<span class="label label-danger"> Inactive </span>';
    }

    /**
     * Render table header
     *
     * @param $listField
     * @return string
     */
    public static function showTableHeader($listField)
    {
        $htmlContent = '';
        foreach($listField as $field)
        {
            $filterIcon = '';
            if($field != "active")
                $filterIcon = '
                <i class="glyphicon glyphicon-sort-by-attributes eav-sort" id="rtr-sort-'.$field.'">
                    <input type="hidden" name="'.$field.'-sort" value="asc">
                </i>';
            $htmlContent .= '
                <th class="text-center text-capitalize">'.title_case(str_replace("_"," ",$field)).'
                '.$filterIcon.'
                </th>';
        }

        return '
            <tr class="success">
                <th class="text-center"> No. </th>
                '.$htmlContent.'
                <th class="text-center"> Action </th>
             </tr>';
    }

    public static function showFilterRow($listField)
    {
        $htmlContent = '';
        foreach($listField as $field)
        {
            if($field != "active")
                $htmlContent .= '<th><input type="text" class="form-control" name="'.$field.'" id="rtr-input-'.$field.'"></th>';
            else $htmlContent .= '
                <th>
                    <select name="'.$field.'" id="rtr-input-'.$field.'" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </th>';
        }

        return '
        <tr>
             <th></th>
             '.$htmlContent.'
             <th></th>
        </tr>
        ';
    }

    public static function showItemsRow($object, $listField, $index, $rootUrl, $hasRemoveBtn = false)
    {
        $htmlContent = '';
        for($i = 0; $i < count($object); $i++)
        {
            $editUrl = asset('/admin/'.$rootUrl.'/edit/'.$object[$i]->id);
            $removeUrl = $hasRemoveBtn ? asset('/admin/'.$rootUrl.'/delete/'.$object[$i]->id) : '';
            $htmlContent .= self::showSingleRow($object[$i], $listField, ($index + $i + 1), $editUrl, $removeUrl);
        }
        return $htmlContent;
    }

    public static function showSingleRow($object, $listField, $index, $editUrl, $removeUrl = null)
    {
        $htmlContent = '';
        $removeBtn = '';
        foreach ($listField as $field)
        {
            if($field != "active")
                $htmlContent .= '<td>'.$object[$field].'</td>';
            else $htmlContent .= '<td class="text-center">'.self::showActiveLabel($object[$field]).'</td>';
        }
        if(!empty($removeUrl))
            $removeBtn = '<a data-href="'.$removeUrl.'" class="btn btn-sm btn-danger rtr-remove-btn"><i class="fa fa-trash"></i></a>';
        return '
            <tr>
                <td>'.$index.'</td>
                '.$htmlContent.'
                <td class="text-center">
                    <a href="'.$editUrl.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    '.$removeBtn.'
                </td>
            </tr>
        ';
    }

    public static function showListFieldSelect($allFields, $showFields)
    {
        $htmlContent = '';
        $numberColumn = 2;
        $numberFields = count($allFields);
        $numberCheckboxPerColumn = ceil(count($allFields) / $numberColumn) ;

        for($j = 0; $j < $numberColumn; $j++)
        {
            $html = '';
            $lastIndex = $j == ($numberColumn - 1) ? $numberFields : (($j + 1) * $numberCheckboxPerColumn);
            $startIndex = ($j * $numberCheckboxPerColumn) + 1;
            for($i = $startIndex; $i <= $lastIndex; $i++)
            {
                $isCheck = in_array($allFields[$i], $showFields) ? "checked" : "";
                $html .= '
                    <label class="mt-checkbox text-capitalize">'.$allFields[$i].'
                        <input type="checkbox" value="1" name="'.$allFields[$i].'" '.$isCheck.' />
                        <span></span>
                    </label>';
            }
            $htmlContent .= '<div class="col-md-'. 12 / $numberColumn .'">'.$html.'</div>';
        }
        return $htmlContent;
    }
    // --------------------------- END HTML HELPER -----------------------------------

    // --------------------------- SERVICE HELPER -----------------------------------
    /**
     * Filter can use on multiple object
     *
     * @param $object
     * @param $request
     * @param $pageSize
     * @param $currentPage
     * @return array
     */
    public static function filterItems($object, $request, $pageSize, $currentPage)
    {
        $arrItems = array();
        $columnToShow = array('id');
        $requestKeys = array_keys($request);
        $items = $object->query();

        // Search and sort by request value
        foreach ($requestKeys as $key)
        {
            if(!strpos($key, '-sort'))
            {
                array_push($columnToShow, $key);
                if($key == 'active')
                    $items->where($key, $request[$key])->get();
                else
                    $items->where($key, 'like', '%'.$request[$key].'%')->get();
            }
            else
                $items->orderBy(str_replace('-sort','', $key), $request[$key])->get();
        }
        $items = $items->paginate($pageSize, null, null, $currentPage);

        // Calculate page number to paginate
        $numberPage = ceil($items->total()/$pageSize);

        foreach($items as $item)
            $arrItems[] = self::filterArrayByKeys($item->toArray(), $columnToShow);

        return [
            'items' => $arrItems,
            'numberPage' => $numberPage,
            'currentPage' => $currentPage,
            'pageSize' => $pageSize
        ];
    }

    /**
     * Filter array by list keys array
     * @param $array
     * @param $keys
     * @return array
     */
    public static function filterArrayByKeys($array, $keys)
    {
        $returnArray = [];
        foreach($keys as $key)
            if (array_key_exists($key, $array))
                $returnArray[$key] = $array[$key];
        return $returnArray;
    }
    // --------------------------- SERVICE HELPER -----------------------------------
}
