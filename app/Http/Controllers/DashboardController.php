<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyAccountRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function my_account()
    {
        $data['user'] = Auth::user();
        $data['states'] = State::all();
        return view('dashboard.my-account', $data);
    }
    public function my_account_action(MyAccountRequest $r)
    {
        $data = $r->only(['name', 'email', 'state_id']);
        $user = auth()->user();
        $user->update($data);

        return redirect()->route('my_account')->with('success', 'Perfil atualizado com sucesso!');
    }
}
