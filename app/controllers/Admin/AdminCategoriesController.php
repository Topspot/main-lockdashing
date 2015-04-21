<?php

class AdminCategoriesController extends \BaseController {

         public function __construct() {
        $this->beforeFilter('category', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::paginate(10);

		return View::make('admin.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.categories.create');
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
//                print_r($data);exit;
		Category::create($data);
                Session::set('message', "Category is successfully added.");
		return Redirect::route('admin.categories.index');
	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return View::make('admin.categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);

		return View::make('admin.categories.edit', compact('category'));
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Category::$rules);
// print_r($data);exit;
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                Session::set('message', "Category is updated successfully.");
		$category->update($data);

		return Redirect::route('admin.categories.index');
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            Session::set('message', "Category is deleted successfully.");
		Category::destroy($id);

//		return Redirect::route('admin.categories.index');
	}

}
