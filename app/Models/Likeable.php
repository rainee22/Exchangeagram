<?php

namespace App\Models;

trait Likeable
{
    public function isLikedBy(User $user)
    {
        if (!$this->likes) {
            return false;
        }

        return $this->likes->contains('user_id', $user->id);
    }

    public function like(User $user)
    {
        if ($this->isLikedBy($user)) {
            return;
        }

        return $this->likes()->create([
            'user_id' => $user->id,
        ]);
    }

    public function unLike(User $user)
    {
        if (!$this->isLikedBy($user)) {
            return;
        }

        return $this->likes()->where('user_id', $user->id)->delete();
    }
}