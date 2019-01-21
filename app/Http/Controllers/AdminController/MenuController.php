<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Menu;
use App\Config;
use Illuminate\Support\Facades\Schema;

class MenuController extends HelperController
{
    private $_showedField;
    private $_pageSize;
    private $_configRepository;

    function __construct(
        Config $configRepository
    ) {
        $this->_configRepository = $configRepository;
        $this->_showedField = explode(',', $configRepository->getValue(Menu::LIST_FIELD_CONFIG));
        $this->_pageSize = $configRepository->getValue(Menu::PAGE_SIZE);
        parent::__construct(
            $configRepository,
            new Menu,
            $this->_showedField,
            $this->_pageSize
        );
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

        return view('admin.subpage.helper.list', [
            'items' => $menus->paginate($this->_pageSize),
            'showFields' => $this->_showedField,
            'listFields' => $listFieldWithoutId,
            'title' => 'menu',
            'titleDetail' => 'List Menus',
            'currentPageSize' => $this->_pageSize
        ]);
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
