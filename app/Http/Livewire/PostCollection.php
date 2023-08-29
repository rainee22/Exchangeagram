<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostCollection extends Component
{
    protected $data = null;
    protected $count = 0;

    protected $listeners = ['followsUpdated'];

    protected function generateFeed()
    {
        $this->data = ($feed = auth()->user()->feed);
        $this->count = $feed->count();
    }

    public function followsUpdated()
    {
        $this->generateFeed();
    }

    public function mount()
    {
        $this->generateFeed();
    }

    public function render()
    {
        return view('livewire.post-collection', [
            'posts' => $this->data,
        ]);
    }
}
