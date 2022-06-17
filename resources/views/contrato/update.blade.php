@extends('dashboard')

@section('content')

    <div class="mt-2">
        <x-form-section>

            <x-slot name="title">{{ __("Modificación de información") }}</x-slot>

            <x-slot name="description">
                {{ __("Introduce los campos a actualizar del contrato.") }}
            </x-slot>

            <x-slot name="form">
                <form method="POST" action="{{ route('contrato.update', ['contrato' => $contrato->id]) }}"
                      enctype="multipart/form-data"
                      class="grid grid-cols-6 gap-6">
                    @method('PUT')
                    @csrf
                    <!--Año-->
                    <div class="col-span-6">
                        <x-label for="año" :value="__('Año')"/>

                        <x-input id="año"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="año"
                                 :value="old('año') ?? $contrato->año"
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
                                 :value="old('cód') ?? $contrato->cód"
                                 placeholder="Ingresa el Código"
                                 maxlength="16"
                                 required/>

                        <x-input-error for="cód" class="mt-2"/>
                    </div>

                    <!--Titulo-->
                    <div class="col-span-6">
                        <x-label for="tít_contrato" :value="__('Título de Contrato')"/>

                        <x-text-area id="tít_contrato"
                                     name="tít_contrato"
                                     class="block mt-2 w-full"
                                     type="text"
                                     rows="4"
                                     placeholder="Ingrese el título del contrato"
                                     maxlength="1000"
                                     required>{{ old('tít_contrato') ?? $contrato->tít_contrato }}</x-text-area>

                        <x-input-error for="tít_contrato" class="mt-2"/>
                    </div>

                    <!--Tipo-->
                    <div class="col-span-6">
                        <x-label for="tipo" :value="__('Tipo de Contrato')"/>

                        <x-input id="tipo"
                                     name="tipo"
                                     class="block mt-2 w-full"
                                     type="text"
                                     :value="old('tipo') ?? $contrato->tipo "
                                     placeholder="Ingres el tipo de contrato"
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
                                     :value="old('cpc') ?? $contrato->cpc "
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
                                     :value="old('clte') ?? $contrato->clte"
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
                                     :value="old('tipo_clte') ?? $contrato->tipo_clte"
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
                                 :value="old('inicio') ?? $contrato->inicio"
                                 placeholder="dd/mm/yyyy"
                                 required/>

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
                                 :value="old('termino') ?? $contrato->termino"
                                 placeholder="dd/mm/yyyy"
                                 required/>


                        <x-input-error for="termino" class="mt-2"/>
                    </div>      

                    <!--Monto sin IVA-->
                    <div class="col-span-6">
                        <x-label for="monto_sin_iva" :value="__('Monto sin IVA')"/>

                        <x-input id="monto_sin_iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="monto_sin_iva"
                                 :value="old('monto_sin_iva') ?? $contrato->monto_sin_iva"
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
                                     :value="old('estado') ?? $contrato->estado "
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
                                 :value="old('p_anticipo') ?? $contrato->p_anticipo"
                                 placeholder="Ingresa el porcentaje de anticipo"
                                 minlength="0"
                                 maxlength="5"
                                 required/>

                        <x-input-error for="p_anticipo" class="mt-2"/>
                    </div>

                    <!--IVA-->
                    <div class="col-span-6">
                        <x-label for="IVA" :value="__('IVA')"/>

                        <x-input id="IVA"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="IVA"
                                 :value="old('IVA') ?? $contrato->IVA"
                                 placeholder="Ingresa el IVA"
                                 maxlength="2"
                                 required/>

                        <x-input-error for="IVA" class="mt-2"/>
                    </div>

                    <!--DOCUMENTO-->
                     <div class="col-span-6 sm:col-span-4">
                        <x-label for="document" :value="__('Documento')"/>
                        
                        <x-input id="document"
                                 class="block mt-2 w-full"
                                 type="file"
                                 name="document"/>

                        <x-input-error for="document" class="mt-2"/>


                    </div> 
                    {{-- <div class="col-span-6">
                        <x-label for="document">
                            {{ __('Image') }}
                            <span class="text-sm ml-2 text-gray-400"> ({{ __('Optional') }})</span>
                        </x-label>

                        <x-input id="image"
                                 class="block mt-2 w-full"
                                 type="file"
                                 name="image"/>

                        <x-input-error for="image" class="mt-2"/>

                        @if (!is_null($contrato->document))
                            <a href="{{ $contrato->document->getUrl() }}" target="_blank">
                                <img class="w-80 h-80 mx-auto object-cover mt-4"
                                     src="{{ $contrato->document->getUrl() }}"
                                     >
                            </a>
                        @endif
                    </div> --}}
                    
                    <!--Actions-->
                    <div class="col-span-6 flex justify-end">
                        <x-button class="min-w-max">{{ __('Actualizar Información') }}</x-button>
                    </div>
                </form>
            </x-slot>

        </x-form-section>
    </div>
    @endsection