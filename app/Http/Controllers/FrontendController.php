<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

      $product = Product::latest()->get();
      // return view('homepage',compact('product'));

      return view('homepage')->with(['product'=>$product]);

    }

    public function getDetail($id = -1){
      if($id == -1){
        $message = "Error in Id";
        return view("error",compact('message'));
      }
      $product = Product::find($id);
      return view("detail",compact('product'));
    }

    public function comment_add(Request $request){
      $comment = Comment::create($request->all());
      $data = Comment::latest()->get();
      return Response()->json(['success'=>true,'message'=>'your comment  has been posted',"data"=>$data]);
    }

    public function all_product(){
      $product = Product::latest()->get();
      return Response()->json(["data"=>$product]);
    }
}