<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function profile()
    {
        $id = auth()->id();
        $user = Cache::remember("user.profile.{$id}", (60 * 60), function () use ($id) {
            return User::find($id);
        });

        return view('profile', compact('user'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
