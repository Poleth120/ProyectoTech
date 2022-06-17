<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Notifications\RegisteredUserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-personal');
    }

    public function index()
    {
        $directors = User::where('tipo_usuario', '1')->first();

        if (request('search'))
        {
           $directors = $directors->where('first_name', 'like', '%' . request('search') . '%');
        }


        $directors = $directors->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->paginate();
        return view('admin.index', compact('directors'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {

        $request->validate([
        'first_name' => ['required', 'string', 'min:3', 'max:35'],
        'last_name' => ['required', 'string', 'min:3', 'max:35'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'personal_phone' => ['required', 'numeric', 'digits:10','unique:users'],
    ]);


        $password_generated = $this->generatePassword();

        $directors = new User();

        $director = $directors->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'personal_phone' => $request['personal_phone'],
            'password' => Hash::make($password_generated),
        ]);

        // creación de avatar y se almacena en bd por eloquent y su relación
        $director->image()->create([
            'path' => $director->generateAvatarUrl(),
        ]);


        $director->notify(
            new RegisteredUserNotification(
                $director->getFullName(),
                $password_generated
            )
        );

        return back()->with('status', 'Usuario creado exitosamente');
    }


    public function show(User $user)
    {
        return view('admin.show', ['director' => $user]);
    }



    public function edit(User $user)
    {
        return view('admin.update', ['director' => $user]);
    }


    public function update(Request $request, User $user)
    {

        $userRequest = $request->user;

        $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:35'],
            'last_name' => ['required', 'string', 'min:3', 'max:35'],
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($userRequest),
            ],
            'personal_phone' => ['required', 'numeric', 'digits:10'],
        ]);


        $old_email = $user->email;

        $director = $user;

        $director->update([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'email' => $request['email'],
        'personal_phone' => $request['personal_phone'],
        ]);

        $director->updateUIAvatar($director->generateAvatarUrl());

        $this->verifyEmailChange($director, $old_email);

        return back()->with('status', 'Director updated successfully');
    }


    public function destroy(User $user)
    {
        $director = $user;
        $state = $director->state;
        $message = $state ? 'inactivado' : 'activado';

        $director->state = !$state;
        $director->save();

        return back()->with('status', "Usuario $message exitosamente");
    }





    public function generatePassword(): string
    {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
        $length = 8;
        $count = mb_strlen($characters);
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($characters, $index, 1);
        }
        return $result;
    }

    private function verifyEmailChange(User $director, string $old_email)
    {
        if ($director->email !== $old_email) {
            $password_generated = $this->generatePassword();
            $director->password = Hash::make($password_generated);
            $director->save();

            $director->notify(
                new RegisteredUserNotification(
                    $director->getFullName(),
                    $password_generated
                )
            );
        }
    }

}