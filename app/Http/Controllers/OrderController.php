<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Retrieve all the orders
        $orders = Order::all();
        // Load the view and pass the orders
        return View::make('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
// Validate
// Read more on validation at http://laravel.com/docs/validation
$rules = array(
'regno' => 'required',
'regstate' => 'required',
'custname' => 'required',
'custphone' => 'required|numeric',
'vehbrand' => 'required',
'vehmodel' => 'required',
'vehyear' => 'required|numeric',
'serialno' => 'required'
);
$validator = Validator::make(Input::all(), $rules);
if ($validator->fails()) {
return Redirect::to('orders/create')
->withErrors($validator)
->withInput(Input::except('password'));
} else {
// Store the data to the database
$order = new Order;
$order->regno = Input::get('regno');
$order->regstate = Input::get('regstate');
$order->custname = Input::get('custname');
$order->custphone = Input::get('custphone');
$order->vehbrand = Input::get('vehbrand');
$order->vehmodel = Input::get('vehmodel');
$order->vehyear = Input::get('vehyear');
$order->serialno = Input::get('serialno');
$order->orderstatus = 0;
$order->createddate = Carbon::now();
$order->save();
// redirect
Session::flash('message', 'Successfully created order!');
return Redirect::to('orders');
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show($id)
{
// Retrieve the order based on the id
$order = Order::find($id);
// show the view and pass the order to it
return View::make('orders.show')
->with('order', $order);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
{
// Retrieve the order
$order = Order::find($id);
// show the edit form and pass the order
return View::make('orders.edit')
->with('order', $order);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
// Validate
// Read more on validation at http://laravel.com/docs/validation
$rules = array(
'regno' => 'required',
'regstate' => 'required',
'custname' => 'required',
'custphone' => 'required|numeric',
'vehbrand' => 'required',
'vehmodel' => 'required',
'vehyear' => 'required|numeric',
'serialno' => 'required'
);
$validator = Validator::make(Input::all(), $rules);
// process the login
if ($validator->fails()) {
return Redirect::to('orders/' . $id . '/edit')
->withErrors($validator)
->withInput(Input::except('password'));
} else {
// store
$order = Order::find($id);
$order->regno = Input::get('regno');
$order->regstate = Input::get('regstate');
$order->custname = Input::get('custname');
$order->custphone = Input::get('custphone');
$order->vehbrand = Input::get('vehbrand');
$order->vehmodel = Input::get('vehmodel');
$order->vehyear = Input::get('vehyear');
$order->serialno = Input::get('serialno');
$order->save();
// redirect
Session::flash('message', 'Successfully updated order!');
return Redirect::to('orders');
}
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
{
// Delete
$order = Order::find($id);
$order->delete();
// redirect
Session::flash('message', 'Successfully deleted the order!');
return Redirect::to('orders');
}
}
