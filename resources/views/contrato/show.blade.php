@extends('dashboard')

@section('content')

    <div class="mt-2">
        <x-form-section>

            <x-slot name="title">{{ __("Información detallada del Contrato") }}</x-slot>

            <x-slot name="description">
                {{ __("Datos registrados del contrato.") }}
            </x-slot>

            <x-slot name="form">
                <div class="grid grid-cols-6 gap-6"> 

                    <!--Año-->
                    <div class="col-span-6">
                        <x-label for="year" :value="__('Año')"/>

                        <x-text-area id="year"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="year"
                                 {{-- :value="$contrato->año" --}}
                                 disabled>{{$contrato->año}}
                                </x-text-area>
                    </div>

                    <!--Codigo-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="cod" :value="__('Código')"/>

                        <x-text-area id="cod"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="cod"
                                 {{-- :value=" $contrato->cód" --}}
                                 disabled>{{$contrato->cód}}
                                </x-text-area>
                    </div>

                    <!--Titulo-->
                    <div class="col-span-6">
                        <x-label for="title" :value="__('Título de Contrato')"/>

                        <x-text-area id="title"
                                     name="title"
                                     class="block mt-2 w-full"
                                     type="text"
                                     rows="4"
                                     disabled>{{$contrato->tít_contrato }}
                                    </x-text-area>
                    </div>

                    <!--Tipo-->
                    <div class="col-span-6">
                        <x-label for="type" :value="__('Tipo de Contrato')"/>

                        <x-text-area id="type"
                                     name="type"
                                     class="block mt-2 w-full"
                                     type="text"
                                     disabled>{{$contrato->tipo }}
                                    </x-text-area>
                    </div>

                    <!--CPC-->
                    <div class="col-span-6">
                        <x-label for="cpc" :value="__('CPC')"/>

                        <x-text-area id="cpc"
                                     name="cpc"
                                     class="block mt-2 w-full"
                                     type="text"
                                     disabled>{{$contrato->cpc}}
                    </x-text-area>
                    </div>

                    <!--Cliente-->
                    <div class="col-span-6">
                        <x-label for="cliente" :value="__('Cliente')"/>

                        <x-text-area id="cliente"
                                     name="cliente"
                                     class="block mt-2 w-full"
                                     type="text"
                                     disabled>{{$contrato->clte }}
                        </x-text-area>
                    </div>

                    <!--Tipo Cliente-->
                    <div class="col-span-6">
                        <x-label for="tipo_clte" :value="__('Tipo Cliente')"/>

                        <x-text-area id="tipo_clte"
                                     name="tipo_clte"
                                     class="block mt-2 w-full"
                                     type="text"
                                     disabled>{{$contrato->tipo_clte}}
                        </x-text-area>
                    </div>

                    <!--Fecha Inicio-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="inicio">
                            {{ __('Fecha de Inicio') }}
                        </x-label>

                        <x-text-area id="inicio"
                                    class="block mt-2 w-full"
                                    type="text"
                                    name="inicio"
                                    disabled>{{$contrato->inicio}}
                        </x-text-area>
                    </div>         

                    <!--Fecha Fin-->
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="fin">
                            {{ __('Fecha de Cierre') }}
                        </x-label>

                        <x-text-area id="fin"
                                    class="block mt-2 w-full"
                                    type="text"
                                    name="fin"
                                    disabled>{{$contrato->termino}}
                        </x-text-area>
                    </div>      

                    <!--Monto sin IVA-->
                    <div class="col-span-6">
                        <x-label for="monto_sin_iva" :value="__('Monto sin IVA')"/>

                        <x-text-area id="monto_sin_iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="monto_sin_iva"
                                 disabled>{{$contrato->monto_sin_iva}}
                        </x-text-area>         
                    </div>

                    <!--Estado-->
                    <div class="col-span-6">
                        <x-label for="estado" :value="__('Estado de Contrato')"/>

                        <x-text-area id="estado"
                                     name="estado"
                                     class="block mt-2 w-full"
                                     type="text"
                                     disabled>{{$contrato->estado}}
                        </x-text-area>

                    </div>

                    <!--% Anticipo-->
                    <div class="col-span-6">
                        <x-label for="p_anticipo" :value="__('Porcentaje de Anticipo')"/>

                        <x-text-area id="p_anticipo"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="p_anticipo"
                                 disabled>{{$contrato->p_anticipo}}
                        </x-text-area>
                    </div>

                    <!--Valor de Anticipo-->
                    <div class="col-span-6">
                        <x-label for="val_anticipo_sin_iva" :value="__('Valor de Anticipo Sin IVA')"/>

                        <x-text-area id="val_anticipo_sin_iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="val_anticipo_sin_iva"
                                 disabled>{{$contrato->valorAnticipo()}}
                        </x-text-area>
                    </div>

                    <!--Valor a Cobrar sin IVA-->
                    <div class="col-span-6">
                        <x-label for="val_cobrar_sin_iva" :value="__('Valor por Cobrar sin IVA')"/>

                        <x-text-area id="val_cobrar_sin_iva"
                                 class="block mt-2 w-full"
                                 type="double"
                                 name="val_cobrar_sin_iva"
                                 disabled>{{$contrato->valorCobrar()}}
                        </x-text-area>
                    </div>

                    <!--IVA-->
                    <div class="col-span-6">
                        <x-label for="iva" :value="__('IVA')"/>

                        <x-text-area id="iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="iva"
                                 disabled>{{$contrato->IVA}}
                        </x-text-area>
                    </div>


                    <!--Monto Final con IVA-->
                    <div class="col-span-6">
                        <x-label for="monto_final_con_iva" :value="__('Monto Final con IVA')"/>

                        <x-text-area id="monto_final_con_iva"
                                 class="block mt-2 w-full"
                                 type="text"
                                 name="monto_final_con_iva"
                                 disabled>{{$contrato->valorFinal()}}
                        </x-text-area>
                    </div>

                    {{--  <!--DOCUMENTO--> --}}
                    @if (!is_null($contrato->document))
                        <!--Documento-->

                        {{-- <x-label for="document" :value="__('Documento')"/> --}}
                            <div class="col-span-6 flex justify-left">
                                <x-link :href=" $contrato->document->getUrl()">
                                    <x-button class="min-w-max">{{ __('Visualizar PDF') }}</x-button>
                                </x-link>
                            </div>

                        {{-- <link rel="icon" href="C:\Users\EPN TECH PST\Downloads\icon-pdf.png">                  --}}
                        {{-- <div class="col-span-6">
                            <a href="{{ $contrato->document->getUrl() }}" target="_blank">
                                <embed class="w-80 h-80 mx-auto object-cover"
                                     src="{{ $contrato->document->getUrl() }}">
                            </a>
                        </div> --}}
                    @endif

                    <!--Actions-->
                    <div class="col-span-6 flex justify-left">
                        <x-link :href="route('contrato.index')">
                            <x-button class="min-w-max">{{ __('Regresar') }}</x-button>
                        </x-link>
                    </div>
                </div>
            </x-slot>

        </x-form-section>
    </div>
    @endsection