<x-layout>
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Users overview</h1>
            <a href="{{ route('admin.index') }}" class="text-blue-600 underline">Dashboard</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3">Status</th>


                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $user->id }}</td>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            @if($user->role)
                                <span class="text-green-600 font-semibold">Admin</span>
                            @else
                                User
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $user->created_at?->format('Y-m-d') }}</td>
                        <td class="px-4 py-3">
                            <form action="{{ route('users.toggle', $user) }}" method="POST" class="inline">
                                @csrf
                                <button> {{ $user->active ? 'Deactivate' : 'Activate' }} </button>
                            </form>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
