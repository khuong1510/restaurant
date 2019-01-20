<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Config;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{
    private $_showed_field;
    private $_configRepository;

    function __construct(
        Config $configRepository
    ) {
        $this->_configRepository = $configRepository;
        $this->_showed_field = explode(',', $configRepository->getValue(Menu::MENU_LIST_FIELD_CONFIG));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('name', 'asc');
        // Get list proper of Menu table
        $listField = Schema::getColumnListing('menu');
        $listFieldWithoutId = array_where($listField, function ($value, $key) {
            return $value !== 'id';
        });

        return view('admin.subpage.menu.list', [
            'menus' => $menus->paginate(Menu::PAGE_SIZE),
            'fields' => $this->_showed_field,
            'listFields' => $listFieldWithoutId
        ]);
    }

    /**
     * Filter by fields
     * @param Request $request
     * @return string
     */
    public function filter(Request $request)
    {
        $currentPage = $request['current-page'];
        $data = \Helper::filterItems(new Menu(), $request->except(['_token','current-page']), Menu::PAGE_SIZE, $currentPage);
        return json_encode($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showByFields(Request $request)
    {
        $showFields = array_keys($request->except('_token'));
        $this->_configRepository->setValue(Menu::MENU_LIST_FIELD_CONFIG, implode(',', $showFields));

        return redirect()->action('AdminController\MenuController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
