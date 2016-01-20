<?php

namespace App\Policies;

use app\Task;
use app\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public  function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function done(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
