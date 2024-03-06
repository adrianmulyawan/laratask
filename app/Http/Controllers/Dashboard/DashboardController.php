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

        $title = 'Apakah Anda Yakin?';
        $text = 'Data yang telah dihapus tidak dapat dikembalikan!';
        confirmDelete($title, $text);

        return view('pages.dashboard.dashboard', compact('items'));
    }
}
