<?php

namespace App\Http\Controllers\AdminController;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Requests\NavBarRequest;
use App\NavBar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class NavbarController extends HelperController
{
    private $_showedField;
    private $_pageSize;
    private $_configRepository;
    protected $navBar;

    public function __construct(Config $configRepository){
        $this->navBar = new Navbar;
        $this->_configRepository = $configRepository;
        $this->_showedField = explode(',', $configRepository->getValue(NavBar::LIST_FIELD_CONFIG));
        $this->_pageSize = $configRepository->getValue(NavBar::PAGE_SIZE);
        parent::__construct(
            $configRepository,
            $this->navBar,
            $this->_showedField,
            $this->_pageSize
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $navBarList = $this->navBar->getAll();
//        return view('admin.subpage.navbar.show', compact('navBarList'));
//    }
    public function index()
    {
        $navbars = Navbar::orderBy('name', 'asc');

        $listField = Schema::getColumnListing(NavBar::HANDLE);
        $listFieldWithoutId = array_where($listField, function ($value, $key) {
            return $value !== 'id';
        });
        $removeMsg = "Remove this item will make all its children delete. Do you want to delete them?";

        return view('admin.subpage.helper.list', [
            'items' => $navbars->paginate($this->_pageSize),
            'showFields' => $this->_showedField,
            'listFields' => $listFieldWithoutId,
            'title' => Navbar::HANDLE,
            'titleDetail' => 'List Navigation Bar',
            'currentPageSize' => $this->_pageSize,
            'hasRemoveBtn' => true,
            'removeMsg' => $removeMsg
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navBar = [];
        $breadCrumb = "Add Navbar";
        return view('admin.subpage.navbar.add', compact($navBar, 'breadCrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NavBarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NavBarRequest $request)
    {
        $this->navBar->insertOne($request->all());
        return redirect()->back()->with('success_message', 'New navbar have been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $navBar = $this->navBar->getOne($id);
        $breadCrumb = "Edit Navbar";
        return view('admin.subpage.navbar.add', compact('navBar', 'breadCrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $isSuccess = $this->navBar->updateNavbar($request->except("_token"));
        $response = [
            "message" => "Error when update navigation bar.",
            "error" => 1
        ];
        if($isSuccess == 1)
        {
            $response["message"] = "Update navigation bar successful.";
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
        $this->navBar->removeNavbar($id);
        return json_encode(["message" => "Delete nav bar successful.", "error" => 0]);
    }

    /**
     * Load ajax to get navbar by page type
     *
     * @param $pageType
     * @return string
     */
    public function getNavbarByPageType($pageType)
    {
        if(empty($pageType))
            return json_encode(false);

        $options = \Helper::convertArrayForFormCollective($this->navBar->getAll($pageType));
        return json_encode($options);
    }
}
