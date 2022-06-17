@extends('dashboard')

@section('content')
    <div class="bg-white p-6 md:p-8 shadow-md">
        <div class="grid grid-cols-12 gap-3 px-4 sm:px-0">
            <div class="col-span-12 md:col-span-8">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ __("Información del personal") }}
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Lista de usuarios que han sido registrados en el sistema") }}
                </p>
            </div>

            <div class="col-span-12 md:col-span-4 flex items-center mx-auto max-w-max md:w-full">
                <form method="GET" action="{{ route('admin.index') }}" >
                    <x-search/>
                </form>
            </div>

        </div>

        <x-table.list>
            <x-slot name="thead">
                <tr>
                    <x-table.th>{{ __("Nombres") }}</x-table.th>
                    <x-table.th>{{ __("Número de Teléfono") }}</x-table.th>
                    <x-table.th>{{ __("Email") }}</x-table.th>
                    <x-table.th>{{ __("email verificado") }}</x-table.th>
                    <x-table.th>{{ __("Estado") }}</x-table.th>
                    <x-table.th>{{ __("Acciones") }}</x-table.th>
                </tr>
            </x-slot>

            <x-slot name="tbody">

                @foreach($directors as $director)
                    <tr>
                        <x-table.td class=" space-x-3 whitespace-nowrap">
                            <x-user-avatar class="hidden md:inline-flex" src="{{  $director->image->getUrl() }}"/>
                            <p class="inline-flex">{{ $director->getFullName() }}</p>
                        </x-table.td>

                        <x-table.td>
                            {{ $director->personal_phone }}
                        </x-table.td>
                        <x-table.td>
                            {{ $director->email }}
                        </x-table.td>

                        <x-table.td>
                            {{ $director->email_verified_at }}
                        </x-table.td>

                        <x-table.td>
                            <x-badge :color="$director->state ? 'green' : 'red'">
                                {{ $director->state ? 'active' : 'inactive'}}
                            </x-badge>
                        </x-table.td>

                        <x-table.td class="space-x-3 whitespace-nowrap">
                            <x-link color="gray" class="inline-flex"
                                    href="{{ route('admin.show', ['user' => $director->id]) }}">
                                <x-icons.show/>
                            </x-link>
                            @if ($director->state)
                                <x-link color="indigo" class="inline-flex"
                                        href="{{ route('admin.edit', ['user' => $director->id]) }}">
                                    <x-icons.edit/>
                                </x-link>
                            @endif
                            <x-link color="{{ $director->state ? 'red' : 'green'}}" class="inline-flex"
                                    href="{{ route('admin.destroy', ['user' => $director->id]) }}">
                                @if($director->state)
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
                {{ $directors->links() }}
            </x-slot>
        </x-table.list>
    </div>
@endsection