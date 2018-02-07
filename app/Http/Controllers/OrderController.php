<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class OrderController extends Controller
{
    public function create(Request $request) {
//        dd([1, 2]);
        $orderData = array(
            'user_id' => Auth::id(),
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity')
        );

        $result = DB::table('orders')->insert($orderData);

        if($result) {
            DB::table('products')->where('id', $request->get('product_id'))->decrement('quantity', $request->get('quantity'));
            return 'Заказ оформлен, скоро с вами свяжется продавец';
        } else {
            return 'Произошла ошибка оформления заказа';
        }
    }

    public function getUserList() {
        $orders = DB::table('orders')->where('user_id', '=', Auth::id())->get();
        return view('order.userlist', ['orders' => $orders]);
    }
}
