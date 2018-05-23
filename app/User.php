<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * create new user
     * @param $array
     */
    public function insertUser($array) {

        $this->name     = $array['name'];
        $this->username = $array['username'];
        $this->email    = $array['email'];
        $this->phone    = $array['phone'];
        $this->gender   = $array['gender'];
        $this->dob      = $array['dob'];
        $this->password = bcrypt($array['password']);
        //$this->role     = $array['role'];
        $this->active   = $array['active'];
        if(empty($array['avatar'])) {
            $this->avatar = 'default-user.png';
        }
        else
        {
            $destinationPath = 'images/users/';
            $file = $array['avatar'];
            $file_extension = $file->getClientOriginalExtension(); //Get file original name
            $file_name =  "user_".str_random(4). "." . $file_extension;
            $file->move($destinationPath , $file_name);
            $this->avatar = $file_name;
        }
        $this->created_at = Carbon::now();

        $this->save();
    }

    public function filterUser($array) {
        $users = $this->query();

        if($array['name'] != '') {
            $users->where('name', 'like', '%'.$array['name'].'%')->get();
        }
        if($array['username'] != '') {
            $users->where('username', 'like', '%'.$array['username'].'%')->get();
        }
        if($array['email'] != '') {
            $users->where('email', 'like', '%'.$array['email'].'%')->get();
        }
        if($array['phone'] != '') {
            $users->where('phone', 'like', '%'.$array['phone'].'%')->get();
        }
        $users->where('active', $array['active'])->get();
        return $users;
    }

}
