

<x-layout>

        <div class="max-w-6xl mx-auto py-10">
            <h1 class="text-3xl font-bold mb-8">Admin dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.series') }}"
                   class="bg-[#1f2937] text-white rounded-lg p-6 shadow hover:bg-[#111827] transition">
                    <p class="text-sm opacity-70">Series</p>
                    <p class="text-3xl font-bold">{{ $seriesCount }}</p>
                </a>

                <a href="{{ route('admin.categories') }}"
                   class="bg-[#1f2937] text-white rounded-lg p-6 shadow hover:bg-[#111827] transition">
                    <p class="text-sm opacity-70">Categories</p>
                    <p class="text-3xl font-bold">{{ $categoriesCount }}</p>
                </a>

                <a href="{{ route('admin.users') }}"
                   class="bg-[#1f2937] text-white rounded-lg p-6 shadow hover:bg-[#111827] transition">
                    <p class="text-sm opacity-70">Users</p>
                    <p class="text-3xl font-bold">{{ $usersCount }}</p>
                </a>
            </div>
        </div>


</x-layout>
