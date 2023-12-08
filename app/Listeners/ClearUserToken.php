<?php

namespace App\Listeners;

use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;

class ClearUserToken
{
    public function handle($event)
    {
        $user = MemberModel::where('token',session('user_token'))->get()->first();

        if (session('user_token')) {
            $user->update(['token' => null]);
            $user->save();
        }
    }
}
