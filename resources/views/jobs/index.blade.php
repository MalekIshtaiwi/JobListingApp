<x-layout>
    <x-slot:heading>
        About Page
    </x-slot:heading>
    <h1>Hello From The About Page</h1>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class=" block px-4 py-5 border border-cyan-600">
                <div class="font-bold text-blue-500 hover:underline  text-sm">
                    {{ $job->employer->name }}
                </div>

                <div class="text-black hover:underline hover:text-blue-500">
                    <strong>{{ $job['title'] }} </strong> pays {{ $job['salary'] }} a year
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
