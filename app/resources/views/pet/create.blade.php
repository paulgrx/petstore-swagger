@extends('layouts.app')

@section('title', 'Add Pet')

@section('content')
    <h1 class="text-xl font-bold mb-4">Add Pet</h1>

    @if ($errors->has('error'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('pet.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block">Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
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
                value="{{ old('photoUrls.0') }}"
                class="border px-3 py-2 w-full"
            >
            @error('photoUrls')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="border px-3 py-2 w-full">
                <option value="available">available</option>
                <option value="pending">pending</option>
                <option value="sold">sold</option>
            </select>
            @error('status')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white">
            Save
        </button>
    </form>
@endsection
