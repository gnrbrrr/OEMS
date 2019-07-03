<?php

namespace OEMS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Exception;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'position', 'designation', 'section', 'image', 'employee_number', 'status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function show($id)
    {
        $user = User::where('id', $id)->first();

        return $user;
    }
    public static function getUsers($status)
    {
        $user = User::where('status', $status)
            ->orderBy('id', 'desc')
            ->get();
        
        return $user;
    }

    public static function change_status($id, $new_status)
    {
        try {
            $result = User::where('id', $id)
            ->update(['status' => $new_status]);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError('Cannot change status of user. Please contact the administrator')->withInput();
        }

        return $result;
    }

    public static function update_user($id, $request)
    {
        try {
            $result = User::where('id', $id)->update($request);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError($e->getMessage())->withInput();
        }

        return $result;
    }

    public static function reset_password($id, $new_pass)
    {
        try {
            $result = User::where('id', $id)->update(['password' => $new_pass]);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError('Cannot reset password. Please contact the administrator')->withInput();
        }

        return $result;
    }
}
