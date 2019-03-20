<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\DashBoardController;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\Uzytkownik;

class UserEditController extends DashBoardController
{
    public function showForm($id)
    {
        $user = Uzytkownik::find($id);
        if (!$user) {
            return redirect()->action("Dashboard\Users\UserController@index");
        }
        return view("dashboard.users.edit", ["user" => $user]);
    }

    public function save(Request $request, $id){
        $validatedData = $request->validate([
            'imie' => 'required',
            'nazwisko' => 'required',
            'password' => 'nullable',
            'plec' => [
                'required',
                Rule::in(['samica', 'samiec']),    
            ],
            'data-ur' => 'required|date|before:today',
            'admin' => 'nullable'
        ]);

        $CzlonekKlanu = Uzytkownik::find($id);
        
        if (!$CzlonekKlanu) {
            return redirect()->action("Dashboard\Users\UserController@index");
        }
        if(!empty($request->input("password"))){
            $CzlonekKlanu->password = Hash::make($validatedData["password"]);
        }

        $CzlonekKlanu->imie = $validatedData["imie"];
        $CzlonekKlanu->nazwisko = $validatedData["nazwisko"];
        $CzlonekKlanu->plec = $validatedData["plec"];
        $CzlonekKlanu->data_urodzenia = $validatedData["data-ur"];

        if (isset($validatedData["admin"])) {
            $CzlonekKlanu->admin = true;
        } else {
            $CzlonekKlanu->admin = false;
        }

        $CzlonekKlanu->save();

        return redirect()->action("Dashboard\Users\UserController@index");
    }
}
