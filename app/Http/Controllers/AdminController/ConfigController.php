<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Config;

class ConfigController extends Controller
{
    public function showHomepage() {
        $allConfigs = new Config();
        return view('admin.subpage.config.homepage', [ 'allConfigs' => $allConfigs ]);
    }

    public function updateHomepage(Request $request) {
        $config = new Config();
        $errors = $config->updateHomepageConfig($request->all());
        if(empty($errors)) {
            \Session::flash('success_message', 'Update config successful.');
        }
        else {
            \Session::flash('error_message', $errors);
        }
        return redirect()->back();
    }
}
