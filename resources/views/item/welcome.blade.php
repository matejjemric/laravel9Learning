<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('item.create') }}">Create New</a>
                </div>
                <div class="p-6 text-gray-900">
                    <p>{{ session()->get('success') ?: '' }}</p>
                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align:left">Item ID</th>
                            <th style="text-align:left">Name</th>
                            <th style="text-align:left">Item Icon Url</th>
                            <th style="text-align:left">Game ID</th>
                        </tr>
                        @forelse ($items as $item)
                        <tr>
                            <td width="120px">{{ $item->id }}</td>
                            <td width="120px">{{ $item->name }}</td>
                            <td width="250px">{{ $item->itemIconUrl }}</td>
                            <td width="120px">{{ $item->gameId }}</td>
                            <td width="70px"><a href="{{ route('item.edit',$item->id) }}">Edit</a></td>
                            <!-- <td><form method="POST" action="{{ route('item.destroy',$item->id) }}">
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

