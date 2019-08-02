<?php



namespace App\Http\Controllers;



use App\about;

use Illuminate\Http\Request;



class AboutController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $carts = \DB::table('carts')

                    ->join('users', 'users.id', '=', 'carts.users_id')

                    ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')

                    ->select('advertisments.*','carts.users_id',\DB::raw('COUNT(*) as cart_count'))

                    ->where('users_id',auth()->id())

                    ->groupBy('users_id')
                    
                    ->get();

        return view('about.about_us',compact('carts'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\about  $about

     * @return \Illuminate\Http\Response

     */

    public function show(about $about)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\about  $about

     * @return \Illuminate\Http\Response

     */

    public function edit(about $about)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\about  $about

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, about $about)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\about  $about

     * @return \Illuminate\Http\Response

     */

    public function destroy(about $about)

    {

        //

    }

}

