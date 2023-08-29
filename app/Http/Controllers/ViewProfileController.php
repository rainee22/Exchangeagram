<?php

namespace App\Http\Controllers;

use App\Models\User;

class ViewProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $user->load(['follows', 'following']);

        return view('profile', [
            'user' => $user,
        ]);
    }
}
