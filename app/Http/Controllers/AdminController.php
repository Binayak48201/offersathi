<?php



namespace App\Http\Controllers;



use App\Admin;

use App\Adminprofile;

use App\Task;

use App\Advertisment;

use App\Channel;

use App\Carousel;

use App\Smallslider;

use App\News;

use App\Brand;

use App\User;

use App\Homecounter;

use Carbon\Carbon;

use DB;

use Illuminate\Http\Request;



/**

 * Class AdminController

 * @package App\Http\Controllers

 */

class AdminController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    // public function __construct()

    // {

    //   $this->middleware('auth:admin');

    // }





      /**

       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

       */

      public function index()

      {

        $tasks = Task::latest()->get();

        $usercount = User::count();

        $advcount = Advertisment::count();

        $catcount = Channel::count();

        $newscount = News::count();

        $bigcount = Carousel::count();

        $brandcount = Brand::count();

        $advertisment = Advertisment::get()->all();

        $pagecount = Homecounter::get()->all();

        return view('admin.admin',

          compact('advertisment','usercount','advcount','catcount','newscount','bigcount','brandcount','pagecount','tasks'));

      }





    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function view()

    {

      // $admins = \DB::table('admins')

      // ->select('admins.*','admins.created_at as createdat', 'admin_profiles.*','roles.*')

      // ->leftJoin('roles', 'admins.role_id', '=', 'roles.id')

      // ->leftJoin('admin_profiles', 'admin_profiles.admin_id', '=', 'admins.id')

      // ->paginate(10);

      $admins = Admin::latest()->paginate(10);

      return view('admin.auth.view_admin',compact('admins'));

    }



    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function create()

    {

        // $this->authorize('update');

      return view('admin.auth.create');

    }



    /**

     * @param Request $request

     * @return \Illuminate\Http\RedirectResponse

     * @throws \Illuminate\Validation\ValidationException

     */

    public function store(Request $request)

    {

        // $this->authorize('update');

     $this->validate(request(),[

      'name' => 'required|string|max:255',

      'email' => 'required|string|email|max:255|unique:users',

      'password' => 'required|string|min:6'

    ]);

     $req = request(['name','email','password']);

     $req['password'] = bcrypt('password');

       // dd($req);

     $admin = Admin::create($req);

       // auth()->login($admin);

     return redirect('/admin/adminlist')->with('flash','New Admin User Has been Successfuly Created');

   }



    /**

     * @param Admin $admin

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function show(Admin $admin)

    {

      // return $admin;

      // $admin_id = $admin->id;

      $adminss = $this->fetchadmin($admin);

      // $adminss =  Admin::find($admin_id)->profiles;

      // dd($adminss);s

      return view('admin.profile.view_profile',

        [

          'adminUser' => $admin,

          'relatiosss' => $adminss

        ]);

    }



    /**

     * @param Admin $admin

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function edit(Admin $admin)

    {

     $admins = $this->fetchadmin($admin);

     // dd($admins);

     return view('admin.profile.edit_admin',compact('admins'));

   }



    /**

     * @param Request $request

     * @param $admin

     * @return \Illuminate\Http\RedirectResponse

     */

    public function update(Request $request, $admin)

    {

    //  $admins = Admin::find($admin);

    // $admins->email = request('email');

    //    $admins->save();

    // $adddmin = Adminprofile::find($adminprofile);

    // $adddmin->address = request('address');

    // $adddmin->city = request('city');

    // $adddmin->country = request('country');



    // $adddmin->save();



      return redirect('admin/adminlist')->with('flash','Your profile has been updated.');



    }



    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function viewadmin()

    {        

      $adminCount = Admin::count();

      $admins = Admin::latest()->paginate(10);

      return view('admin.user.viewadmin',compact('adminCount','admins'));

    }



    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function icons()

    {

      return view('admin.extra.font');

    }



    /**

     * @param Request $request

     * @param $admin

     * @return \Illuminate\Http\RedirectResponse

     */

    public function destroy(Request $request, $admin)

    {



     $admins = Admin::where('role_id', $request->input('admin'))->get()->each->delete();

     return redirect('/admin/adminlist')->with('flash','Successfuly deleted');



   }

     /**

     * @param Request $request

     * @param Task $task

     * @return \Illuminate\Http\RedirectResponse

     */

     public function taskstore(Request $request, Task $task)

     {   

      // dd($request->all());

      $attributes = request()->validate(['task' => 'required']);

      $task = Task::create([

        'task' => request('task'),

        'user_id' => auth()->id()

      ]);

        // $task->addTask(request('task'));



      return back();

    }



    /**

     * @param Task $task

     * @return \Illuminate\Http\RedirectResponse

     */

    public function taskupdate(Task $task)

    {

      $task->update([

        'completed' => request()->has('completed')

      ]);

      return back();

    } 

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    /**

     * @param Admin $admin

     * @return mixed

     */

    public function fetchadmin(Admin $admin)

    {

      $adminss = \DB::table('admins')

      ->leftJoin('admin_profiles', 'admins.id', '=', 'admin_profiles.admin_id')

      ->where('admins.id', $admin->id)

      ->get();

      return $adminss;

    }

  }

