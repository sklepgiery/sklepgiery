<?php

namespace App\Policies;

use App\Models\Uzytkownik;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Gra;

class GamesPolicy
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

    public function buy(Uzytkownik $user, Gra $game)
    {

        return true;
    }

    public function install(Uzytkownik $user, Gra $game)
    {
        return $user->gry->contains($game);
    }
}
