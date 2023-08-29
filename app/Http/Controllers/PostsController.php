<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return view('home', [
            'posts' => $user->feed,
            'followable' => $user->followable(),
        ]);
    }

    public function store()
    {
        $input = request()->validate([
            'photo' => ['required', 'image', 'max:5120'],
            'caption' => ['required', 'string', 'max:255'],
        ]);

        if (!($photo = Storage::put('posts', $input['photo']))) {
            return redirect()->back()
                ->with('message', 'Failed to upload photo!');
        }

        auth()->user()->posts()->create([
            'photo' => $photo,
            'caption' => $input['caption'],
        ]);

        return redirect()->back()
            ->with('message', 'Successfully posted!');
    }
}
