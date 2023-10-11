<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('back.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("back.user.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Ad sahəsi boş qoyula bilməz.',
            'surname.required' => 'Soyad sahəsi boş qoyula bilməz.',
            'father_name.required' => 'Ata adı sahəsi boş qoyula bilməz.',
            'email.required' => 'Email sahəsi boş qoyula bilməz.',
            'email.email' => 'Düzgün bir email ünvanı daxil edin.',
            'email.max' => 'Email ünvanı maksimum 255 simvol ola bilər.',
            'email.unique' => 'Bu email artıq istifadə olunur.',
            'password.required' => 'Şifrə sahəsi boş qoyula bilməz.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.confirmed' => 'Şifrə təsdiqlənmir.',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'father_name' => $validatedData['father_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->syncRoles([$request->role]);

        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'İstifadəçi uğurla əlavə olundu');
        } else {
            return back()->with('error', 'Qeydiyyat uğursuz oldu. Zəhmət olmasa bir daha cəhd edin.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view("back.user.update", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->father_name = $request->father_name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        $user->syncRoles([$request->role]);

        return redirect()
            ->route("user.index")
            ->with("success", "Məlumat uğurla yeniləndi.");

    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        User::find($id)->delete();
        return redirect()
            ->route("user.index")
            ->with(
                "success",
                "Məlumat uğurla silinmiş istifadəçilər siyahısına əlavə edildi.."
            );
    }

    public function trashed()
    {
        $users = User::onlyTrashed()
            ->orderBy("deleted_at", "desc")
            ->get();
        return view("back.user.trashed", compact("users"));
    }

    public function recover(string $id)
    {
        User::onlyTrashed()
            ->find($id)
            ->restore();
        return redirect()
            ->route("user.index")
            ->with("success", "Məlumat uğurla geri əlavə edildi");
    }

    public function hardDelete(string $id)
    {
        User::onlyTrashed()
            ->find($id)
            ->forceDelete();
        return redirect()
            ->route("user.index")
            ->with("success", "Məlumat uğurla silindi..");
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()
            ->route("users.index")
            ->with("success", "Məlumat uğurla silindi..");
    }
}