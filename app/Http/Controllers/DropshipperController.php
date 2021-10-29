<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\banner;
use Spatie\Permission\Models\Role;
use App\Models\logController;
use DB;
use Hash;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;

class DropshipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        if($request->id){
            $data = User::role('dropshipper')->where('spid',$request->id)->paginate(5);
        }
        else{
            $data = User::role('dropshipper')->where('spid',Auth::user()->id)->paginate(5);
        }
        // $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.dropshippers.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.dropshippers.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('dropshippers.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.dropshippers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.dropshippers.edit', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        $log = new logController();
        $log->title = "Edit Seller ";
        $log->description = "Seller #" .$id. " detail edit by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();

        return redirect()->route('dropshippers.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        $log = new logController();
        $log->title = "Delete Seller ";
        $log->description = "Seller #" .$id. " Deleted by #". Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
        $log->save();

        return redirect()->route('dropshippers.index')
            ->with('success', 'User deleted successfully');
    }

    // seller register

    public function dropregist_page(Request $request, $id)
    {
        return view('dropshipperRegister', compact('id'));
    }
    public function register_dropShipper(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        $input['spid'] = $id;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->back()->with('success','Your Request Successfully Submitted');
        // Auth::login($user);

        // return redirect('admin/dashboard');
    }

    
     
}
