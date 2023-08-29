<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $likesCount = 0;

    public $newComment = '';

    protected $listeners = [
        'liked', 
        'unLiked', 
        'commentLiked', 
        'commentUnLiked'
    ];

    public function saveComment()
    {
        $this->post->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $this->newComment,
        ]);

        $this->newComment = '';

        $this->refresh();
    }

    public function liked()
    {
        $this->post->like(auth()->user());

        $this->refresh();

        $this->likesCount = $this->post->likes()->count();
    }

    public function unLiked()
    {
        $this->post->unLike(auth()->user());

        $this->refresh();

        $this->likesCount = $this->post->likes()->count();
    }

    public function commentLiked(Comment $comment)
    {
        $comment->like(auth()->user());

        $this->refresh();
    }

    public function commentUnLiked(Comment $comment)
    {
        $comment->unLike(auth()->user());

        $this->refresh();
    }

    protected function refresh()
    {
        $this->post = $this->post->refresh();
    }

    public function mount()
    {
        $this->likesCount = $this->post->likes()->count();
    }

    public function render()
    {
        return view('livewire.post');
    }
}
