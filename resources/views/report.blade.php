<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-button class="ml-4 bg-blue-600">
                    <a class="text-sm text-white-600 hover:text-gray-900" href="{{ route('wallets.index') }}">
                        {{ __('Wallets') }}
                    </a>
                </x-jet-button>

                <x-jet-button class="ml-4 bg-blue-600">
                    <a class="text-sm text-white-600 hover:text-gray-900" href="{{ route('records.index') }}">
                        {{ __('Records') }}
                    </a>
                </x-jet-button>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">
                    <h2>{{ __('Reports') }}</h2>
                    @php( $totalSum = 0 )
                    <table class="table table-bordered mb-1">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wallets as $wallet)
                            @php( $totalSum = $totalSum + $wallet->records->sum('amount') )
                            <tr>
                                <th scope="row">{{ $wallet->id }}</th>
                                <td>{{ $wallet->name }}</td>
                                <td>{{ $wallet->type }}</td>
                                <td style="text-align: end">
                                    {{ $wallet->records->sum('amount') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mb-5 font-bold" style="text-align: end">Total {{ $totalSum }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
