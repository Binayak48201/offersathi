<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Advertisment;
use App\Channel;
use App\Carousel;
use App\News;
use App\User;
use App\Brand;
use App\Homecounter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('view');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request,Channel $channel, Advertisment $newadv,Homecounter $counts,User $user)
    {
        $counts->increment('hits');//Page Counter
        $slides = Carousel::latest()->get();
        $brands = Brand::latest()->get();
        $smallslider = Advertisment::where('flag',2)->latest()->paginate(20);
        $posts = Advertisment::where('flag',3)->latest()->paginate(6);
        $news = News::latest()->paginate(6);
        $user = auth()->id();
        $carts = $this->fetchCart($user);
        $s = $request->input('s');
        if($channel->exists){
            $advs =  $channel->advert()->latest()->paginate(20);
        }else{
            $advs = Advertisment::where('flag',1)->latest()->paginate(20);
        }
        return view('welcome',compact(
            'advs',
            'slides',
            'newadv',
            'smallslider',
            'news',
            'brands',
            's',
             'posts',
            'carts'));

    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
    {
        return view('home');
    }
    /**
     * @param $user
     * @return instance mixed
     */
    public function fetchCart($user)
    {
        return \DB::table('carts')
        ->join('users', 'users.id', '=', 'carts.users_id')
        ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')
        ->select('advertisments.*','carts.users_id',\DB::raw('COUNT(*) as cart_count'))
        ->where('users_id',auth()->id())
        ->groupBy('users_id')
        ->get();
    }
}