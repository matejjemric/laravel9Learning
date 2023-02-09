<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Creates a new game.') }}
                        </p>

                    <form method="post" action="{{ route('game.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="gameIconUrl" :value="__('Game Url Icon')" />
                            <x-text-input id="gameIconUrl" name="gameIconUrl" type="text" class="mt-1 block w-full" autocomplete="gameIconUrl" />
                            <x-input-error :messages="$errors->get('gameIconUrl')" class="mt-2" />
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
