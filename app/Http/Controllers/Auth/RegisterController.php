<?php

namespace OEMS\Http\Controllers\Auth;

use OEMS\User;
use OEMS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest');
    } */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \OEMS\User
     */
    protected function create(Request $request)
    {
        if (isset($_FILES["img_user"])) {
            $file = $_FILES["img_user"];
            $imageFileType = strtolower(pathinfo('upload/user/'. basename($file['name']), PATHINFO_EXTENSION));
            $newname = str_replace(' ', '_', $request->txt_firstname) . "_" . str_replace(' ', '_', $request->txt_lastname) . "." .$imageFileType;
        } else {
            $newname = 'sample-user.png';
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

    public function index()
    {
    }
}
