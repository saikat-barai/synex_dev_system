<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Member;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function user_login(){
        return view('includes.login');
    }
    public function developers(){
        $developers = Developer::all();
        return view('frontend.developer.developer',compact('developers'));
    }
    public function members(){
        $members = Member::latest()->paginate(5);
        return view('frontend.member.member',compact('members'));
    }
    public function dashboard(){
        return view('includes.dashboard');
    }
}
