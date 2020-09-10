<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensalDebtController extends Controller
{
    public static function index_mensal_debt() {
        $current_month = Carbon::now()->format('m');
        $current_year = Carbon::now()->format('y');

        $exist = DB::table('months')->where('month', '=', $current_month)->first();


        if($exist) {
            return DB::table('mensal_debts')->where('month', '=', $current_month)->paginate(5);
        }

        DB::table('months')->insert([
            'month' => $current_month,
            'year' => $current_year,
            'total' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $month_before_debts = DB::table('mensal_debts')->where('month', '=', $current_month-1)->get();

        $total = 0;
        foreach ($month_before_debts as $debt) {
            $total = $total + $debt->price;
            DB::table('mensal_debts')->insert([
                'desc' => $debt->desc,
                'day' => $debt->day,
                'price' => $debt->price,
                'month' => $current_month,
                'paid' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }

        DB::table('months')->where('month', '=', $current_month)->update([
            'total' => $total
        ]);


    }
    public function create(Request $request)
    {

    }

    public function updatePayment($debt_id)
    {
        dd(not($value));
        $value = DB::table('mensal_debts')->where('id', '=', $debt_id)->first();
        DB::table('mensal_debts')->where('id', '=', $debt_id)->update(['paid' => not($value)]);

        return redirect()->back();
    }
}
