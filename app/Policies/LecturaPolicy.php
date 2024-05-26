<?php

// app/Policies/LecturaPolicy.php

namespace App\Policies;

use App\Models\Lectura;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LecturaPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Lectura $lectura)
    {
        return $user->id === $lectura->user_id;
    }

    public function delete(User $user, Lectura $lectura)
    {
        return $user->id === $lectura->user_id;
    }
}
