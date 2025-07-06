<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $user = auth('client')->user();
        $portfolios = $user->portfolios()->with(['media', 'services'])->latest()->get();
        $services = \App\Models\Service::all();
        return view('web.profile-portfolio', compact('portfolios', 'user', 'services'));
    }

    public function store(Request $request)
    {
        $user = auth('client')->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'date' => 'nullable|date',
            'details' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'project_url' => 'nullable|url',
            'location' => 'nullable|string|max:255',
            'expertise' => 'nullable|array',
            'expertise.*' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
            'image' => 'nullable|image|max:5120', // 5MB
        ]);

        $portfolio = $user->portfolios()->create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . uniqid(),
            'type' => $validated['type'] ?? null,
            'date' => $validated['date'] ?? null,
            'details' => $validated['details'] ?? null,
            'client_name' => $validated['client_name'] ?? null,
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'project_url' => $validated['project_url'] ?? null,
            'location' => $validated['location'] ?? null,
            'expertise' => $request->expertise ?? [],
        ]);

        // Sync services if any are selected
        if ($request->has('services')) {
            $portfolio->services()->sync($request->services);
        }

        if ($request->hasFile('image')) {
            $portfolio->addMedia($request->file('image'))->toMediaCollection('portfolio');
        }

        return redirect()->route('client.portfolio')->with('success', 'Portfolio item added successfully!');
    }

    public function update(Request $request, $id){
        $user = auth('client')->user();
        $portfolio = $user->portfolios()->findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'date' => 'nullable|date',
            'details' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'project_url' => 'nullable|url',
            'location' => 'nullable|string|max:255',
            'expertise' => 'nullable|array',
            'expertise.*' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
            'image' => 'nullable|image|max:5120',
        ]);
        $portfolio->update([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? $portfolio->type,
            'date' => $validated['date'] ?? $portfolio->date,
            'details' => $validated['details'] ?? $portfolio->details,
            'client_name' => $validated['client_name'] ?? $portfolio->client_name,
            'challenge' => $validated['challenge'] ?? $portfolio->challenge,
            'solution' => $validated['solution'] ?? $portfolio->solution,
            'project_url' => $validated['project_url'] ?? $portfolio->project_url,
            'location' => $validated['location'] ?? $portfolio->location,
            'expertise' => $request->expertise ?? $portfolio->expertise ?? [],
        ]);
        // Sync services if any are selected
        if ($request->has('services')) {
            $portfolio->services()->sync($request->services);
        }
        if ($request->hasFile('image')) {
            $portfolio->clearMediaCollection('portfolio');
            $portfolio->addMedia($request->file('image'))->toMediaCollection('portfolio');
        }
        return redirect()->route('client.portfolio')->with('success', 'Portfolio item updated successfully!');
    }

    public function destroy($id)
    {
        $user = auth('client')->user();
        $portfolio = $user->portfolios()->findOrFail($id);
        $portfolio->delete();
        return redirect()->route('client.portfolio')->with('success', 'Portfolio item deleted successfully!');
    }

    public function show($id)
    {
        $user = auth('client')->user();
        $portfolio = $user->portfolios()->with(['media', 'services'])->findOrFail($id);
        $services = \App\Models\Service::all();
        return view('web.portfolio.profile-portfolio-show', compact('portfolio', 'user', 'services'));
    }

    /**
     * Get the services associated with a portfolio item
     *
     * @param int $id Portfolio ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getServices($id)
    {
        $user = auth('client')->user();
        $portfolio = $user->portfolios()->findOrFail($id);
        $serviceIds = $portfolio->services()->pluck('service_id')->toArray();

        return response()->json([
            'services' => $serviceIds
        ]);
    }
}
