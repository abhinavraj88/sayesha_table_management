<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
class AdminController extends Controller
{
    //
    public function users(){
        $data=user::all();
        return view("admin.users",compact("data"));
    }
    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    public function foodmenu(){

        $data= food::all();
    
        return view("admin.foodmenu",compact('data'));
    }
    public function upload(Request $request){

        $data = new food;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('foodimage', $imagename);

        // Assign to $data instead of $date
        $data->image = $imagename;

        $data->title = $request->title;

        $data->price = $request->price;

        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }

    public function deletemenu($id){

        $data=food::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function updatemenu($id){

        $data=food::find($id);
       
        return view("admin.updatemenu",compact('data'));

    }

    public function update(Request $request , $id){
        $data=food::find($id);
        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('foodimage', $imagename);

        // Assign to $data instead of $date
        $data->image = $imagename;

        $data->title = $request->title;

        $data->price = $request->price;

        $data->description = $request->description;

        $data->save();

        return redirect()->back();

    }

    public function reservation(Request $request){

        $data = new reservation;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $data->guest = $request->guest;

        $data->date = $request->date;

        $data->time = $request->time;

        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('success', 'Reservation submitted successfully!');
    }

    public function viewreservation(){
        $data=reservation::all();
        return view("admin.adminreservation",compact('data'));
    }

}
