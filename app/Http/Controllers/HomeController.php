<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requestData = $request->all();
        if(isset($requestData['sort'])) {
            switch($requestData['sort']) {
                case 'product_name':
                    $sortBy = 'product_name';
                    break;
                case 'price':
                    $sortBy = 'price';
                    break;
                default:
                    $sortBy = 'created_at';
                    break;
            }
        } else {
            $sortBy = 'created_at';
        }


        $products = DB::table('products')->where('quantity', '>', 0)->orderBy($sortBy)->paginate(12);
        return view('index', ['products' => $products]);
    }
}
