@extends('dashboard')

@section('content')



    <div class="bg-white p-6 md:p-3 shadow-md">
        <div class="grid grid-cols-12 gap-3 px-4 sm:px-0">
            <div class="col-span-12 md:col-span-8">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ __("Información de los Contratos") }}
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Lista de contratos que han sido registrados en el sistema") }}
                </p>
            </div>

            <div class="col-span-12 md:col-span-4 flex items-center mx-auto max-w-max md:w-full">
                <form method="GET" action="{{ route('contrato.index') }}" >
                    <x-search/>
                </form>
            </div>

        </div>

        <x-table.list>
            <x-slot name="thead">
                <tr>
                    <x-table.th>{{ __("Estado") }}</x-table.th>
                    <x-table.th>{{ __("Año") }}</x-table.th>
                    <x-table.th>{{ __("Cód") }}</x-table.th>
                    <x-table.th>{{ __("Contrato") }}</x-table.th>
                    <x-table.th>{{ __("Tipo") }}</x-table.th>
                    {{--  //<x-table.th>{{ __("CPC") }}</x-table.th>  --}}
                    <x-table.th>{{ __("Clte") }}</x-table.th>
                    <x-table.th>{{ __("Tipo Clte") }}</x-table.th>
                    <x-table.th>{{ __("Opciones") }}</x-table.th>
                </tr>
            </x-slot>

            <x-slot name="tbody">

                @foreach($contratos as $contrato)
                    <tr>
                        <x-table.td>
                            <x-badge :color="$contrato->state ? 'green' : 'red'">
                                {{ $contrato->state ? 'active' : 'inactive'}}
                            </x-badge>
                        </x-table.td>

                        <x-table.td>
                            {{ $contrato->año }}
                        </x-table.td>

                        <x-table.td>
                            {{ $contrato->cód }}
                        </x-table.td>

                        <x-table.td>
                            {{ $contrato->tít_contrato }}
                        </x-table.td>

                        <x-table.td>
                            {{ $contrato->tipo }}
                        </x-table.td>

                        {{--  <x-table.td>
                            {{ $contrato->cpc }}
                        </x-table.td>  --}}

                        <x-table.td>
                            {{ $contrato->clte }}
                        </x-table.td>

                        <x-table.td>
                            {{ $contrato->tipo_clte }}
                        </x-table.td>


                        <x-table.td class="space-x-3 whitespace-nowrap">
                            <x-link color="gray" class="inline-flex"
                                    href="{{ route('contrato.show', ['contrato' => $contrato->id]) }}">
                                <x-icons.show/>
                            </x-link>
                            <x-link color="indigo" class="inline-flex"
                                    href="{{ route('contrato.edit', ['contrato' => $contrato->id]) }}">
                                <x-icons.edit/>
                            </x-link>
                            <x-link color="{{ $contrato->state ? 'red' : 'green'}}" class="inline-flex"
                                    href="{{ route('contrato.destroy', ['contrato' => $contrato->id]) }}">
                                @if($contrato->state)
                                    <x-icons.delete/>
                                @else
                                    <x-icons.check/>
                                @endif
                            </x-link>
                        </x-table.td>
                    </tr>
                @endforeach

            </x-slot>
            <x-slot name="pagination">
                {{ $contratos->links() }}
            </x-slot>
        </x-table.list>
    </div>
    @endsection