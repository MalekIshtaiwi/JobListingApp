<x-layout>
    <x-slot:heading>
        Show Job
    </x-slot:heading>
    <h1>{{ $job['title'] }}</h1>

    <p> This Job Pays {{ $job['salary'] }}</p>
</x-layout>
