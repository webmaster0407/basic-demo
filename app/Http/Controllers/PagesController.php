<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }

    /**
     * Demo methods below
     */

    // Datatables
    public function showChangePasswordSection() {
        return view('layout.empty', ['page' => 'changePassword', 'pageTitle' => 'Change Your Password']);
    }

    public function showDropArea() {
        return view('layout.empty', ['page' => 'dropArea', 'pageTitle' => 'Upload New Media']);
    }

    public function showLibrary() {
        return view('layout.empty', ['page' => 'library', 'pageTitle' => 'Media Library']);
    }

}
