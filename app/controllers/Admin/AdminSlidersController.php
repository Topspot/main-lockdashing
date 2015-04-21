<?php

class AdminSlidersController extends \BaseController {

    /**
     * Display a listing of sliders
     *
     * @return Response
     */
    public function index() {
        $sliders = Slider::all();

        return View::make('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.sliders.create');
    }

    /**
     * Store a newly created slider in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make($data = Input::all(), Slider::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/img/slider/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data["image"] = 'img/slider/' . $filename;
        }

        Slider::create($data);

        return Redirect::route('admin.sliders.index');
    }

    /**
     * Display the specified slider.
     *
     * @param  int  $id
     * @return Response
     */
//	public function show($id)
//	{
//		$slider = Slider::findOrFail($id);
//
//		return View::make('admin.sliders.show', compact('slider'));
//	}

    /**
     * Show the form for editing the specified slider.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $slider = Slider::find($id);

        return View::make('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $slider = Slider::findOrFail($id);
         if ($slider) {
            File::delete(public_path() ."/". $slider->image);
        }
        $validator = Validator::make($data = Input::all(), Slider::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/img/slider/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $data["image"] = 'img/slider/' . $filename;
        } else {
            unset($data['image']);
        }

        $slider->update($data);

        return Redirect::route('admin.sliders.index');
    }

    /**
     * Remove the specified slider from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
         Session::set('message', "Slider image is deleted successfully.");
          $sliders = Slider::find($id);
        if ($sliders) {
            File::delete(public_path() ."/". $sliders->image);
        }
        Slider::destroy($id);
    }

}
