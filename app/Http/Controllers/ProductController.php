<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Product;
use App\Comment;
use App\ProductComments;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        if($countries->count()==0){
            $countries = NULL;
        };
        $products = Product::all();
        if($products->count()==0){
            $products = NULL;
        }
        return view('shop.search',['countries'=>$countries,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]+$/|unique:products',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'country' => 'required|regex:/^[a-zA-Z ]+$/|exists:countries,name'
        ]);

        if ($validator->fails()) {
            return redirect('/products/create')->withErrors($validator);
        }
        $country = Country::Where('Name','=',$request->country)->get();
        foreach($country as $c){
            $id = $c->id;
            break;
        }
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->country_id=$id;
        $product->save();
        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'addComment' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/country/product/'.$request->product_id)->withErrors($validator);
            }
            $user_id = Auth::id();
            $product_id = $request->product_id;
            $addComment = $request->addComment;
            $comment = new Comment;
            $comment->content = $addComment;
            $comment->user_id = $user_id;
            $comment->save();
            $pc = new ProductComments;
            $pc->comment_id=$comment->id;
            $pc->product_id=$product_id;
            $pc->save();
            return redirect('/country/product/'.$product_id);
        }
        else {
            return redirect('/login');
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
        $product = Product::Where('id',$id)->get();
        $pc = ProductComments::Where('product_id','=',$id)->get();
        $collection = collect([]);
        foreach($pc as $pp){
            $collection->push($pp->comment_id);
        }
        $comments = Comment::WhereIn('id',$collection)->get();
        if($comments->count()==0){
            $comments = NULL;
        }
        return view('shop.show_product',['id'=>$id,'product'=>$product,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
