<div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8 space-y-4">

    @if (session('success'))
        <div class="rounded-md border border-green-200 bg-green-50 p-4">
            <div class="text-sm font-medium text-green-800">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-md border border-red-200 bg-red-50 p-4">
            <ul class="list-disc list-inside text-sm text-red-800 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
