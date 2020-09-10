<?php

namespace App\Http\Controllers;

use App\FastTask;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PannelController extends Controller
{
    public function index()
    {
        $tasks = DB::table('fast_tasks')
            ->where('owner_id', '=', Auth::user()->id)
            ->orderBy('completed')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        $tasks =  $tasks->reverse();
        return view('welcome', [ 'tasks' => $tasks]);
    }

    public function update_body($task_id, Request $request)
    {
        DB::table('fast_tasks')->where('id', '=', $task_id)->update(['fast_task' => $request->fast_task]);

        return redirect(route('pannel', Auth::user()->id));
    }

    public function create(Request $request)
    {
        $request->validate([
            'fast_task' => 'required',
        ]);
        DB::table('fast_tasks')->insert([
            'fast_task' => $request->fast_task,
            'owner_id' => Auth::user()->id,
            'completed' => false,
            "created_at" =>  Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect(route('pannel', Auth::user()->id));
    }

    public function delete($task_id)
    {
        DB::table('fast_tasks')->where('id', '=', $task_id)->delete();

        return redirect()->back();
    }

    public function complete($task_id)
    {
        DB::table('fast_tasks')->where('id', '=', $task_id)->update(['completed' => true, "updated_at" => Carbon::now()]);

        return redirect(route('pannel', Auth::user()->id));
    }

    public function uncomplete($task_id)
    {
        DB::table('fast_tasks')->where('id', '=', $task_id)->update(['completed' => false, "updated_at" => Carbon::now()]);

        return redirect(route('pannel', Auth::user()->id));
    }
}
