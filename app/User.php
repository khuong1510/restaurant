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

    public function updateUser($array, $userId) {
        $message = [];

        $this->find($userId);

        if($array['formId'] == "updateForm") {
            $rules = [
                'email' => ['required',Rule::unique('users')->ignore($userId, 'id'),'email'],
                'dob'   => 'required',
                'phone' => ['digits_between: 10,11',Rule::unique('users')->ignore($userId, 'id')],
            ];

            $validate = Validator::make($array, $rules);
            if($validate->fails()) {
                $message = [
                    'errors'   => $validate->errors()->messages(),
                ];
            }
            else {
                $this->email    = $array['email'];
                $this->phone    = $array['phone'];
                $this->dob      = $array['dob'];

                $message = [
                    'message'   => "Update user personal information successed.",
                ];
            }

        }
        elseif ($array['formId'] == "updateAvatarForm") {
            $message = [
                'message'   => "Update user avatar successed.",
            ];
        }

        //$this->password = bcrypt($array['password']);
        //$this->role     = $array['role'];
        //$this->active   = $array['active'];
//        if(!empty($array['avatar'])) {
//            $this->avatar = 'default-user.png';
//        }
//        else
//        {
//            $destinationPath = 'images/users/';
//            $file = $array['avatar'];
//            $file_extension = $file->getClientOriginalExtension(); //Get file original name
//            $file_name =  "user_".str_random(4). "." . $file_extension;
//            $file->move($destinationPath , $file_name);
//            $this->avatar = $file_name;
//        }
        $this->updated_at = Carbon::now();

        $this->save();



        return $message;
    }

    /**
     * Filter user
     * @param $array
     * @param $pageSize
     * @param $currentPage
     * @return array
     */
    public function filterUser($array, $pageSize, $currentPage) {
        $arrUsers = array();
        $data = array();

        $users = $this->query();

        $users->where('name', 'like', '%'.$array['name'].'%')->get();
        $users->where('username', 'like', '%'.$array['username'].'%')->get();
        $users->where('email', 'like', '%'.$array['email'].'%')->get();
        $users->where('phone', 'like', '%'.$array['phone'].'%')->get();
        $users->where('active', $array['active'])->get();
        $users->orderBy('name', $array['name-sort'])->get();
        $users->orderBy('username', $array['username-sort'])->get();
        $users->orderBy('email', $array['email-sort'])->get();

        $users = $users->paginate($pageSize, null, null, $currentPage);

        // Calculate page number to paginate
        $numberPage = ceil($users->total()/$pageSize);

        foreach($users as $user) {
            $arrUsers[] = array(
                'id'                => $user->id,
                'name'              => $user->name,
                'username'          => $user->username,
                'phone'             => $user->phone,
                'email'             => $user->email,
                'active'            => $user->active
            );
        }

        $data['users'] = $arrUsers;
        $data['numberPage'] = $numberPage;
        $data['currentPage'] = $currentPage;
        $data['pageSize'] = $pageSize;

        return $data;
    }

}
