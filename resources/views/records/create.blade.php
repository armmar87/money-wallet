<x-guest-layout>
    <x-jet-authentication-card>
        <h1>{{ __('Create Record') }}</h1>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />



        <form method="POST" action="{{ route('records.store') }}">
            @csrf

            <div>
                <x-jet-label for="amount" value="{{ __('Amount') }}" />
                <x-jet-input id="amount" class="block mt-1 mb-4 w-full" type="number" name="amount" :value="old('amount')" required autofocus autocomplete="amount" />
            </div>

            <label for="type">Select Wallets</label>
            <div class="form-group">
                <select class="mt-1 w-full mb-4" name="wallet_id" id="type">
                    @foreach ($wallets as $wallet)
                        <option value="{{ $wallet->id }}">
                            {{ $wallet->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <label for="type">Select Record type</label>
            <div class="form-group">
                <select class="mt-1 w-full mb-4" name="type">
                    @foreach (config('types.records') as $type)
                        <option value="{{ $type }}">
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-2 mb-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('records.index') }}">
                    {{ __('Records') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
