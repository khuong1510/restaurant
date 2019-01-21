<?php

namespace App\Http\Controllers\AdminController;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    private $_showedField;
    private $_pageSize;
    private $_configRepository;
    private $_object;

    function __construct(
        Config $configRepository,
        $object,
        $showedField,
        int $pageSize
    ) {
        $this->_configRepository = $configRepository;
        $this->_object = $object;
        $this->_showedField = $showedField;
        $this->_pageSize = $pageSize;
    }

    /**
     * Filter by fields
     * @param Request $request
     * @return string
     */
    public function filter(Request $request)
    {
        $currentPage = $request['current-page'];
        $data = \Helper::filterItems($this->_object, $request->except(['_token','current-page']), $this->_pageSize, $currentPage);
        return json_encode($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showByFields(Request $request)
    {
        $showFields = array_keys($request->except('_token'));
        $this->_configRepository->setValue($this->_object::LIST_FIELD_CONFIG, implode(',', $showFields));

        return redirect()->action('AdminController\MenuController@index');
    }

    /**
     * Change page size
     * @param Request $request
     * @return string
     */
    public function changeSizePage(Request $request)
    {
        $this->_configRepository->setValue($this->_object::PAGE_SIZE, $request->get('page-size'));
        return json_encode(true);
    }
}
