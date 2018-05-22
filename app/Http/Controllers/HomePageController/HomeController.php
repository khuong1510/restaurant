<?php

namespace App\Http\Controllers\HomePageController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show index page
     */
    public function index() {
        return view('page.subpage.homepage.index');
    }

    /**
     * Show service page
     */
    public function service() {
        return view('page.subpage.service.service');
    }

    /**
     * Show contact page
     */
    public function contact() {
        return view('page.subpage.contact.contact');
    }

    /**
     * Show menu page
     */
    public function menu() {
        return view('page.subpage.menu.menu');
    }

    /**
     * Show gallery page
     */
    public function gallery() {
        return view('page.subpage.gallery.gallery');
    }
}
