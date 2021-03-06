<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">
                    <div class="flex">
                        <h2>{{ __('Records') }}</h2>
                        <x-jet-button class="ml-20 btn-green mb-3">
                            <a class="text-sm text-white-600 hover:text-gray-900" href="{{ route('records.create') }}">
                                {{ __('Add, Withdraw Money') }}
                            </a>
                        </x-jet-button>
                    </div>
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Wallet</th>
                            <th scope="col">Type</th>
                            <th scope="col" class="w-3/12">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <th scope="row">{{ $record->id }}</th>
                                <td>{{ $record->amount }}</td>
                                <td>{{ $record->wallet->name }}</td>
                                <td>{{ $record->type }}</td>
                                <td>{{ $record->action }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
