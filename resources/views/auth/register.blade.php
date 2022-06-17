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
    <x-slot name="formTitle">{{"Nueva Cuenta"}}</x-slot>

    <x-slot name="formDescription">{{"Bienvenido"}}</x-slot>


    <!--Create Count Form-->
    <x-slot name="authForm">
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

              <!--Email-->
              <div>
                <x-label for="email"
                         :value="__('Correo Electrónico')"/>

                <x-input id="email"
                         class="block mt-2 w-full"
                         type="email"
                         name="email"
                         :value="old('email')"
                         placeholder="Ingresa un correo electrónico"
                         required
                         autofocus/>
            </div>          

            <!--First Name-->
            <div>
                <x-label for="first_name"
                         :value="__('Nombres')"/>

                <x-input id="first_name"
                         class="block mt-2 w-full"
                         
                         type="text"
                         name="first_name"
                         :value="old('first_name')"
                         placeholder="Ingresa tus nombres"
                         required/>
            </div>



            <!--Last Name-->
            <div>
                <x-label for="last_name"
                         :value="__('Apellidos')"/>

                <x-input id="last_name"
                         class="block mt-2 w-full"
                         
                         type="text"
                         name="last_name"
                         :value="old('last_name')"
                         placeholder="Ingresa tus apellidos"
                         required/>
            </div>



            <!--Personal Phone-->
            <div>
                <x-label for="personal_phone"
                         :value="__('Número de celular')"/>

                <x-input id="personal_phone"
                         class="block mt-2 w-full"
                         type="text"
                         name="personal_phone"
                         :value="old('personal_phone')"
                         placeholder="Ingresa tu número de celular"
                         required/>
            </div>

            <!-- Password -->
            <div>
                <x-label for="password"
                         :value="__('Contraseña')"/>

                <x-input id="password"
                         class="block mt-2 w-full"
                         type="password"
                         name="password"
                         placeholder="Ingresa la contraseña"
                         required/>
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="pas"
                         :value="__('Confirma la contraseña')"/>

                <x-input id="password_confirmation"
                         class="block mt-2 w-full"

                         type="password"
                         name="password_confirmation"
                         placeholder="Ingres nuevamente la contraseña"
                         required/>
            </div>



            <div class="mt-4 flex justify-center">
                <x-button class="w-3/5"
                          :primary-color="$primary"
                          :secondary-color="$secondary">
                    {{ __('Crear') }}
                </x-button>
            </div>



            <div class="mt-4 flex flex-col items-center justify-center text-md text-gray-500">
                <!--Sign In-->
                <span>{{"Ya posees una cuenta?"}}</span>
                <x-link href="{{route('login')}}"
                        class="text-base font-semibold"
                        :color="$primary"
                        :hover="$secondary">
                    {{ __('Ingresar') }}
                </x-link>
            </div>


        </form>

        
    </x-slot>
</x-auth-layout>