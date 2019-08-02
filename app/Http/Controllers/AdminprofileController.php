<?php

namespace App\Http\Controllers;

use App\Adminprofile;
use App\Admin;
use DB;
use Illuminate\Http\Request;

/**
 * Class AdminprofileController
 * @package App\Http\Controllers
 */
class AdminprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($adminprofile)
    {
        
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
        // dd($request->all());
         if($request->hasFile('admin_img')){
            $filenameWithExt = $request->file('admin_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('admin_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('admin_img')->storeAs('public/admin_images', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }

         $admins = Adminprofile::create([
            'address' => request('address'),
            'admin_id' =>auth()->id(),
            'body' => request('body'),
            'city' => request('city'),
            'country' => request('country'),
            'admin_img' => $fileNameToStore
         ]);
   

    return redirect('admin/adminlist')->with('flash','Your profile has been updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adminprofile  $adminprofile
     * @return \Illuminate\Http\Response
     */
    // public function edit(Admin $admin)
    // {
    //      $admins = $this->fetchadmin($admin);
    //     return view('admin.profile.edit_admin',compact('admins'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adminprofile  $adminprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminprofile)
    {
        // dd($request->all());
         // $request->creating();
        if($request->hasFile('admin_img')){
            $filenameWithExt = $request->file('admin_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('admin_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('admin_img')->storeAs('public/admin_images', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }

        $admin = Adminprofile::find($adminprofile);
        $admin->address = request('address');
        $admin->city = request('city');
        $admin->body = request('body');
        $admin->country = request('country');
         if($request->hasFile('admin_img')){
            $admin->admin_img = $fileNameToStore;
        }
        // dd($admin);
        $admin->save();

    return redirect('admin/adminlist')->with('flash','Your profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adminprofile  $adminprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminprofile $adminprofile)
    {
        //
    }
}
