@extends('dashboard')

@section('content')

    <div class="mt-2">
        <x-form-section>

            <x-slot name="title">{{ __("Información de contacto") }}</x-slot>

            <x-slot name="description">
                {{ __("Datos registrados del usuario.") }}
            </x-slot>

            <x-slot name="form">
                <div class="grid grid-cols-6 gap-6">
                    <!--Avatar-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-user-avatar class="w-24 h-24 md:w-20 md:h-20 mx-auto" :src="$director->image->getUrl()"/>
                    </div>

                    <!--First name-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="first_name" :value="__('Nombres')"/>

                        <x-input id="first_name"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="first_name"
                                 :value="$director->first_name"
                                 disabled/>
                    </div>

                    <!--Last name-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="last_name" :value="__('Apellidos')"/>

                        <x-input id="last_name"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="last_name"
                                 :value="$director->last_name"
                                 disabled/>
                    </div>




                    <!--Phone number-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="personal_phone" :value="__('Número de Celular')"/>

                        <x-input id="personal_phone"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="personal_phone"
                                 :value="$director->personal_phone"
                                 disabled/>
                    </div>


                    <!--Email-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="personal_email" :value="__('Correo Electrónico')"/>

                        <x-input id="personal_email"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="personal_email"
                                 :value="$director->email"
                                 disabled/>
                    </div>
                    <!--Actions-->
                    <div class="col-span-6 flex justify-end">
                        <x-link :href="route('admin.index')">
                            <x-button class="min-w-max">{{ __('Regresar') }}</x-button>
                        </x-link>
                    </div>
                </div>
            </x-slot>

        </x-form-section>
    </div>

    @endsection()