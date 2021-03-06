<?php
use App\Product;
use App\Order;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Home page
 * Show's products viewed 
 * Show's products ordered
 */
Route::get('/', function () {
    $product_purchased_id = old('product_id');
    $product_purchased = Product::product_cached($product_purchased_id);
    $products = Product::product_list_cached('title', 'asc');
    $orders = Order::orderBy('created_at', 'asc')->get();
    return view('home', [
        'product_purchased' => $product_purchased,
        'products' => $products,
        'orders' => $orders,
        'active_nav' => 'home',
        'products_viewed' => Session::get('products_viewed'),
    ]);
});

/**
 * Display Product List
 * Show's all products with more info link
 */
Route::get('/list', function () {
    $products = Product::product_list_cached('title', 'asc');
    return view('list', [
        'products' => $products,
        'active_nav' => 'list',
        'last_product_viewed' => Session::get('last_product_viewed'),
    ]);
});

/**
 * Display the product detail
 * Registers product view 
 * displays form with email field to submit to "buy" product
 */
Route::get('/detail/{id}', function ($id) {
    Session::put('last_product_viewed', $id);
    $products_viewed = array();
    if (Session::has('products_viewed')) {
        $products_viewed = Session::get('products_viewed');
    }
    $products_viewed[$id] = $id;
    Session::set('products_viewed', $products_viewed); 
    $product = Product::product_cached($id);
    return view('detail', [
        'product' => $product,
        'active_nav' => ''
    ]);
});

/*
 * Buying a document
 */
Route::post('/buy', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
    ]);

    if ($validator->fails()) {
        return redirect('/detail/' . $request->product_id)
            ->withInput()
            ->withErrors($validator);
    }

    // Add to Orders table
    $order = new Order;
    $order->email = $request->email;
    $order->product_id = $request->product_id;
    $order->save();
    
    // Redirect to homepage with input for feedback message
    return redirect('/')
            ->withInput();
});
