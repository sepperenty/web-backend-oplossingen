<?php

/**
 * Created by PhpStorm.
 * User: Eigenaar
 * Date: 15/01/2016
 * Time: 18:14
 */

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{


    public function forUser(User $user)
    {
        return Task::where("user_id", $user->id)->where("done", "0")->orderBy("created_at", "asc")->get();
    }

    public  function doneForUser(User $user)
    {
        return Task::where("user_id", $user->id)->where("done", "1")->orderBy("created_at", "asc")->get();
    }
}