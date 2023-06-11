<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function deleteusers($id)
    {
        $data = user::find($id);
        $data->delete();

        return redirect()->back();
    }


    public function index()
    {
       $meal=food::all();
       return view("index", compact("meal"));
    }
    public function upload(Request $request)
    {

        $data = new food;
        $image = $request->image;
        $image2 = $request->image2;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->price = $request->price;
        $imagename = time() . '.' . $image2->getClientOriginalExtension();
        $request->image2->move('foodimage', $imagename);
        $data->image2 = $imagename;
        $data->save();
        return redirect()->back()->with('status', 'Food Added to Menu');
    }
    public function user()
    {
        $data = user::all();
        return view("admin.users", compact("data"));
    }
    public function deletefood($id)
    {
        $meal = food::find($id);
        $meal->delete();
        return redirect()->back()->with('deleted', 'Food Already Deleted');
    }
    public function orders()
    {

        return view("admin.orders");
    }

    public function food()
    {
        $meal = food::all();
        return view("admin.foods", compact("meal"));
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
    $meal->name=$request->name;
    $meal->price=$request->price;
    $meal->save();
    return redirect()->back()->with('status', 'Food Already Updated');
    }
}
