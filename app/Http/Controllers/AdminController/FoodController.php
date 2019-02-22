<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Config;
use App\Food;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\FoodRequest;

class FoodController extends HelperController
{
    private $_showedField;
    private $_pageSize;
    private $_configRepository;
    private $_item;

    function __construct(
        Config $configRepository
    ) {
        $this->_item = new Food();
        $this->_configRepository = $configRepository;
        $this->_showedField = explode(',', $configRepository->getValue(Food::LIST_FIELD_CONFIG));
        $this->_pageSize = $configRepository->getValue(Food::PAGE_SIZE);
        parent::__construct(
            $configRepository,
            $this->_item,
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
        $foods = Food::orderBy('name', 'asc');
        // Get list proper of Menu table
        $listField = Schema::getColumnListing(Food::HANDLE);
        $listFieldWithoutId = array_where($listField, function ($value, $key) {
            return $value !== 'id';
        });

        return view('admin.subpage.helper.list', [
            'items' => $foods->paginate($this->_pageSize),
            'showFields' => $this->_showedField,
            'listFields' => $listFieldWithoutId,
            'title' => Food::HANDLE,
            'titleDetail' => 'List Foods',
            'currentPageSize' => $this->_pageSize,
            'hasRemoveBtn' => false
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadCrumb = 'Create Food';
        return view('admin.subpage.food.edit', [
            'breadCrumb' => $breadCrumb,
            'title' => Food::HANDLE,
            'foodType' => Food::FOOD_TYPE
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FoodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $isSuccess = $this->_item->insertFood($request->except(['_method', '_token']));
        return redirect()->back()->with('success_message', 'New food have been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = $this->_item::find($id);
        $breadCrumb = 'Edit Food';
        return view('admin.subpage.food.edit', [
            'food' => $food,
            'breadCrumb' => $breadCrumb,
            'title' => Food::HANDLE,
            'foodType' => Food::FOOD_TYPE
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FoodRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, $id)
    {
        $isSuccess = $this->_item->updateFood($request->except(['_method', '_token']), $id);
        return redirect()->back()->with('success_message', 'Food have been updated');
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
