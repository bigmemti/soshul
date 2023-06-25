<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowLinksController extends Controller
{
    public function index(User $user)
    {
        $links = $user->links;

        return view('show-link', [
            'links' => $links,
            'user' => $user
        ]);
    }
}
