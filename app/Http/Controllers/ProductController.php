<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProductController extends Controller
{
    public function add() {
        return view('product.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:255',
            'price' => array('required', 'regex:/[0-9,.]+/'),
            'quantity' => array('required', 'regex:/[0-9]+/', 'min:1', 'max:100'),
            'description' => 'nullable',
            'image' => 'mimes:jpeg,png,gif|max:2000'
        ]);

        if($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $user = Auth::user();

        $directoryName = $user->email;

        $productData = array(
            'user_id' => $user->id,
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'created_at' => new \DateTime()
        );

        $fileResult = Storage::disk('products')->put($directoryName, $request->file('image'));
        $productData['image'] = $fileResult;

        if($request->get('description') !== null) {
            $productData['description'] = $request->get('description');
        }

        DB::table('products')->insert($productData);

        return redirect('/');

    }

    public function get($id) {
        $product = DB::table('products')->where('id', '=', $id)->first();
        return view('product.product', ['product' => $product]);
    }

    public function getMyProducts($id) {
        $products = DB::table('products')->where('user_id', '=', $id)->get();
        return view('product.myproduct', ['products' => $products]);
    }

    public function editPage($id) {
        $product = DB::table('products')->where('id', '=', $id)->first();
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request) {
        $productData = array(
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'updated_at' => new \DateTime()
        );


        if($request->file('image') !== null) {
            $user = Auth::user();
            $directoryName = $user->email;

            $fileResult = Storage::disk('products')->put($directoryName, $request->file('image'));
            $productData['image'] = $fileResult;
        }

        if($request->get('description') !== null) {
            $productData['description'] = $request->get('description');
        }
        DB::table('products')->where('id', $request->get('id'))->update($productData);
        return redirect('/product/'.$request->get('id'));
    }

}
