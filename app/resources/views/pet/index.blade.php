@extends('layouts.app')

@section('title', 'Pets')

@section('content')
    <h1 class="text-xl font-bold mb-4">List pets</h1>

    <a
        href="{{ route('pet.create') }}"
        class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded"
    >
        Add Pet
    </a>

    <table class="border border-gray-300 border-collapse w-full">
        <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-3 py-2">Id</th>
            <th class="border border-gray-300 px-3 py-2">Name</th>
            <th class="border border-gray-300 px-3 py-2">Status</th>
            <th class="border border-gray-300 px-3 py-2 w-48">Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($pets as $pet)
            <tr>
                <td class="border border-gray-300 px-3 py-2">
                    {{ $pet['id'] }}
                </td>

                <td class="border border-gray-300 px-3 py-2">
                    {{ $pet['name'] }}
                </td>

                <td class="border border-gray-300 px-3 py-2">
                    {{ $pet['status'] }}
                </td>

                <td class="border border-gray-300 px-3 py-2 flex gap-2">
                    <a
                        href="{{ route('pet.edit', $pet['id']) }}"
                        class="px-3 py-1 bg-yellow-500 text-white rounded"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('pet.destroy', $pet['id']) }}"
                        method="POST"
                        onsubmit="return confirm('Delete this pet?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="px-3 py-1 bg-red-600 text-white rounded"
                        >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="border border-gray-300 px-3 py-4 text-center">
                    No pets found.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
