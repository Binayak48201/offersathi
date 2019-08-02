<?php



namespace App\Http\Controllers;



use App\User;

use App\Userprofile;

use Illuminate\Http\Request;

class UserprofileController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

    } 

    /**

     * Display the specified resource.

     *

     * @param  \App\Userprofile  $userprofile

     * @return \Illuminate\Http\Response

     */

    public function show(User $user)

    {

        if($user->id != auth()->id()){

            abort(403, 'Unauthorized action.');

        }

        $carts =\DB::table('carts')

                    ->join('users', 'users.id', '=', 'carts.users_id')

                    ->join('advertisments', 'advertisments.id', '=', 'carts.advertisments_id')

                    ->select('advertisments.*','carts.users_id',\DB::raw('COUNT(*) as cart_count'))

                    ->where('users_id',auth()->id())

                    ->groupBy('users_id')
                    
                    ->get();

             return view('profiles.show',[

                'userProfile' => $user,

                'carts' => $carts

            ]);

   }

}

