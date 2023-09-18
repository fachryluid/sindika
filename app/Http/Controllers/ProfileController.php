<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        try {
            $user = User::where('id', auth()->user()->id)->firstOrFail();

            return view('dashboard.profile.index', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['message' => ['Terjadi kesalahan!', $e->getMessage()]]);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->firstOrFail();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()
                ->back()
                ->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['message' => ['Terjadi kesalahan!', $e->getMessage()]]);
        }
    }

    public function change_password(Request $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->firstOrFail();

            $request->validate([
                'old_password' => 'required|current_password',
                'new_password' => 'required',
                'repeat_new_password' => 'required|same:new_password'
            ]);

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()
                ->back()
                ->with('success', 'Password berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['message' => ['Terjadi kesalahan!', $e->getMessage()]]);
        }
    }
}
