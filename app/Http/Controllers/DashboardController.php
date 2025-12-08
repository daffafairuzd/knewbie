<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('courses.details'); // Halaman Detail
    }

    public function join_success() {
        return view('courses.success_joined'); // Halaman Welcome
        }

    public function learning() {
        return view('courses.learning'); // Halaman Materi
    }
}