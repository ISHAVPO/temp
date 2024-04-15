<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Role_Ids;
use App\Models\StudentSubject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Subject;
use App\Models\Feature;
use App\Models\Feature_Role__Ids;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function formfun()
    {
        $url = url('/form');
        $title = "REGISTRATION FORM";
        $data = compact('url', 'title');
        return view('laravel.body')->with($data);
    }
    public function formpost(Request $request)
    {
        $request->validate(
            [

                'name' => 'required|string|max:255',
                'gender' => 'required|in:M,F,O',
                'email' => 'required|string|email|max:255|unique:register,email',
                'password' => 'required|string|min:8',
                'salary' => 'required|numeric',
                'role' => 'required',
            ]

        );

        $register = new Register;//name of table
        $register->name = $request['name'];
        $register->gender = $request['gender'];
        $register->email = $request['email'];
        $register->password = Hash::make($request['password']);
        $register->salary = $request['salary'];
        $register->role_id = $request['role'];
        $register->save();
        // echo "data saved successfully";
        // if ($request['role'] == '2') {
        //     return redirect('/teach');
        // } elseif ($request['role'] == '3') {
        //     return redirect('/monitor');
        // } elseif ($request['role'] == '4') {
        //     return redirect('/stu');
        // } elseif ($request['role'] == '1') {
        //     return redirect('/dash');
        // }
            $msg="registration is successfully completed,pls login";
       

            return redirect('/login')->with('message', $msg);
    }
    public function formview()
    {
        // $data = Register::all();
        $data = DB::table('register')->simplePaginate(10);//for pagination
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";
        $record = compact('data');
        return view('laravel.formview')->with($record);
    }
    
    
    public function del($user_id)
    {
        // register::find($id)->delete();
        // echo"$user_id";die;
        $data = Register::find($user_id);
        $data->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $rec = Register::find($id);

        if (is_null($rec)) {
            return redirect('laravel.body');
        } else {
            $title = "UPDATE USER";
            $url = url('/form/update') . "/" . $id;
            $data = compact('rec', 'url', 'title');
            return view('laravel.body')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $rec = Register::find($id);
        $rec->name = $request['name'];
        $rec->email = $request['email'];
        $rec->gender = $request['gender'];
        $rec->password = Hash::make($request['password']);
        $rec->salary = $request['salary'];
        $rec->role_id = $request['role'];
        $rec->save();
        return redirect('/form/view');
    }
    public function feature()
    {

        $data = Feature::all();
        if (is_null($data)) {
            return redirect('laravel.feature');
        } else {
            return view('laravel.feature', compact('data'));
        }
    }
    public function featurepost(Request $rec)
    {
        $feature = new Feature;
        $feature->feature_name = $rec['add'];
        $feature->save();
        return redirect('/feature');
    }
    public function permission()
    {
        $roles = Role_Ids::where('id', '!=', 1)->get();
        $permissions = Feature_Role__Ids::all();
        $data = Feature::all();
        if (is_null($data)) {
            $msg = "<h2 style='color:red'>first add feature pls... </h2>";
            return redirect('laravel.feature')->with($msg);
        } else {
            return view('laravel.permission', compact('data', 'roles', 'permissions'));
        }
    }
    
    public function permissionpost(Request $rec)
    {
        $permissionsData = $rec->checkboxes;
        Feature_Role__Ids::truncate();
        if ($permissionsData !== null) {
        foreach ($permissionsData as $per) {
            list($role_id, $feature_id) = explode('-', $per);
            $existingPermission = Feature_Role__Ids::where('role_id', $role_id)
                                                    ->where('feature_id', $feature_id)
                                                    ->first();
            if (!$existingPermission) {
                $permissionModel = new Feature_Role__Ids();
                $permissionModel->role_id = $role_id;
                $permissionModel->feature_id = $feature_id;
                $permissionModel->save();
            }
        }
    
        return back();
    }
    else{
        $msg='pls select atleast 1 permission ';
        return back()->with('message',$msg);
    }
    }
    
    

    public function login()
    {
        return view('laravel.login');

    }


    public function loginpost(Request $rec)
    {
       
        $user = Register::where('email', $rec->email)->first();

        if ($user) {
            if (Hash::check($rec->password, $user->password)) {
                session()->put('role_id', $user->role_id);
               
                $role = $user->role_id;
                if ($role == '2') {
                    session()->put('user_id', $user->user_id);
                    $teacher_id=Session::get('user_id');
                    return redirect('/teach');
                } elseif ($role == '3') {
                    return redirect('/monitor');
                } elseif ($role == '4') {
                   session()->put('user_id', $user->user_id);
                   $student_id=Session::get('user_id');
                $student= StudentSubject::where('student_id', $student_id)->first();
                if ($student) {
                    return redirect('/stu');
                } else {
                    
                    return redirect('/modal');
                }
                } elseif ($role == '1') {
                    return redirect('/dash');
                }
            } else {
                session()->flash('error', 'Incorrect password');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Incorrect email');
            return redirect()->back();
        }
    }



    public function logout(Request $req)
    {
        // session()->forget('user_id');
        $req->session()->flush();

        return redirect('/login');
    }

    public function home()
    {
        $data = Register::all();
        $teacher = Register::where('role_id', 2)->count();
        $monitor = Register::where('role_id', 3)->count();
        $students = Register::where('role_id', 4)->count();
        return view('laravel.home', compact('data', 'teacher', 'monitor', 'students'));
    }
    public function filter(Request $req)
    {
        $role = $req->role;
        // dd($role);
        if ($role == 1) {
            $data = Register::all();
        } elseif ($role == 2) {
            $data = Register::where('role_id', 2)->get();
        } elseif ($role == 3) {
            $data = Register::where('role_id', 3)->get();
        } elseif ($role == 4) {
            $data = Register::where('role_id', 4)->get();
        }
        $teacher = Register::where('role_id', 2)->count();
        $monitor = Register::where('role_id', 3)->count();
        $students = Register::where('role_id', 4)->count();
        return view('laravel.home', compact('data', 'teacher', 'monitor', 'students'));
    }
    public function monitor()
    {
        $roles = Role_Ids::where('id',3)->with('feature')->get();
        return view('laravel.monitor', compact('roles'));
    }

    public function teach()
    {
        $roles = Role_Ids::where('id',2)->with('feature')->get();
        return view('laravel.teach', compact('roles'));
    }
    public function stu()
    {
        $roles = Role_Ids::where('id',4)->with('feature')->get();
    
        return view('laravel.student', compact('roles'));
    }
    public function dash(){
        return view('dash');
    }


}
