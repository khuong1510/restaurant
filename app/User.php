<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
     * Create new user
     *
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

    /**
     * Update user using Ajax
     *
     * @param $array
     * @param $userId
     * @return array|bool
     */
    public function updateUser($array, $userId) {
        $message = [];
        $rules = $this->updateUserRule($userId);

        $this->find($userId);

        // Change personal information form
        if($array['formId'] == "updateForm")
            $message = $this->changePersonalInfo($array, $rules['updateForm']);
        // Change user avatar form
        elseif ($array['formId'] == "updateAvatarForm")
            $message = $this->changeUserAvatar($array, $rules['updateAvatarForm']);
        // Change password form
        else
            $message = $this->changePassword($array, $rules['updatePasswordForm']);

        $this->updated_at = Carbon::now();
        $this->save();

        return $message;
    }

    /**
     * Check validate for updateUser function
     *
     * @param $array
     * @param $rules
     * @return array|bool
     */
    public function checkValidate($array, $rules) {
        $validator = Validator::make($array, $rules);

        if($validator->fails()) {
            $arrErrors = array();
            foreach ($validator->errors()->messages() as $msgs) {
                foreach ($msgs as $msg) {
                    $arrErrors[] = $msg;
                }
            }

            $message = [
                'errors'   => $arrErrors,
            ];
            return $message;
        }
        return false;
    }

    /**
     * Filter user
     *
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

    /**
     * Change user status
     *
     * @return array
     */
    public function changeStatus() {

        if($this->active == 0) {
            $this->active = 1;
            $message = [ 'message' => "User have been enabled" ];
        }
        else {
            $this->active = 0;
            $message = [ 'message' => "User have been disabled" ];
        }
        $this->save();
        return $message;
    }

    /**
     * Rules to update user
     *
     * @param int $userId
     * @return array
     */
    private function updateUserRule(int $userId) : array
    {
        return [
            'updateForm' => [
                'email' => ['required',Rule::unique('users')->ignore($userId, 'id'),'email'],
                'dob'   => 'required',
                'phone' => ['digits_between: 10,11',Rule::unique('users')->ignore($userId, 'id')],
            ],
            'updateAvatarForm' => [
                'avatar' => 'max:6000|dimensions:min_width=100,min_height=100',
            ],
            'updatePasswordForm' => [
                'old_password'  => 'required',
                'password'      => 'required|confirmed|min:6|different:old_password',
            ]
        ];
    }

    /**
     * Change personal info action
     *
     * @param array $array
     * @param array $rules
     * @return array
     */
    private function changePersonalInfo(array $array, array $rules) : array
    {
        $message = $this->checkValidate($array, $rules);

        if(!$message) {
            $this->email    = $array['email'];
            $this->phone    = $array['phone'];
            $this->dob      = $array['dob'];

            $message = [
                'message'   => "Update user personal information successful.",
            ];
        }
        return $message;
    }

    /**
     * Change user avatar action
     *
     * @param array $array
     * @param array $rules
     * @return array
     */
    private function changeUserAvatar(array $array, array $rules) : array
    {
        if($array['avatar']) {
            $message = $this->checkValidate($array, $rules);

            if(!$message) {
                $destinationPath = 'images/users/';
                $file = $array['avatar'];
                $file_extension = $file->getClientOriginalExtension(); //Get file original name
                $file_name =  "user_".str_random(4). "." . $file_extension;
                $file->move($destinationPath , $file_name);
                $this->avatar = $file_name;
                $message = [
                    'message'   => "Update user avatar successful.",
                    'avatar'    => $file_name
                ];
            }

        }
        else {
            $message = [
                'errors'   => [ "The avatar field is required."]
            ];
        }
        return $message;
    }

    /**
     * Change password action
     *
     * @param array $array
     * @param array $rules
     * @return array
     */
    private function changePassword(array $array, array $rules) : array
    {
        $message = $this->checkValidate($array, $rules);

        if(!$message) {
            if(!Hash::check($array['old_password'], $this->password)) {
                $message = [
                    'errors'   => [ "Wrong current password." ],
                ];
            }
            else {
                $this->password = bcrypt($array['password']);
                $message = [
                    'message'   => "Update user password successful.",
                ];
            }

        }
        return $message;
    }
}
