<x-form-section>

    <x-slot name="title">{{ __("Perfil") }}</x-slot>

    <x-slot name="description">
        {{ __("Actualiza tu información de perfil de la cuenta") }}
    </x-slot>

    <x-slot name="form">

        <form method="POST" action="{{ route('profile.update') }}" class="grid grid-cols-6 gap-6">
            @method('PUT')
            @csrf
            <!--First name-->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="first_name" :value="__('Primer nombre')"/>

                <x-input id="first_name"
                         class="block mt-2 w-full"
                         type="text"
                         name="first_name"
                         :value="old('first_name') ?? $user->first_name"
                         placeholder="Ingresa tu primer nombre"
                         maxlength="35"
                         required
                         autofocus/>

                <x-input-error for="first_name" class="mt-2"/>
            </div>

            <!--Last name-->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="last_name" :value="__('Apellido')"/>

                <x-input id="last_name"
                         class="block mt-2 w-full"
                         type="text"
                         name="last_name"
                         :value="old('last_name') ?? $user->last_name"
                         placeholder="Ingresa tu apellido"
                         maxlength="35"
                         required/>

                <x-input-error for="last_name" class="mt-2"/>
            </div>

            <!--Personal phone-->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="personal_phone" :value="__('Teléfono personal')"/>

                <x-input id="personal_phone"
                         class="block mt-2 w-full"
                         type="text"
                         name="personal_phone"
                         maxlength="10"
                         :value="old('personal_phone') ?? $user->personal_phone"
                         placeholder="Example: 0999999999"
                         required/>

                <x-input-error for="personal_phone" class="mt-2"/>
            </div>

            <!--Actions-->
            <div class="col-span-6 flex justify-end">
                <x-button class="min-w-max">{{ __('Actualizar') }}</x-button>
            </div>
        </form>
    </x-slot>

</x-form-section>