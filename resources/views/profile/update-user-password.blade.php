<x-form-section>

    <x-slot name="title">{{ __("Actualización de contraseña") }}</x-slot>

    <x-slot name="description">
        {{ __("Asegurate que tu cuenta use una contraseña larga para que sea segura.") }}
    </x-slot>

    <x-slot name="form">
        <form method="POST" action="{{ route('user-password.update') }}" class="grid grid-cols-6 gap-6">
            @method('PUT')
            @csrf
            <!--Current password-->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="current_password" :value="__('Contraseña actual')"/>

                <x-input id="current_password"
                         class="block mt-2 w-full"
                         type="password"
                         name="current_password"
                         placeholder="Ingresa tu contraseña actual"
                         maxlength="255"
                         required />

                <x-input-error for="current_password" class="mt-2"/>
            </div>

            <!--New password-->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="password" :value="__('Nueva contraseña')"/>

                <x-input id="password"
                         class="block mt-2 w-full"
                         type="password"
                         name="password"
                         placeholder="Ingresa tu nueva contraseña"
                         maxlength="255"
                         required/>

                <x-input-error for="password" class="mt-2"/>
            </div>


            <!--Confirm new password-->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')"/>

                <x-input id="password_confirmation"
                         class="block mt-2 w-full"
                         type="password"
                         name="password_confirmation"
                         placeholder="Ingresa de nuevo la contraseña"
                         maxlength="255"
                         required/>

                <x-input-error for="password_confirmation" class="mt-2"/>
            </div>

            <!--Actions-->
            <div class="col-span-6 flex justify-end">
                <x-button class="min-w-max">{{ __('Actualizar') }}</x-button>
            </div>
        </form>
    </x-slot>
</x-form-section>