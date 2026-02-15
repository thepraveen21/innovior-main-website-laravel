<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesHero;
use App\Models\ServiceDetail;
use App\Models\ServiceFeature;
use App\Models\ServicesCta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesContentController extends Controller
{
    public function index()
    {
        $hero = ServicesHero::first();
        $services = ServiceDetail::with('features')->orderBy('order')->get();
        $cta = ServicesCta::first();
        
        return view('admin.services-content.index', compact('hero', 'services', 'cta'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $hero = ServicesHero::firstOrNew();
        
        if ($request->hasFile('hero_image')) {
            if ($hero->hero_image) {
                Storage::disk('public')->delete($hero->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('heroes/services', 'public');
        }

        $hero->fill($validated)->save();
        
        return redirect()->route('admin.services-content.index')->with('success', 'Hero section updated successfully.');
    }

    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]);

        $cta = ServicesCta::firstOrNew();
        $cta->fill($validated)->save();
        
        return redirect()->route('admin.services-content.index')->with('success', 'CTA section updated successfully.');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'nav_title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->nav_title);
        $validated['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        ServiceDetail::create($validated);
        
        return redirect()->route('admin.services-content.index')->with('success', 'Service added successfully.');
    }

    public function updateService(Request $request, ServiceDetail $service)
    {
        $validated = $request->validate([
            'nav_title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->nav_title);
        $validated['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);
        
        return redirect()->route('admin.services-content.index')->with('success', 'Service updated successfully.');
    }

    public function deleteService(ServiceDetail $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.services-content.index')->with('success', 'Service deleted successfully.');
    }

    public function storeFeature(Request $request)
    {
        $validated = $request->validate([
            'service_detail_id' => 'required|exists:service_details,id',
            'feature_text' => 'required',
            'order' => 'required|integer',
        ]);

        ServiceFeature::create($validated);
        
        return redirect()->route('admin.services-content.index')->with('success', 'Feature added successfully.');
    }

    public function deleteFeature(ServiceFeature $feature)
    {
        $feature->delete();
        return redirect()->route('admin.services-content.index')->with('success', 'Feature deleted successfully.');
    }
}
