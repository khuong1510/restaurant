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
use App\Http\Requests\UserRequest;

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
        $users = User::where('active',1);

        return view('admin.subpage.user.list', [
            'users' => $users->paginate(8)
        ]);
    }

    /**
     * Sort filter list users
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter(Request $request) {
        $users = new User;

        $old = $request->all();
        $users = $users->filterUser($request->all());

        //dd($users);

        return view('admin.subpage.user.list', [
            'users' => $users->paginate(8),
            'old'   => $old
        ]);
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
    public function create(UserRequest $request) {
        $user = new User;
        $user->insertUser($request->all());
        return redirect()->back()->with('message', 'New user have been added');
    }

    /**
     * Get edit page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit() {
        return view('admin.subpage.user.edit');
    }
}
