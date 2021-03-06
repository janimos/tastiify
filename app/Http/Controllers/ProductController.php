<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Product;
use App\Comment;
use App\ProductComments;
use App\Keyword;
use App\ProductKeywords;
use App\ProductDescriptionPhoto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Response;
use Image;
use Illuminate\Support\Facades\Storage;
use DB;

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
        if (Auth::check()) {
            if(Auth::user()->isAdmin()){
                $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^[a-zA-Z ]+$/|unique:products',
                    'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                    'country' => 'required|regex:/^[a-zA-Z ]+$/|exists:countries,name',
                    'description' => 'required|string|max:2000',
                    'upload' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
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
                $keywords = $request->keywords;
                foreach ($keywords as $key) {
                    $product_keyword = new ProductKeywords;
                    $kk = Keyword::Where('Name','=',$key)->get();
                    $pp = Product::Where('Name','=', $request->name)->get();
                    foreach ($kk as $k) {
                        $k_id = $k->id;
                    }
                    foreach ($pp as $p) {
                        $p_id = $p->id;
                    }
                    $product_keyword->keyword_id = $k_id;
                    $product_keyword->product_id = $p_id;
                    $product_keyword->save();
                }

                $file = $request->file('upload');
                $img = Image::make($file);
                Response::make($img->encode('jpeg'));

                $var = new ProductDescriptionPhoto;
                $var->image = $img;
                $var->description = $request->description;
                $var->product_id = $p_id;
                $var->save();

                return redirect('/admin');
            }
            else return redirect ('/');
        }
        else return redirect('/login');
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
        if($product->count() > 0){
          $pc = ProductComments::Where('product_id','=',$id)->get();
          $collection = collect([]);
          foreach($pc as $pp){
              $collection->push($pp->comment_id);
          }
          $comments = Comment::WhereIn('id',$collection)->get();
          if($comments->count()==0){
              $comments = NULL;
          }
          $description = ProductDescriptionPhoto::Where('product_id',$id)->get();
        //dd($description->count());
          if($description->count() == 0) $desc = NULL;
          else {
            foreach ($description as $key) {
              $desc = $key;
              break;
            }
          }
          //dd($desc);
          return view('shop.show_product',['id'=>$id,'product'=>$product,'comments'=>$comments, 'desc'=>$desc]);
        }
        else return redirect('/');
    }

    public function show_create()
    {
      if(Auth::check() && Auth::user()->isAdmin()){
        $keywords = Keyword::all();
        if($keywords->count()==0){
            $keywords = NULL;
        }
        return view('shop.admin_pages.add_product', ['keywords' => $keywords]);
      } else return redirect('/');
    }
    public function show_edit()
    {
      if(Auth::check() && Auth::user()->isAdmin()){
        $keywords = Keyword::all();
        if($keywords->count()==0){
            $keywords = NULL;
        }
        return view('shop.admin_pages.edit_product', ['keywords' => $keywords]);
      } else return redirect('/');
    }


    public function show_search()
    {
        return view('shop.pr_search');
    }
    public function search(Request $request)
    {
      if($request->ajax()){
        $output = "";
        $products = Product::Where('Name','LIKE','%'.$request->search."%")->get();
        if($products){
          foreach ($products as $key) {
            $country = Country::Where('id',$key->country_id)->get();
            foreach ($country as $c) {
              $name = $c->Name;
              break;
            }
            $output.='<tr>'.
            '<td><a href="/country/product/'.$key->id.'">'.$key->Name.'</a></td>'.
            '<td>'.$name.'</td>'.
            '<td>'.$key->price.'</td>'.
            '</tr>';
          }
          return Response($output);
        }
      }
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
