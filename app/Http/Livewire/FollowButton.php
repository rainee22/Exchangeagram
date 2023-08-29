<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowButton extends Component
{
    public $user;

    protected $listeners = ['follow', 'unFollow'];

    public function follow()
    {
        auth()->user()->follow($this->user);
    }

    public function unFollow()
    {
        auth()->user()->unFollow($this->user);
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
