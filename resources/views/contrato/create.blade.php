@extends('dashboard')

@section('content')

    <div class="mt-2">
        <x-form-section>

            <x-slot name="title">{{ __("Nuevo Contrato") }}</x-slot>

            <x-slot name="description">
                {{ __("Introduce los campos para crear un contrato.") }}
            </x-slot>

            <x-slot name="form">
                <form method="POST" action="{{ route('contrato.store') }}" enctype="multipart/form-data"
                      class="grid grid-cols-6 gap-6">
                    @csrf

                    <!--Año-->
                    <div class="col-span-6">
                        <x-label for="año" :value="__('Año')"/>

                        <x-input id="año"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="año"
                                 :value="old('año')"
                                 placeholder="Ingresa el año"
                                 maxlength="4"
                                 required/>

                        <x-input-error for="año" class="mt-2"/>
                    </div>

                    <!--Codigo-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="cód" :value="__('Código')"/>

                        <x-input id="cód"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="cód"
                                 :value="old('cód')"
                                 placeholder="Ingresa el Código"
                                 maxlength="16"
                                 required/>

                        <x-input-error for="cód" class="mt-2"/>
                    </div>

                    <!--Titulo-->
                    <div class="col-span-6">
                        <x-label for="tít_contrato" :value="__('Título de Contrato')"/>

                        <x-input id="tít_contrato"
                                     name="tít_contrato"
                                     class="block mt-2 w-full"
                                     type="text"
                                     rows="4"
                                     :value="old('tít_contrato')"
                                     placeholder="Ingrese el título del contrato"
                                     maxlength="1000"
                                     required/>

                        <x-input-error for="tít_contrato" class="mt-2"/>
                    </div>

                    <!--Tipo-->
                    <div class="col-span-6">
                        <x-label for="tipo" :value="__('Tipo de Contrato')"/>

                        <x-input id="tipo"
                                     name="tipo"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('tipo')"
                                     placeholder="Ingresa el tipo de contrato"
                                     maxlength="100"
                                     required/>
                        <x-input-error for="tipo" class="mt-2"/>
                    </div>

                    <!--CPC-->
                    <div class="col-span-6">
                        <x-label for="cpc" :value="__('CPC')"/>

                        <x-input id="cpc"
                                     name="cpc"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('cpc')"
                                     placeholder="Ingresa CPC (Opcional)"
                                     maxlength="255"/>

                        <x-input-error for="cpc" class="mt-2"/>
                    </div>

                    <!--Cliente-->
                    <div class="col-span-6">
                        <x-label for="clte" :value="__('Cliente')"/>

                        <x-input id="clte"
                                     name="clte"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('clte') "
                                     placeholder="Ingresa el cliente"
                                     maxlength="100"
                                     required/>

                        <x-input-error for="clte" class="mt-2"/>
                    </div>

                    <!--Tipo Cliente-->
                    <div class="col-span-6">
                        <x-label for="tipo_clte" :value="__('Tipo Cliente')"/>

                        <x-input id="tipo_clte"
                                     name="tipo_clte"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('tipo_clte')"
                                     placeholder="Ingresa la descripción del contrato"
                                     maxlength="7"
                                     required/>

                        <x-input-error for="tipo_clte" class="mt-2"/>
                    </div>

                    <!--Fecha Inicio-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="inicio">
                            {{ __('Fecha de Inicio') }}
                        </x-label>

                        <x-input id="inicio"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="inicio"
                                 maxlength="10"
                                 :value="old('inicio')"
                                 placeholder="Dia/Mes/Año"/>

                        <x-input-error for="inicio" class="mt-2"/>
                    </div>                    
                    <!--Fecha Fin-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="termino">
                            {{ __('Fecha de Cierre') }}
                        </x-label>

                        <x-input id="termino"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="termino"
                                 maxlength="10"
                                 :value="old('termino')"
                                 placeholder="Dia/Mes/Año"/>

                        <x-input-error for="termino" class="mt-2"/>
                    </div>      

                    <!--Monto sin IVA-->
                    <div class="col-span-6">
                        <x-label for="monto_sin_iva" :value="__('Monto sin IVA')"/>

                        <x-input id="monto_sin_iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="monto_sin_iva"
                                 :value="old('monto_sin_iva')"
                                 placeholder="Ingresa el monto sin iva"
                                 minlength="4"
                                 maxlength="10"
                                 required/>

                        <x-input-error for="monto_sin_iva" class="mt-2"/>
                    </div>

                    <!--Estado-->
                    <div class="col-span-6">
                        <x-label for="estado" :value="__('Estado de Contrato')"/>

                        <x-input id="estado"
                                     name="estado"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('estado')"
                                     placeholder="Ingresa el estado del contrato"
                                     minlength="7"
                                     maxlength="20"
                                     required/>

                        <x-input-error for="estado" class="mt-2"/>
                    </div>

                    <!--% Anticipo-->
                    <div class="col-span-6">
                        <x-label for="p_anticipo" :value="__('Porcentaje de Anticipo')"/>

                        <x-input id="p_anticipo"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="p_anticipo"
                                 :value="old('p_anticipo')"
                                 placeholder="Ingresa el porcentaje de anticipo, en caso de no existir digita 0"
                                 minlength="0"
                                 maxlength="5"
                                 />

                        <x-input-error for="p_anticipo" class="mt-2"/>
                    </div>



                    <!--IVA-->
                    <div class="col-span-6">
                        <x-label for="IVA" :value="__('IVA')"/>

                        <x-input id="IVA"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="IVA"
                                 :value="old('IVA')"
                                 placeholder="Ingresa el IVA"
                                 maxlength="2"
                                 required/>

                        <x-input-error for="IVA" class="mt-2"/>
                    </div>

                    <!--DOCUMENT-->                    
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="document" :value="__('Documento')"/>

                        <x-input id="document"
                                class="block mt-2 w-full"
                                type="file"
                                name="document"
                                required/>

                        <x-input-error for="document" class="mt-2"/>
                    </div>              

                    <!--Actions-->
                    <div class="col-span-6 flex justify-end">
                        <x-button class="min-w-max">{{ __('Crear Contrato') }}</x-button>
                    </div>
                </form>
            </x-slot>

        </x-form-section>
    </div>
    @endsection