<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Task::orderBy('created_at', 'DESC')->paginate(6);
        return view('pages.dashboard.dashboard', compact('items'));
    }

    public function storeTask(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid();

        // dd($data);

        Task::create($data);

        Alert::success('Hore!', 'Task Berhasil Dibuat!');
        return back();
    }
}
