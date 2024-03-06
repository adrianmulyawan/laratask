<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
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

    public function editTask($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                Alert::error('Error', 'Task Tidak Ditemukan!');
                return back();
            }

            return view('pages.dashboard.task.edit-task', compact('task'));
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Error', 'Terjadi Kesalahan Saat Menampilkan Data!');
            return back();
        }
    }

    public function updateTask(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['uuid'] = Str::uuid()->toString();

        $task->update($data);

        Alert::success('Hore', 'Task berhasil diperbaharui!');
        return redirect()->route('dashboard');
    }

    public function deleteTask($id)
    {
        $data = Task::find($id);

        if (!$data) {
            Alert::error('Error', 'Terjadi Kesalahan Saat Menghapus Data!');
            return back();
        }

        $data->delete();

        Alert::success('Hore', 'Task Berhasil Dihapus!');
        return back();
    }
}
