<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);
  
        if ($request->ajax()) {
            return datatables()::of($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contact_no' => 'required',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        $user->user_type = 1;
        $password = Hash::make($request->input('password'));
        $user->password = $password;
        //$user->is_super = $request->input('is_super')=='on'?true:false;
        $user->active = $request->input('active')=='on'?true:false;
        $user->save();
        return redirect()->route('users.home')
                        ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required'
        ]);
  
        $user = User::find($user->id);        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        if(strlen($request->input('password'))>7)        
        {
            $password = Hash::make($request->input('password'));
            $user->password = $password;
        }                
        //$user->is_super = $request->input('is_super')=='on'?true:false;
        $user->user_type = 1;
        $user->active = $request->input('active')=='on'?true:false;
        $user->save();
        
        return redirect()->route('users.home')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from users where id = ?',[$id]);
        return redirect()->route('users.home')
                        ->with('success','User deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $users=DB::table('users')->where('email','LIKE','%'.$request->search."%")
            ->orWhere('name','LIKE','%'.$request->search."%")
            ->get();

            if($users)
            {
                foreach ($users as $key => $user) 
                {
                $output.='<tr>'.

                '<td>'.$user->id.'</td>'.

                '<td>'.$user->name.'</td>'.

                '<td>'.$user->email.'</td>'.
                '<td>'.$user->contact_no.'</td>';
                if($user->active)                     
                {
                    $output.='<td><i class="fas fa-check"></i></td>';                    
                }
                else
                {
                    $output.='<td></td>';
                }
                $output .= '<td><form action="'.url('user/destroy')."/".$user->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('user/show').'/'.$user->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('user/edit').'/'.$user->id.'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form></td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }
}
