<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Loan Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Request a new loan') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-jet-label value="{{ __('Loan Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $user->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="amount" value="{{ __('Amount') }}" />
            <x-jet-input id="amount" type="text" class="mt-1 block w-full" wire:model.defer="amount" autofocus />
            @error('amount') <span class="error">{{ $message }}</span> @enderror
            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Request') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
