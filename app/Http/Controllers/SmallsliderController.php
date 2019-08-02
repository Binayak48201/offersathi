<?php
	
	namespace App\Http\Controllers;
	
	use App\Advertisment;
	use App\Smallslider;
	use Illuminate\Http\Request;
	
	class SmallsliderController extends Controller
	{
		public function __construct()
		{
			$this->middleware('auth:admin')->except('show');
		}
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$sliders = Smallslider::latest()->paginate(10);
			return view('admin.smallslider.manageslider',compact('sliders'));
		}
		public function create()
		{
			return view('admin.smallslider.add_slider');
		}
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$this->validate($request, [
				'title' => 'required',
				'channel_id' => 'required|exists:channels,id',
				'body' => 'required',
				'direct' => 'required',
				'adv_img' => 'required'
			]);
			
			$this->store_advertisment($request);
			
			return redirect('admin/slider')->with('flash','Your Slider has been published');
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Smallslider  $smallslider
		 * @return \Illuminate\Http\Response
		 */
		public function show(Smallslider $smallslider)
		{
			return view('posts.show_small_slider',[
				'advertisment' => $smallslider,
				'replies' => $smallslider->replies()->latest()->paginate(10)
			]);
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Smallslider  $smallslider
		 * @return \Illuminate\Http\Response
		 */
		public function edit($smallslider)
		{
			$smallslider = Smallslider::findOrFail($smallslider);
			return view('admin.smallslider.edit_slider',compact('smallslider'));
		}
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\Smallslider  $smallslider
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $smallslider)
		{
			$this->validate($request,[
				'title' => 'required',
				'channel_id'=>'required',
				'body' => 'required',
				'adv_img' => 'required'
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
					$path = $file->storeAs('public/smallslider_images', $advertimagetostore);
					$data[] = $advertimagetostore;
				}
			}else{
				$advertimagetostore ='noimage.jpg';
			}
			$adv = Smallslider::find($smallslider);
			$adv->title = $request->get('title');
			$adv->channel_id = $request->get('channel_id');
			$adv->body = $request->get('body');
			$adv->direct = $request->get('direct');
			$adv->place = $request->get('place');
			$adv->discount = $request->get('discount');
			$adv->count_down = $request->get('count_down');
			$adv->str_price = $request->get('str_price');
			$adv->price = $request->get('price');
			if($request->hasFile('adv_img')){
				$adv->adv_img = json_encode($data);
			}
			$adv->save();
			return redirect('/admin/slider')->with('flash','Your Smallslider has been Updated.');
		}
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Smallslider  $smallslider
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			Smallslider::find($id)->delete();
			return redirect('/admin/slider')->with('flash','Sucessfully Deleted');
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
					$path = $file->storeAs('public/smallslider_images', $advertimagetostore);
					$data[] = $advertimagetostore;
				}
			}else{
				$advertimagetostore ='noimage.jpg';
			}
			$adv = Smallslider::create([
				'title' => request('title'),
				'channel_id' => request('channel_id'),
				'brand_id' => request('brand_id'),
				'body' => request('body'),
				'place' => request('place'),
				'discount' => request('discount'),
				'contact' => request('contact'),
				'count_down' => request('count_down'),
				'str_price' => request('str_price'),
				'price' => request('price'),
				'direct' => request('direct'),
				'adv_img' => json_encode($data)
			]);
		}
	}