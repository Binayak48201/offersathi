<?php



namespace App\Http\Controllers;



use App\Brand;

use Illuminate\Http\Request;



class BrandController extends Controller

{



    public function __construct()

    {

        $this->middleware('auth:admin')->except(['view','show']);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Brand $brand)

    {



        $brands = Brand::latest()->paginate(10);

        return view('admin.brands.view_brands',compact('brands'));

    }



    public function view()

    {

        $brands = Brand::latest()->paginate(30);

        $carts = \DB::table('carts')

                    ->join('users', 'users.id', '=', 'carts.users_id')

                    ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')

                    ->select('advertisments.*','carts.users_id',\DB::raw('COUNT(*) as cart_count'))

                    ->where('users_id',auth()->id())

                    ->groupBy('users_id')
                    
                    ->get();

        return view('brand.brand_view',compact('brands','carts'));

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.brands.add_brands');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request,[

            'brand_name' => 'required',

            'body' => 'required',

            'brand_img' => 'required'

        ]);



            if($request->hasFile('brand_img')){

            $filenameWithExt = $request->file('brand_img')->getClientOriginalName();

            // Get Just Filename

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get Just ext

            $extension = $request->file('brand_img')->getClientOriginalExtension();

            // Filename To Store

            $brandimagetostore = $filename.'_'.time().'.'.$extension;

            // Uplopad the image

            $path =$request->file('brand_img')->storeAs('public/brand_images', $brandimagetostore);

        }else{

            $brandimagetostore ='noimage.jpg';          

        }

         

       $adv = Brand::create([

            'brand_name' => request('brand_name'),

            'body' => request('body'),

            'brand_img' => $brandimagetostore

        ]);

        return redirect('admin/view_brands')->with('flash','Your Brand has been published');

    } 



    /**

     * Display the specified resource.

     *

     * @param  \App\brand  $brand

     * @return \Illuminate\Http\Response

     */

    public function show(Brand $brand)

    {

        $brand->increment('visits_brand');

        $carts = \DB::table('carts')

                    ->join('users', 'users.id', '=', 'carts.users_id')

                    ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')

                    ->select('advertisments.*','carts.users_id',\DB::raw('COUNT(*) as cart_count'))

                    ->where('users_id',auth()->id())

                    ->groupBy('users_id')
                    
                    ->get();

        if($brand->exists)

        {

            $brands =  $brand->branding()->latest()->paginate(15);

        }

        return view('brand.show_brand',compact('brand','brands','carts'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\brand  $brand

     * @return \Illuminate\Http\Response

     */

    public function edit(brand $brand)

    {

        return view('admin.brands.edit_brands',compact('brand'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\brand  $brand

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request,$brand)

    {

       $this->validate($request,[

            'brand_name' => 'required',

            'body' => 'required',

            'brand_img' => 'required'

        ]);



            if($request->hasFile('brand_img')){

            $filenameWithExt = $request->file('brand_img')->getClientOriginalName();

            // Get Just Filename

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get Just ext

            $extension = $request->file('brand_img')->getClientOriginalExtension();

            // Filename To Store

            $brandimagetostore = $filename.'_'.time().'.'.$extension;

            // Uplopad the image

            $path =$request->file('brand_img')->storeAs('public/brand_images', $brandimagetostore);

        }else{

            $brandimagetostore ='noimage.jpg';          

        }

        $brand = Brand::find($brand);

        $brand->brand_name = $request->get('brand_name');

        $brand->body = $request->get('body');



        if($request->hasFile('brand_img')){

            $brand->brand_img = $brandimagetostore;

        }

       $brand->save();



        return redirect('admin/view_brands')->with('flash','Your Brand has been Updated');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\brand  $brand

     * @return \Illuminate\Http\Response

     */

    public function destroy(brand $brand)

    {

        //

    }

}

