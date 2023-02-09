<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Updates existing item.') }}
                        </p>

                    <form action="{{ route('item.update',$item->id) }}" method="post" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $item->name }}" autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="itemIconUrl" :value="__('Item Icon Url')" />
                            <x-text-input id="itemIconUrl" name="itemIconUrl" type="text" class="mt-1 block w-full" value="{{ $item->itemIconUrl }}" autocomplete="itemIconUrl" />
                            <x-input-error :messages="$errors->get('itemIconUrl')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="gameId" :value="__('Game ID')" />
                            <x-text-input id="gameId" name="gameId" type="text" class="mt-1 block w-full" value="{{ $item->gameId }}" autocomplete="gameId" />
                            <x-input-error :messages="$errors->get('gameId')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
