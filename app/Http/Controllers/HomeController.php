<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Carts;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\New_;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class HomeController extends Controller
{
    public function index()
    {
        $cook=chefs::all();
        $meal=food::all();
        $user_id=Auth::id();
        $count= carts::where('user_id',$user_id)->count();
        return view("home", compact("meal","cook","count"));
    }

    public function addtocart(Request $request,$id)
    {
        if (Auth::id()) {
        $user_id=Auth::id();
        $foodid=$id;
        $quantity = $request->quantity;
        $cart=new Carts;
        $cart->user_id=$user_id;
        $cart->food_id=$foodid;
        $cart->quantity=$quantity;
        $cart->save();

        return redirect()->back();
    }else{
        return redirect('/login');
    }
    }
    public function redirects()
    {
       $usertype=Auth::user()->usertype;
       if ($usertype=='1'){
        return view('admin/adminhome');
    }
    else{

        return view('dashboard');
    }


}

public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
}


public function shoppingcart(Request $request ,$id){
    $count= carts::where('user_id',$id)->count();
    $data2=carts::select('*')->where('user_id','=',$id)->get();
    $data=carts::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
return view('shopping-cart', compact("count","data","data2"));
}

}
