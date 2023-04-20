<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function user()
    {
        $data=user::all();
        return view("admin.users",compact("data"));
    }
    public function chefs()
    {

        $cooks=chefs::all();
        return view("admin.chefs", compact("cooks"));
    }
    public function orders()
    {

        return view("admin.orders");
    }

    public function food()
    {
$meal=food::all();
        return view("admin.foods",compact("meal"));
    }
    public function uploadfood(Request $request)
    {

      $data = new food;
      $image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('foodimage',$imagename);
$data->image=$imagename;
    $data->title=$request->title;
    $data->price=$request->price;
    $data->save();
    return redirect()->back();
    }
    public function deleteusers($id)
    {
        $data=user::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function deletefood($id)
    {
$meal=food::find($id);
$meal->delete();
return redirect()->back();
    }
    public function updatefood($id)
    {
$meal=food::find($id);
return view("admin.updatefood",compact("meal"));
    }

    public function updatemeal(Request $request,$id)
    {
$meal=food::find($id);
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('foodimage',$imagename);
$meal->image=$imagename;
    $meal->title=$request->title;
    $meal->price=$request->price;
    $meal->save();
    return redirect()->back();
    }

    public function uploadchefs(Request $request)
    {

      $chef = new chefs;
      $image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('chefimage',$imagename);
$chef->image=$imagename;
    $chef->name=$request->name;
    $chef->description=$request->description;
    $chef->save();
    return redirect()->back();
    }

    public function deletechef($id)
    {
        $chef=chefs::find($id);
        $chef->delete();

        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
}
}
