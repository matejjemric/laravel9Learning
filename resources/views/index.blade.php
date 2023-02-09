<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of user items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('user-items.grant-items') }}" class="btn btn-default">Grant Items</a>
                    <a href="{{ route('user-items.consume-items') }}" class="btn btn-default">Consume Items</a>
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered">
                        @if ($userItems->count() == 0)
                            <td colspan="5" class="text-center">
                                Nothing Found
                            </td>
                        @else
                        <tr>
                            <th style="text-align:left">Game icon</th>
                            <th style="text-align:left">Item name</th>
                            <th style="text-align:left">Item icon</th>
                            <th style="text-align:left">Item ID</th>
                            <th style="text-align:left">User ID</th>
                            <th style="text-align:left">Amount</th>
                        </tr>

                        @foreach ($userItems as $userItem)
                        <tr>

                            <td width="120px"><img src="{{ asset('storage/'.$userItem->gameIconUrl) }}" alt="" width="40" height="40" title=""></a></td>
                            <td width="120px">{{ $userItem->name }}</td>
                            <td width="120px"><img src="{{ asset('storage/'.$userItem->itemIconUrl) }}" alt="" width="40" height="40" title=""></a></td>
                            <td width="120px">{{ $userItem->itemId }}</td>
                            <td width="120px">{{ $userItem->userId }}</td>
                            <td width="120px">{{ $userItem->amount }}</td>
                        </tr>

                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
