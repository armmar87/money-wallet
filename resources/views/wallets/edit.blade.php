<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div>{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('wallets.update',['wallet' => $wallet->id]) }}">
            @csrf
            @method('PUT')

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$wallet->name" required autofocus autocomplete="name" />
            </div>

            <div class="form-group mt-4">
                <select class="mt-1 w-full" name="type">
                    <option>Select Wallet type</option>
                    @foreach (config('types.wallets') as $type)
                        <option value="{{ $type }}" {{ $type === $wallet->type ? 'selected="selected"' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('wallets.index') }}">
                    {{ __('Reports') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
