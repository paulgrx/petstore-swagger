@extends('layouts.app')

@section('title', 'Edit Pet')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit Pet</h1>

    @if ($errors->has('error'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('pet.update', $pet['id']) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $pet['name']) }}"
                class="border px-3 py-2 w-full"
            >
            @error('name')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block">Photo URL</label>
            <input
                type="text"
                name="photoUrls[]"
                value="{{ old('photoUrls.0', $pet['photoUrls'][0] ?? '') }}"
                class="border px-3 py-2 w-full"
            >
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="border px-3 py-2 w-full">
                @foreach (['available','pending','sold'] as $status)
                    <option
                        value="{{ $status }}"
                        @selected(old('status', $pet['status']) === $status)
                    >
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white">
            Update
        </button>
    </form>
@endsection
