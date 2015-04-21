<?php

class AdminPopularsController extends \BaseController {

	/**
	 * Display a listing of populars
	 *
	 * @return Response
	 */
	public function index()
	{
		$populars = Popular::all();

		return View::make('admin.populars.index', compact('populars'));
	}

	/**
	 * Show the form for creating a new popular
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.populars.create');
	}

	/**
	 * Store a newly created popular in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Popular::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Popular::create($data);
//                Session::set('message', "Popular Category is Added successfully.");

		return Redirect::route('admin.populars.index');
	}

	/**
	 * Display the specified popular.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$popular = Popular::findOrFail($id);

		return View::make('admin.populars.show', compact('popular'));
	}

	/**
	 * Show the form for editing the specified popular.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$popular = Popular::find($id);

		return View::make('admin.populars.edit', compact('popular'));
	}

	/**
	 * Update the specified popular in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$popular = Popular::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Popular::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
//                  Session::set('message', "Popular Category is updated successfully.");
		$popular->update($data);

		return Redirect::route('admin.populars.index');
	}

	/**
	 * Remove the specified popular from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            Session::set('message', "Popular Category is deleted successfully.");
            
		Popular::destroy($id);

	}

}
