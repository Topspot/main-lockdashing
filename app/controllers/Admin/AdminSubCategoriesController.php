<?php

class AdminSubCategoriesController extends \BaseController {

	/**
	 * Display a listing of subcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$subcategories = SubCategory::orderBy('created_at', 'desc')->paginate(10);

		return View::make('admin.subcategories.index', compact('subcategories'));
	}

	/**
	 * Show the form for creating a new subcategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.subcategories.create');
	}

	/**
	 * Store a newly created subcategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), SubCategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		SubCategory::create($data);

		return Redirect::route('admin.subcategories.index');
	}

	/**
	 * Display the specified subcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subcategory = SubCategory::findOrFail($id);

		return View::make('admin.subcategories.show', compact('subcategory'));
	}

	/**
	 * Show the form for editing the specified subcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subcategory = SubCategory::find($id);

		return View::make('admin.subcategories.edit', compact('subcategory'));
	}

	/**
	 * Update the specified subcategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subcategory = SubCategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), SubCategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$subcategory->update($data);

		return Redirect::route('admin.subcategories.index');
	}

	/**
	 * Remove the specified subcategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		SubCategory::destroy($id);

		return Redirect::route('admin.subcategories.index');
	}
        
            /**
     * Get sub categories fromc ategory ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function getSubCategories($id) {
  
        $product_id=$_GET['product_id'];
        $subcat = SubCategory::where('category_id', '=', $id)->get();
        $products = Product::where('id', '=', $product_id)->get();
        return array($subcat,$products);
    }
            /**
     * Get sub categories for popular categories.
     *
     * @param  int  $id
     * @return Response
     */
    public function getSubCategoriesPopular($id) {
  
        $popular_id=$_GET['product_id'];
        $subcat = SubCategory::where('category_id', '=', $id)->get();
        $products = Popular::where('id', '=', $popular_id)->get();
        return array($subcat,$products);
    }

}
