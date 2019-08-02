<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function __construct()

    {

      $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {  
        $carts = DB::table('carts')
                ->join('users', 'users.id', '=', 'carts.users_id')
                ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')
                ->select('advertisments.*','carts.users_id','carts.advertisments_id',\DB::raw('COUNT(*) as cart_count'))
                ->where('users_id',auth()->id())
                ->groupBy('carts.advertisments_id')
                ->get();
//        return $carts;
        return view('cart.index',compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::create([
            'users_id' =>auth()->id(),
            'advertisments_id' => request('adv')
        ]);
        return back()->with('flash','added to your cart.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {
        // if($user->id != auth()->id())
        // {
        //     abort(403,'Unauthorized Action.');
        // }
        // Cart::find($cart)->delete();
        \DB::table('carts')->where('advertisments_id',$cart)->delete();
        return back()->with('flash','Deleted');
    }
}
