<x-guest-layout>
    <x-jet-authentication-card>
        <h1>{{ __('Create Wallet') }}</h1>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div>{{ session('status') }}</div>
        @endif


        <form method="POST" action="{{ route('wallets.store') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full mb-4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <label for="type">Select Wallet Type</label>
            <div class="form-group">
                <select class="mt-1 w-full mb-4" name="type">
                    @foreach (config('types.wallets') as $type)
                        <option value="{{ $type }}">
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (! session('status'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('wallets.index') }}">
                        {{ __('Wallets') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
