<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function feed()
    {
        return $this->hasManyThrough(
            Post::class,
            Follow::class,
            'user_id',
            'user_id',
            'id',
            'following_user_id'
        );
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )
            ->using(Follow::class)
            ->withTimestamps();
    }

    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_user_id',
            'user_id',
        )
            ->using(Follow::class)
            ->withTimestamps();
    }

    public function followable()
    {
        return self::query()
            ->withCount('follows')
            ->whereNotIn('id', [$this->id])
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }

    public function isFollowing(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follow(User $user)
    {
        if ($this->id == $user->id) {
            return false;
        }

        $this->follows()->attach($user);
    }

    public function unFollow(User $user)
    {
        if ($this->id == $user->id) {
            return false;
        }

        $this->follows()->detach($user);
    }
}
