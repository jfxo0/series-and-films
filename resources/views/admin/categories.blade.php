<x-layout>
    <div class="max-w-4xl mx-auto py-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Categories overview</h1>
            <a href="{{ route('admin.index') }}" class="text-blue-600 underline">Dashboard</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Genre</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $category->id }}</td>
                        <td class="px-4 py-3">{{ $category->type }}</td>
                        <td class="px-4 py-3">{{ $category->genre }}</td>
                        <td class="px-4 py-3">{{ $category->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
