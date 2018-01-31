<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProfileController extends Controller
{
    public function show($id) {
        $user = DB::table('users')->where('id', $id)->first();
        $user->role_name = DB::table('roles')->select('role_name')->where('id', $user->role_id)->first()->role_name;
        return view('profile.index', ['user' => $user]);
    }

    public function edit($id) {
        $user = DB::table('users')->where('id', $id)->first();
        $user->role_name = DB::table('roles')->select('role_name')->where('id', $user->role_id)->first()->role_name;
        return view('profile.edit', ['user' => $user]);
    }

    public function changePassword(Request $request) {
        if(!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Вы ввели неверно ваш старый пароль");
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","Ваш новый парль не отличается от старого");
        }

        $validator = Validator::make($request->all(), array(
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed'
        ));


        if($validator->fails()) {
            return redirect()->back()->with("error","Пароль подтверждения не совпадает с новым паролем");
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Пароль успешно изменен");
    }

    public function changeInfo(Request $request) {
        //*/
        $validator = Validator::make($request->all(), array(
            'first_name' => 'nullable|regex:/[a-zA-Z]+/u',
            'last_name' => 'nullable|regex:/[a-zA-Z]+/u',
            'patronymic' => 'nullable|regex:/[a-zA-Z]+/u',
            'phone' => array('nullable', 'regex:/((\+)?(\d+)|(\-)|\(|\))+/u')
        ));

        if($validator->fails()) {
            return redirect()->back()->with('error', 'Некорректный ввод данных');
        }
        //*/
        $user = Auth::user();
        if($request->get('first_name') !== null) {
            $user->first_name = $request->get('first_name');
        }
        if($request->get('last_name') !== null) {
            $user->last_name = $request->get('last_name');
        }
        if($request->get('patronymic') !== null) {
            $user->patronymic = $request->get('patronymic');
        }
        if($request->get('phone') !== null) {
            $user->phone = $request->get('phone');
        }
        $user->save();

        return redirect()->back()->with("success","Данные успешно изменены");;
    }
}
