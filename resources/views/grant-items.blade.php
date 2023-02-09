<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grant Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Grant items to user.') }}
                        </p>

                    <form method="post" action="{{ route('user-items.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="itemId" :value="__('Item ID')" />
                            <x-text-input id="itemId" name="itemId" type="text" class="mt-1 block w-full" autocomplete="itemId" />
                            <x-input-error :messages="$errors->get('itemId')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="userId" :value="__('User ID')" />
                            <x-text-input id="userId" name="userId" type="text" class="mt-1 block w-full" autocomplete="userId" />
                            <x-input-error :messages="$errors->get('userId')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full" autocomplete="amount" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
