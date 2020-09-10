<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MensalDebtController;

class ProfileController extends Controller
{
    public function index()
    {
        $current_month = Carbon::now()->format('m');
        $mensal = DB::table('months')->where('month', '=', $current_month)->first();
        $debts = MensalDebtController::index_mensal_debt();
        return view('profile', [
            'mensal' => $mensal,
            'debts' => $debts
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
           'email' => 'email | required',
           'name'  => 'required',
           'password' => 'required | confirmed',
        ]);

        $user = DB::table('users')->where('id', '=', Auth::user()->id)->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        if($user) {
            Session::put('message_success', 'Sucesso ao editar!');
            return redirect()->back();
        }
        Session::put('message_error', 'Erro ao editar!');
        return redirect()->back();
    }

}
