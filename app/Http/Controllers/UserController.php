<?php

namespace OEMS\Http\Controllers;

use OEMS\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['login','logout']);
    }
    
    public function index()
    {
        return view('user.index', ['page_name' => 'User Management']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newname = 'sample-user.png';

        if (isset($_FILES["img_user"])  && $_FILES["img_user"]['error'] == 0) {
            $file = $_FILES["img_user"];
            $imageFileType = strtolower(pathinfo('upload/user/'. basename($file['name']), PATHINFO_EXTENSION));
            $newname = str_replace(' ', '_', $request->txt_firstname) . "_" . str_replace(' ', '_', $request->txt_lastname) . "." .$imageFileType;
        }
        
        $data =
        [
            'image' => $newname,
            'firstname' => request('txt_firstname'),
            'middlename' => request('txt_middlename'),
            'lastname' => request('txt_lastname'),
            'email' => request('txt_email'),
            'position' => request('slc_position'),
            'designation' => request('slc_designation'),
            'section' => request('slc_section'),
            'employee_number' => request('txt_employee_num'),
            'password' => request('password'),
            'password_confirmation' => request('password_confirmation')
            
        ];
        
        $validator = $this->validator($data);
        
        
        if (!$validator->fails()) {
            move_uploaded_file($file['tmp_name'], 'upload/user/'.$newname);
            unset($data['password_confirmation']);
            $data['password'] = Hash::make(request('password')); // converts password to hash

            USER::create($data);
            // $result = response()->json(['error' => $validator->errors()->all()]);
        }

        return $validator->errors()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::show($id);
        
        return $user;
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
    public function update($id)
    {
        $validator = \Validator::make(
            request()->all(),
            [
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'position' => 'required',
                'designation' => 'required',
                'section' => 'required',
                'employee_number' => 'required'
            ]
        );

        if (!$validator->fails()) {
            $result = User::update_user($id, request()->except(['_token','_method']));
        }
        // print_r($result);
        return $validator->errors()->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load($status)
    {
        $data = User::getUsers($status);
        return $data;
    }

    public function change_status()
    {
        $status = (request('status') == 0 ? 1 : 0);
        $id = request('id');

        $result = User::change_status($id, $status);

        return $result;
    }

    public function reset_password()
    {
        $id = request('id');

        $data = User::show($id);

        $password = Hash::make($data['employee_number']);

        $result = User::reset_password($id, $password);

        // dd($result);
        return $result;
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['employee_number'=>request()->username,'password'=>request()->password])) {
            return redirect('/');
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function validator(array $data)
    {
        $validator = Validator::make($data, [
            'image' => ['string','max:50'],
            'firstname' => ['required', 'string', 'max:50'],
            'middlename' => ['string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'position' => ['required', 'string', 'max:50'],
            'designation' => ['required', 'string', 'max:50'],
            'section' => ['required', 'string', 'max:50'],
            'employee_number' => ['required', 'integer','unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        return $validator;
    }
}
