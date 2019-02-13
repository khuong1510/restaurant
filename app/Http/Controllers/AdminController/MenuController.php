<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Requests\MenuRequest;
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
            new Menu(),
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
            'title' => Menu::HANDLE,
            'titleDetail' => 'List Menus',
            'currentPageSize' => $this->_pageSize,
            'hasRemoveBtn' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subpage.menu.add', [
            'title' => Menu::HANDLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->insertMenu($request->except('_token'));
        return redirect()->back()->with('success_message', 'New menu have been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.subpage.menu.edit', [
            'title' => Menu::HANDLE,
            'item' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $menu = Menu::findOrFail($request['id']);
        $isSuccess = $menu->updateMenu($request->except('_token'));
        $response = [
            "message" => "Failed when updating menu.",
            "error" => 1
        ];
        if($isSuccess)
        {
            $response["message"] = "Update menu successful.";
            $response["error"] = 0;
        }
        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return json_encode(true);
    }
}
