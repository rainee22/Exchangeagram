<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RecommendedUsers extends Component
{
    protected $listeners = ['follow', 'unFollow'];

    public function follow(User $user)
    {
        $this->emitTo('post-collection', 'followsUpdated');

        auth()->user()->follow($user);
    }

    public function unFollow(User $user)
    {
        $this->emitTo('post-collection', 'followsUpdated');

        auth()->user()->unFollow($user);
    }

    public function render()
    {
        return view('livewire.recommended-users', [
            'users' => auth()->user()->followable(),
        ]);
    }
}
