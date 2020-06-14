<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
      if(Auth::check() && Auth::user()->isAdmin())
        return view('shop.admin_pages.panel');
      else return redirect('/');
   }
   public function delete_products(){
     if(Auth::check() && Auth::user()->isAdmin())
       return view('shop.admin_pages.delete_product');
     else return redirect('/');
  }
  public function delete_countries(){
    if(Auth::check() && Auth::user()->isAdmin())
      return view('shop.admin_pages.delete_country');
    else return redirect('/');
 }

    public function __invoke() {
        return view('shop.admin_pages.panel');
    }

}
