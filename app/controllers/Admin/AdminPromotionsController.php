<?php

class AdminPromotionsController extends \BaseController {

    /**
     * Display a listing of promotions
     *
     * @return Response
     */
    public function index() {
        $promotions = Promotion::all();

        return View::make('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new promotion
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.promotions.create');
    }

    /**
     * Store a newly created promotion in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make($data = Input::all(), Promotion::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/img/promotions/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data["image"] = 'img/promotions/' . $filename;
        }

        Promotion::create($data);

        return Redirect::route('admin.promotions.index');
    }

    /**
     * Display the specified promotion.
     *
     * @param  int  $id
     * @return Response
     */
//	public function show($id)
//	{
//		$promotion = Promotion::findOrFail($id);
//
//		return View::make('admin.promotions.show', compact('promotion'));
//	}

    /**
     * Show the form for editing the specified promotion.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $promotion = Promotion::find($id);

        return View::make('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified promotion in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $promotion = Promotion::findOrFail($id);
        if ($promotion) {
            File::delete(public_path() . "/" . $promotion->image);
        }
        $validator = Validator::make($data = Input::all(), Promotion::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/img/promotions/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data["image"] = 'img/promotions/' . $filename;
        } else {
            unset($data['image']);
        }

        $promotion->update($data);

        return Redirect::route('admin.promotions.index');
    }

    /**
     * Remove the specified promotion from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Session::set('message', "Promotion image is deleted successfully.");
        $promotion = Promotion::find($id);
        if ($promotion) {
            File::delete(public_path() . "/" . $promotion->image);
        }
        Promotion::destroy($id);
    }

}
