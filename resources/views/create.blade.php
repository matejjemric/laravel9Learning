<x-app-layout>
    <form method="POST">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Game') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <input type="text" name="urlIcon">
                    </div>

                    <div class="max-w-xl">
                        <button type="submit">Create</button>
                    </div>
                </div>

                <!--<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                    </div>
                </div> -->
            </div>
        </div>
    </form>
</x-app-layout>
