<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Comentario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComentarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the comentario.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comentario  $comentario
     * @return mixed
     */
    public function update(User $user, Comentario $comentario)
    {
        // Allow updating if the user owns the comment
        return $user->id === $comentario->user_id;
    }
}
