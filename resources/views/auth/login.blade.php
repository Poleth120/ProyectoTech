@php
    /*Colors for this view*/
    $primary = "purple";
    $secondary = "pink";
@endphp

<x-auth-layout
    :primaryColor="$primary"
    :secondaryColor="$secondary"
    reversColumns=0
>

    <!--Login Info-->
    <x-slot name="formTitle">{{"Inicio de sesión"}}</x-slot>

    <x-slot name="formDescription">{{"Bienvenido de vuelta"}}</x-slot>

    <!--Login  Form-->
    <x-slot name="authForm">

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <!--Username or email-->
            <div>
                <x-label for="email"
                         :value="__('Correo Electrónico')"/>

                <x-input id="email"
                         class="block mt-2 w-full"
                         :focus-color="$primary"
                         type="email"
                         name="email"
                         :value="old('login_field')"
                         placeholder="Ingresa tu correo electrónico"
                         required
                         autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"
                         :value="__('Contraseña')"/>

                <x-input id="password"
                         class="block mt-2 w-full"
                         :focus-color="$primary"
                         type="password"
                         name="password"
                         placeholder="Ingresa tu contraseña"
                         required
                         autocomplete="current-password"/>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <!-- Remember Me -->
                <x-check id="remember_me"
                         name="remember"
                         :color="$primary"
                         :checked="old('remember') == 'on'">
                    {{ __('Recordar contraseña') }}
                </x-check>
                <!--Forgot Password-->
                @if (Route::has('password.request'))
                    <x-link href="{{ route('password.request') }}"
                            :color="$primary"
                            :hover="$secondary">
                        {{ __('Olvidaste tu contraseña?') }}
                    </x-link>
                @endif
            </div>

            <div class="mt-4 flex justify-center">
                <x-button class="w-3/5"
                          :primary-color="$primary"
                          :secondary-color="$secondary">
                    {{ __('Entrar') }}
                </x-button>
            </div>

            <div class="mt-4 flex flex-col items-center justify-center text-md text-gray-500">
                <!--Sign Up-->
                @if (Route::has('register'))
                    <span>{{"No posees cuenta? Créala"}}</span>
                    <x-link href="{{ route('register') }}"
                            class="text-base font-semibold"
                            :color="$primary"
                            :hover="$secondary">
                        {{ __('Crear nueva cuenta') }}
                    </x-link>
                @endif
            </div>
        </form>
    </x-slot>
</x-auth-layout>