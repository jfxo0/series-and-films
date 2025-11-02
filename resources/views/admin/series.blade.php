<x-layout>
    <div class="max-w-6xl mx-auto py-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Series overview</h1>
            <a href="{{ route('admin.index') }}" class="text-blue-600 underline">Dashboard</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $serie)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $serie->id }}</td>
                        <td class="px-4 py-3">{{ $serie->name }}</td>
                        <td class="px-4 py-3">{{ $serie->category?->type ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $serie->user?->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $serie->created_at?->format('Y-m-d') }}</td>
                        <td class="px-4 py-3">{{ $serie->status }}</td>
                        <td class="px-4 py-3 space-x-2">
                            @can('update', $serie)
                                <a class="text-blue-600 underline" href="{{ route('series.edit', $serie) }}">Edit</a>
                            @endcan
                            @can('delete', $serie)
                                <form action="{{ route('series.destroy', $serie) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 underline"
                                            onclick="return confirm('Delete this serie?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
