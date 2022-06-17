@extends('dashboard')

@section('content')

   <div class="mt-2">
        <x-form-section>

            <x-slot name="title">{{ __("Crear un nuevo usuario") }}</x-slot>

            <x-slot name="description">
                {{ __("Puedes crear un nuevo usuario.") }}
            </x-slot>

            <x-slot name="form">
                <form method="POST" action="{{ route('admin.store') }}" class="grid grid-cols-6 gap-6">
                    @csrf

                    <!--First name-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="first_name" :value="__('Primer nombre')"/>

                        <x-input id="first_name"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="first_name"
                                 :value="old('first_name')"
                                 placeholder="Ingresa el nombre del usuario"
                                 maxlength="35"
                                 required/>

                        <x-input-error for="first_name" class="mt-2"/>
                    </div>

                    <!--Last name-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="last_name" :value="__('Apellido')"/>

                        <x-input id="last_name"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="last_name"
                                 :value="old('last_name')"
                                 placeholder="Ingresa el apellido del usuario"
                                 maxlength="35"
                                 required/>

                        <x-input-error for="last_name" class="mt-2"/>
                    </div>

                    <!--Email-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="email" :value="__('Dirección de correo electrónico')"/>

                        <x-input id="email"
                                 class="block mt-2 w-full"
                                 type="email"
                                 name="email"
                                 :value="old('email')"
                                 placeholder="Ingresa el correo electrónico"
                                 required/>

                        <x-input-error for="email" class="mt-2"/>
                    </div>

                    <!--Phone number-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="personal_phone" :value="__('Número de teléfono')"/>

                        <x-input id="personal_phone"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="personal_phone"
                                 maxlength="10"
                                 :value="old('personal_phone')"
                                 placeholder="Ejemplo: 0999999999"
                                 required/>

                        <x-input-error for="personal_phone" class="mt-2"/>
                    </div>


                    <!--Actions-->
                    <div class="col-span-6 flex justify-end">
                        <x-button class="min-w-max">{{ __('Crear') }}</x-button>
                    </div>
                </form>
            </x-slot>

        </x-form-section>
    </div>
@endsection