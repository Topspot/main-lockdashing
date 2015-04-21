<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function getIndex() {

        $data = Input::all();
        if (isset($data['keyword']) || isset($data['namebrands'])) {
            $namebrands = $data['namebrands'];
            $keyword = $data['keyword'];
            $products = DB::table('products')
                    ->where('brand_id', '=', $namebrands)
                    ->where('title', 'LIKE', "%$keyword%")
                    ->paginate(9);

            return View::make('home.index', compact('products', 'data'));
        } else {
            $brands = Brand::all();
            Session::set('brands', $brands);

            $mens = SubCategory::where('category_id', '=', 2)->get();
            $womens = SubCategory::where('category_id', '=', 1)->get();
            Session::set('mens', $mens);
            Session::set('womens', $womens);
            $promotions = Promotion::all();
            Session::set('promotions', $promotions);
            $sliders = Slider::all();
            Session::set('sliders', $sliders);
            $populars = Popular::all();
            Session::set('populars', $populars);
            $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
            Session::set('featured', $featured);


            $products = Product::where('featured', '!=', 1)->orderBy('created_at', 'desc')->paginate(9);
            return View::make('home.index', compact('products'));
        }
    }

    public function getDetails($id) {
        $current_product = Product::find($id);
        
        $brands = Brand::all();
        Session::set('brands', $brands);
        $noslider=0;
        Session::set('noslider', $noslider);
        Session::set('brands', $brands);
        $populars = Popular::all();
        Session::set('populars', $populars);
        $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
        Session::set('featured', $featured);

        $products = Product::where('featured', '!=', 1)->where('id', '!=', $id)->orderBy('created_at', 'desc')->take(6)->get();
        return View::make('home.details', compact('products', 'current_product'));
    }

    public function getCart($id) {
//        if(!isset($_GET['quality'])){
         $session_id = Session::getId();
        if (!isset($_GET['removeid'])) {
           


            $all_product = array();
            $all_product = Cart::where('session_id', '=', $session_id)->get();
//print_r($all_product);exit();
            if ($id != 0) {
                $current_product = Product::find($id);
                $check = 0;
                if (!empty($all_product)) {
                    foreach ($all_product as $prod) {
//                    print_r($prod->product_id);exit();
                        if ($prod->product_id == $current_product->id && $prod->session_id == $session_id) {
                            if (!isset($_GET['quality']) && !isset($_GET['cart_id'])) {
                                $check = 1;
                            } else {
                                $check = 0;
                            }
                            break;
                        }
                    }
                }
//             print_r($check);exit();
                if ($check == 0) {
                    $data = array();

                    $data['product_id'] = $current_product->id;
                    $data['title'] = $current_product->title;
                    $data['subtitle'] = $current_product->subtitle;
                    $data['price'] = $current_product->price;
                    $data['image'] = $current_product->image;
                    $data['image2'] = $current_product->image1;
                    $data['image3'] = $current_product->image2;
                    $data['image4'] = $current_product->image3;
                    $data['category_id'] = $current_product->category_id;
                    $data['brand_id'] = $current_product->brand_id;
                    $data['user_id'] = $current_product->user_id;
                    $data['subcategory_id'] = $current_product->subcategory_id;
                    $data['session_id'] = $session_id;
                    if (!isset($_GET['quality']) && !isset($_GET['cart_id'])) {
                        $data['quality'] = 1;
                    } else {
                        $data['quality'] = $_GET['quality'];
                    }
                    if (!isset($_GET['quality']) && !isset($_GET['cart_id'])) {
                        Cart::create($data);
                    } else {
                        $cart = Cart::findOrFail($_GET['cart_id']);
                        $cart->update($data);
                    }
                }
            }
        } else {
            Cart::destroy($_GET['removeid']);
        }

        $all_product = Cart::where('session_id', '=', $session_id)->get();
        $brands = Brand::all();
        Session::set('brands', $brands);
        $populars = Popular::all();
        Session::set('populars', $populars);
        $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
        Session::set('featured', $featured);

        $products = Product::where('featured', '!=', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return View::make('home.cart', compact('products', 'session_id', 'all_product'));
    }

    public function getCategories() {
//        print_r($_GET['price']);
//        if(!isset($_GET['page'])){
           $category_id = $_GET['cat'];
        $subcategory_id = $_GET['sub'];
        $price = $_GET['price'];
        if($_GET['sub'] == 0 && $_GET['price'] == 0){
         
                 $gotdata = Product::where('category_id', '=', $category_id)
                        ->orderBy('created_at', 'desc')->paginate(9);
        }else{
        $gotdata = Product::where('category_id', '=', $category_id)
                        ->where('subcategory_id', '=', $subcategory_id)
                        ->where('price', '>', $price)
                        ->orderBy('created_at', 'desc')->paginate(9);
        }
//        }
        $brands = Brand::all();
        Session::set('brands', $brands);
        $populars = Popular::all();
        Session::set('populars', $populars);
        $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
        Session::set('featured', $featured);
        return View::make('home.categories', compact('gotdata'));
    }

    public function getBrands() {
        $allbrands = Brand::paginate(9);
        $brands = Brand::all();
        Session::set('brands', $brands);
        $populars = Popular::all();
        Session::set('populars', $populars);
        $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
        Session::set('featured', $featured);
        return View::make('home.brands', compact('allbrands'));
    }

    public function getFeatureditem() {
        $featureditems = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->paginate(9);
        $brands = Brand::all();
        Session::set('brands', $brands);
        $populars = Popular::all();
        Session::set('populars', $populars);
        $featured = Product::where('featured', '=', 1)->orderBy('created_at', 'desc')->take(15)->get();
        Session::set('featured', $featured);
        return View::make('home.featureditem', compact('featureditems'));
    }

}
