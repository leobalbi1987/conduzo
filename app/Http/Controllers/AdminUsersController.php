<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    public function index(Request $request): View
    {
        $q = (string) ($request->string('q')->toString() ?? '');

        $users = User::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($q2) use ($q) {
                    $q2->where('name', 'like', "%$q%")
                        ->orWhere('email', 'like', "%$q%");
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users', compact('users', 'q'));
    }

    public function toggleAdmin(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return redirect()->route('admin.users.index')->with('error', 'Você não pode alterar seu próprio papel.');
        }

        $user->is_admin = ! ($user->is_admin ?? false);
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'Papel atualizado para o usuário: '.$user->name);
    }
}
