<?php

namespace App\Users;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\DateTime\HasTimestamps;
use App\Replies\HasManyReplies;

final class EloquentUser extends Authenticatable implements User
{
    use HasManyReplies, HasTimestamps;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'username', 'password', 'ip'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function githubUsername(): string
    {
        return $this->github_url;
    }

    public function gratavarUrl($size = 100): string
    {
        $hash = md5(strtolower(trim($this->email)));

        return "https://www.gravatar.com/avatar/$hash?s=$size";
    }
}
