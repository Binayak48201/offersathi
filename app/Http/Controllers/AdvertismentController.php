<?php
namespace App\Http\Controllers;
use DB;
use App\Advertisment;
use App\Channel;
use App\Carousel;
use App\News;
use App\Brand;
use App\Homecounter;
use Illuminate\Http\Request;

class AdvertismentController extends Controller
{
	/**
	 * AdvertismentController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth:admin')->except(['index','view','latest','increaseView','show']);
	}
	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
   	{
        $s = $request->input('s');
        if ($s != '') {
            $advs = DB::table('advertisments')
                        ->where('title','LIKE','%'.$s.'%')
                        ->paginate(10);
        }else{
       		$advs = Advertisment::latest()->paginate(10);
        }
   		return view('admin.market.show',compact('advs'));
   	}
	/**
	 * @param Request $request
	 * @param Channel $channel
	 * @param Advertisment $newadv
	 * @param Brand $brand
	 * @param Homecounter $counts
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function view(Request $request, Channel $channel, Advertisment $newadv, Brand $brand, Homecounter $counts)
    {
        $counts->increment('hits');//Page Counter
        $slides = Carousel::latest()->get();
        $brands = Brand::latest()->get();
        $news = News::latest()->paginate(6);
        $s = $request->input('s');
        if($channel->exists){
            $advs =  $channel->advert()->latest()->paginate(6);
        }else{
                $advs = Advertisment::latest()->paginate(6);
        }
        return view('index',compact('advs','slides','newadv','smallslider','news','brands','s','channels'));
    }
	/**
	 * @param Request $request
	 * @param Channel $channel
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function latest(Request $request, Channel $channel)
    {
        if($channel->exists){
            $advertisments =  $channel->advert()->latest()->paginate(6);
        }else{
            $advertisments = $this->fetch($request);
        }
        $carts = $this->fetchCarts();
        return view('posts.latest_deal',compact('advertisments','carts'));
    }
    
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.market.add_advertisment');
	}
	/**
	 * @param Advertisment $advertisment
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Advertisment $advertisment)
    {
       // return $advertisment->channel_id;
         $advertisment->increment('visits');
         $carts = $this->fetchCarts();
		$advertisments = Advertisment::where('id','!=',$advertisment->id)->where('channel_id',$advertisment->channel_id)->latest()->get();
        return view('posts.show_adv',[
             'advertisment' => $advertisment,
             'carts' => $carts,
             'advertisments' => $advertisments,
             'replies' => $advertisment->replies()->latest()->paginate(10)
        ]);
    }
	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request)
	{
         $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required|exists:channels,id',
            'body' => 'required',
            'direct' => 'required',
            'adv_img' => 'required',
            'flag' => 'required'
        ]);
        $this->store_advertisment($request);
        return redirect('admin/advertisement')->with('flash','Your Advertisment has been published');
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisment  $adv
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisment $adv)
    {
        return view('admin.market.edit_advert',[
                'adv' => $adv
            ]);
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisment  $adv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adv)
    {
         $this->validate($request,[
            'title' => 'required',
            'channel_id'=>'required|',
            'body' => 'required',
            'adv_img' => 'required',
		    'flag' => 'required'
        ]);
		  if ($request->hasFile('adv_img')) {
			  foreach($request->file('adv_img') as $file){
				 $filenameWithExt = $file->getClientOriginalName();
				 // Get Just Filename
				 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
				 // Get Just ext
				 $extension = $file->getClientOriginalExtension();
				 // Filename To Store
				 $advertimagetostore = $filename . '_' . time() . '.' . $extension;
				 // Uplopad the image
				 $path = $file->storeAs('public/cover_images', $advertimagetostore);
				 $data[] = $advertimagetostore;
			  }
        }else{
            $advertimagetostore ='noimage.jpg';
        }
        $adv = Advertisment::find($adv);
        $adv->title = $request->get('title');
        $adv->channel_id = $request->get('channel_id');
        $adv->body = $request->get('body');
        $adv->direct = $request->get('direct');
        $adv->place = $request->get('place');
        $adv->discount = $request->get('discount');
        $adv->description = $request->get('description');
        $adv->count_down = $request->get('count_down');
        $adv->str_price = $request->get('str_price');
        $adv->price = $request->get('price');
        $adv->flag = $request->get('flag');
        if($request->hasFile('adv_img')){
            $adv->adv_img = json_encode($data);
        }
       $adv->save();
        return redirect('/admin/advertisement')->with('flash','Your Advertisment has been Updated.');
    }
	/**
	 * @param $adv
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy($adv)
    {
        $advs = Advertisment::findOrFail($adv);
        $advs->delete();
        return redirect('admin/advertisement')->with('flash','Sucessfully Deleted.');
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function fetch(Request $request)
    {
        $s = $request->input('s');
        if ($request->input('filter') != NULL) {
            if ($request->input('filter') == 'popular') {
                $advertisments = DB::table('advertisments')
                    ->orderBy('price', $request->input('sort'))
                    ->whereNotNull('price')
                    ->get();
            } else {
                if ($request->input('filter') == 'view') {
                    $advertisments = DB::table('advertisments')
                        ->orderBy('visits', $request->input('sort'))
                        ->whereNotNull('visits')
                        ->get();
                }
            }
        } else {
            if ($s != '') {
                $advertisments = DB::table('advertisments')
                    ->where('title', 'LIKE', '%' . $s . '%')
                    ->get();
            } else {
                $advertisments = Advertisment::latest()->get();
            }
        }
        return $advertisments;
    }
    /**
     * @param Request $request
     */
    public function store_advertisment(Request $request): void
    {
        if ($request->hasFile('adv_img')) {
            foreach($request->file('adv_img') as $file){
                $filenameWithExt = $file->getClientOriginalName();
                // Get Just Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Just ext
                $extension = $file->getClientOriginalExtension();
                // Filename To Store
                $advertimagetostore = $filename . '_' . time() . '.' . $extension;
                // Uplopad the image
                $path = $file->storeAs('public/cover_images', $advertimagetostore);
                $data[] = $advertimagetostore; 
            }
        }else{
            $advertimagetostore ='noimage.jpg';
        }
        $adv = Advertisment::create([
            'title' => request('title'),
            'channel_id' => request('channel_id'),
            'brand_id' => request('brand_id'),
            'body' => request('body'),
            'place' => request('place'),
            'discount' => request('discount'),
            'contact' => request('contact'),
            'count_down' => request('count_down'),
            'description' => request('description'),
            'str_price' => request('str_price'),
            'price' => request('price'),
            'direct' => request('direct'),
            'flag' => request('flag'),
            'adv_img' => json_encode($data)
        ]);
    }
	/**
	 * @return mixed
	 */
	public function fetchCarts()
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

