<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Get login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin() {
        return view('admin.subpage.login.login');
    }

    /**
     * Execute login request
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) {
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'active'   => 1]))
        {
            $message = 'User '.Auth::user()->fullname.' have been log in successful.';
            return redirect('/admin/')->with('message', $message);
        }
        else {
            return redirect()->back()->with('message', 'Your username or password is incorrect.');
        }
    }

    /**
     * Log out admin page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(){
        Auth::logout();
        return redirect('/admin/login')->with('message', 'Bạn đã đăng xuất thành công');
    }

    /**
     * Get list users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list() {
        $pageSize = 10;
        $users = User::where('active',1)->orderBy('name', 'asc');

        return view('admin.subpage.user.list', [
            'users' => $users->paginate($pageSize)
        ]);
    }

    /**
     * Sort filter list users
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter(Request $request) {
        $pageSize = 10;
        $currentPage = $request['current-page'];

        $users = new User;
        $data = $users->filterUser($request->all(), $pageSize, $currentPage);

        return json_encode($data);
    }

    /**
     * Get add page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add() {
        return view('admin.subpage.user.add');
    }

    /**
     * Execute create new user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(StoreUserRequest $request) {
        $user = new User;
        $user->insertUser($request->all());
        return redirect()->back()->with('message', 'New user have been added');
    }

    /**
     * Get edit page
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId) {
        $user = User::find($userId);
        return view('admin.subpage.user.edit', [ 'user' => $user ]);
    }

    public function update(Request $request) {
        //dd($errors->all());
        $userId = $request->userId;
        $user = User::find($userId);
        $message = $user->updateUser($request->all(), $userId);

        return json_encode($message);
    }
}
