<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class PetController extends Controller
{
    public function index(): Factory|View
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus', ['status' => 'available']);

        $pets = collect($response->json())
            ->filter(fn ($pet) => !empty($pet['name']))
            ->values()
            ->all();

        return view('pet.index', ['pets' => $pets]);
    }

    public function create(): Factory|View
    {
        return view('pet.create');
    }

    public function store(Request $request): RedirectResponse
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photoUrls' => 'required|array|min:1',
            'photoUrls.*' => 'required|string',
            'status' => 'required|in:available,pending,sold'
        ]);

        try {
            Http::asJson()->post('https://petstore.swagger.io/v2/pet', $validated)->throw();
        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'error' => [__('Can not create pet')],
            ]);
        }

        return redirect()->route('pet.index')->with('success', 'Pet created successfully.');
    }

    public function edit(int $id): Factory|View
    {
        $response = Http::get("https://petstore.swagger.io/v2/pet/{$id}");

        return view('pet.edit', ['pet' => $response->json()]);
    }

    public function update(Request $request, int $id): View|Factory|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,pending,sold'
        ]);

        try {
            Http::asForm()->post("https://petstore.swagger.io/v2/pet/{$id}", $validated)->throw();
        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'error' => [__('Could not update pet')],
            ]);
        }

        return redirect()->route('pet.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            Http::delete("https://petstore.swagger.io/v2/pet/{$id}")
                ->throw();
        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'error' => [__('Can not delete pet')],
            ]);
        }

        return redirect()->route('pet.index')->with('success', __('Pet deleted successfully.'));
    }
}
