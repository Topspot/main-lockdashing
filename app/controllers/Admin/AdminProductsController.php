<?php

class AdminProductsController extends \BaseController {

    /**
     * Display a listing of products
     *
     * @return Response
     */
    public function index() {

        $current_user_id = App::make('authenticator')->getLoggedUser()->getId();

        if ($current_user_id == 1) {
            $products = Product::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $products = Product::where('user_id', '=', $current_user_id)
                            ->orderBy('created_at', 'desc')->paginate(10);
        }
//         Session::set('message', "");
        return View::make('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */
    public function store() {

        $validator = Validator::make($data = Input::all(), Product::$rules);
 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        for ($i = 0; $i <= 3; $i++) {

            if ($i == 0) {
                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $destinationPath = public_path() . '/img/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();

                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $data["image"] = 'img/' . $filename;
                }
            } else {
                if (Input::hasFile('image'.$i)) {
                    $file = Input::file('image'.$i);
                    $destinationPath = public_path() . '/img/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();


                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $data["image$i"] = 'img/' . $filename;
//                    print_r($data["image1"]);exit;
                }
            }
        }
        Product::create($data);
//        Session::set('message', "Product is successfully added.");
        return Redirect::route('admin.products.index');
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */
//	public function show($id)
//	{
//		$product = Product::findOrFail($id);
//
//		return View::make('products.show', compact('product'));
//	}

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $product = Product::find($id);
        return View::make('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $product = Product::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Product::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i <= 3; $i++) {

            if ($i == 0) {
                if (Input::hasFile('image')) {
                    File::delete(public_path() . "/" . $product->image);
                    $file = Input::file('image');
                    $destinationPath = public_path() . '/img/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $data["image"] = 'img/' . $filename;
                } else {
                    
                    unset($data['image']);
                }
            } else {
                if (Input::hasFile('image' . $i)) {
                    if($i == 1){
                        File::delete(public_path() . "/" .$product->image1 );
                    }else if($i == 2){
                        File::delete(public_path() . "/" .$product->image2 );
                    }else{
                        File::delete(public_path() . "/" .$product->image3 );
                    }
                    $file = Input::file('image'.$i);
                    $destinationPath = public_path() . '/img/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $data["image$i"] = 'img/' . $filename;
                } else {
                   
                    unset($data['image'.$i]);
                }
            }
        }
//        Session::set('message', "Product is updated successfully.");
        $product->update($data);

        return Redirect::route('admin.products.index');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            File::delete(public_path() . "/" . $product->image);
            File::delete(public_path() . "/" . $product->image1);
            File::delete(public_path() . "/" . $product->image2);
            File::delete(public_path() . "/" . $product->image3);
        }
//        Session::set('message', "Product is deleted successfully.");
        Product::destroy($id);

//		return Redirect::route('admin.products.index');
    }

    /**
     * Increment like for the product.
     *
     * @param  int  $id
     * @return Response
     */
    public function addLikes($id) {

        $product = Product::find($id);
        $product->likes = $product->likes + 1;
        $data['likes'] = $product->likes;
        $product->update($data);
//                     print_r($product->likes);exit();
    }

    /**
     * Add featured Items for the product.
     *
     * @param  int  $id
     * @return Response
     */
    public function featuredItems($id) {
        $product = Product::find($id);

        $check = $_GET['check'];
        if ($check == 'yes') {
            $data['featured'] = $product->featured = 1;
        } else {
            $data['featured'] = $product->featured = 0;
        }

        $product->update($data);
    }

    /**
     * Add featured Items for the product.
     *
     * @param  int  $id
     * @return Response
     */
//    public function topSell($id) {
//        $product = Product::find($id);
//
//        $check = $_GET['check'];
//        if ($check == 'yes') {
//            $data['topsell'] = $product->topsell = 1;
//        } else {
//            $data['topsell'] = $product->topsell = 0;
//        }
//
//        $product->update($data);
//    }
}
