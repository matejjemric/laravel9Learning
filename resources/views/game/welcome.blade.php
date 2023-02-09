<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Games list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('game.create') }}">Create New</a>
                </div>
                <div class="p-6 text-gray-900">
                    <p>{{ session()->get('success') ?: '' }}</p>
                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align:left">Game ID</th>
                            <th style="text-align:left">Game icon url</th>
                        </tr>
                        @forelse ($games as $game)
                        <tr>
                            <td width="120px">{{ $game->id }}</td>
                            <td width="250px">{{ $game->gameIconUrl }}</td>
                            <td width="70px"><a href="{{ route('game.edit',$game->id) }}">Edit</a></td>
                            <!-- <td><form method="POST" action="{{ route('game.destroy',$game->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form></td> -->
                        </tr>
                        @empty
                            <p>No games found!</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

