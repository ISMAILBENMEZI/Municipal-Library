<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        $borrowedBooks = [];

        return view('librarian.members.index', compact('user', 'borrowedBooks'));
    }

}
