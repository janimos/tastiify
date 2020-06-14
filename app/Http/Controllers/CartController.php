<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProducts;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth::check()) {
            $o = Order::Where('id','=',$id)->get();
            foreach($o as $t){
                    $order = $t;
            }
            $user_id = Auth::id();
            if($user_id == $order->user_id){
                $products = OrderProducts::Where('order_id','=',$id)->get();
                $ppp = array();
                foreach ($products as $ke) {
                  array_push($ppp,$ke->quantity);
                }
                //dd($ppp);
                $arr = array();
                foreach ($products as $p) {
                  $pp = Product::Where('id','=',$p->product_id)->get();
                  foreach ($pp as $key) {
                    array_push($arr,$key->Name);
                    break;
                  }
                }
                //dd($arr);
                $user = User::Where('id','=',$order->user_id)->get();
                foreach($user as $u){
                        $username = $u->name;
                }
                $mas = array_combine($arr, $ppp);
                //dd($mas);
                return view('shop.show_order',['order'=>$order,'arr'=>$arr,'username'=>$username, 'products'=>$products, 'mas'=>$mas]);
            }
            else return redirect('/');
        }
        else return redirect ('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::check()) {
            session()->pull('products');
            $product_ids = $request->product_id;
            $quantities = $request->quantity;
            $user_id = Auth::id();
            $order = new Order;
            $order->user_id = $user_id;
            $order->status = 'Sent';
            $price = 0;
            foreach(array_combine($product_ids, $quantities) as $p => $q){
                $product = Product::Where('id','=',$p)->get();
                foreach($product as $pr){
                    $price = $price + ($pr->price)*$q;
                }
            }
            $order->price = $price;
            $order->save();
            foreach(array_combine($product_ids, $quantities) as $p => $q){
                $op = new OrderProducts;
                $op->order_id = $order->id;
                $op->product_id = $p;
                $op->quantity = $q;
                $op->save();
            }
            return redirect('/orders/show/'.$order->id);
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
            session()->push('products',$request->product_id);
            return redirect('/cart');
        }
        else return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check()) {
            $products=session()->get('products');
            $product = Product::WhereIn('id',$products)->get();
            return view ('shop.cart',['products'=>$product]);
        }
        else return redirect('/login');
    }

    public function order()
    {
        if(Auth::check()){
          $user_id = Auth::id();
          $orders = Order::Where('user_id',$user_id)->get();

          return view('shop.orders', [
            'orders' => $orders,
          ]);
        } else redirect('/login');
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
