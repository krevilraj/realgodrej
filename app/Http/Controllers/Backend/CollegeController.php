<?php

namespace App\Http\Controllers\Backend;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //when we need to show list of the College
      $address = Address::get();
      return view('backend.College.list',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //When need to show create form page
      return view('backend.Address.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert function
      $imageName = time().'.'.request()->image->getClientOriginalExtension();
      request()->image->move(public_path('images'), $imageName);


      $input = $request->all();
      $input['image'] = $imageName;

      Address::create($input);
      return redirect()->back()->with('message', 'Address saved :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show detail form page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //show edit form page
      $address = Address::find($id);
      return view('backend.College.edit',compact('address'));
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
        //update function
      if($request->hasFile('image')){
        //delete old image and update new one

        // delete the old image
        $address = Address::find($request->id);
        $path = public_path()."/images/".$address->image;
        unlink($path);

        //upload new image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $input = $request->all();
        $input['image'] = $imageName;
        $address->update($input);
      }else{
        // no change
        $address = Address::find($request->id);
        $address->update($request->all());
      }
      return redirect()->back()->with('message', 'Address updated Successfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the college record
      $address = Address::find($id);
      $path = public_path()."/images/".$address->image;
      unlink($path);
      $address->delete();
      return redirect()->back()->with('message', 'Address deleted Successfully :)');
    }
}
