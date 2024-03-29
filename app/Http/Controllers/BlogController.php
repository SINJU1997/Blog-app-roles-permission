<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'blogs'=> Blog::all()
        ];
        return view('welcome',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData=$request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $time=Carbon::now()->toDateTimeString();
        $formData['posted_at']=$time;
        Blog::create($formData);
        
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'blog'=>Blog::find($id)
        ];
        return view('blog',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $blog=Blog::find($id);
        $blog->delete();
        return redirect('/');
    }
    public function createPermission(){
       
        $role=Role::findById(2);
        $permission=Permission::findById(2);
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'add blog']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        
        $user = User::find(2);
        $user->assignRole($role);

        // return "role";
    }
}
