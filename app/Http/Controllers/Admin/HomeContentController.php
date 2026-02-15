<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\StatsBanner;
use App\Models\CtaSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        $services = Service::orderBy('order')->get();
        $processSteps = ProcessStep::orderBy('order')->get();
        $stats = StatsBanner::orderBy('order')->get();
        $cta = CtaSection::first();
        
        return view('admin.home-content.index', compact('about', 'services', 'processSteps', 'stats', 'cta'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'nullable|string',
            'hero_description' => 'nullable|string',
            'hero_button_text' => 'nullable|string',
            'hero_button_link' => 'nullable|string',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $about = AboutSection::firstOrNew();
        
        if ($request->hasFile('hero_image')) {
            if ($about->hero_image) {
                Storage::disk('public')->delete($about->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('hero', 'public');
        }

        $about->fill($validated)->save();
        
        return redirect()->route('admin.home-content.index')->with('success', 'Hero slider updated successfully.');
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'sub_heading' => 'required',
            'heading' => 'required',
            'paragraph_1' => 'required',
            'paragraph_2' => 'nullable',
            'stat_1_number' => 'required',
            'stat_1_label' => 'required',
            'stat_2_number' => 'required',
            'stat_2_label' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $about = AboutSection::firstOrNew();
        
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->fill($validated)->save();
        
        return redirect()->route('admin.home-content.index')->with('success', 'About section updated successfully.');
    }

    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]);

        $cta = CtaSection::firstOrNew();
        $cta->fill($validated)->save();
        
        return redirect()->route('admin.home-content.index')->with('success', 'CTA section updated successfully.');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        Service::create($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Service added successfully.');
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $service->update($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Service updated successfully.');
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.home-content.index')->with('success', 'Service deleted successfully.');
    }

    public function storeProcessStep(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'order' => 'required|integer',
        ]);

        ProcessStep::create($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Process step added successfully.');
    }

    public function updateProcessStep(Request $request, ProcessStep $processStep)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'order' => 'required|integer',
        ]);

        $processStep->update($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Process step updated successfully.');
    }

    public function deleteProcessStep(ProcessStep $processStep)
    {
        $processStep->delete();
        return redirect()->route('admin.home-content.index')->with('success', 'Process step deleted successfully.');
    }

    public function storeStatsBanner(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required',
            'label' => 'required',
            'order' => 'required|integer',
        ]);

        StatsBanner::create($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Stats banner added successfully.');
    }

    public function updateStatsBanner(Request $request, StatsBanner $statsBanner)
    {
        $validated = $request->validate([
            'number' => 'required',
            'label' => 'required',
            'order' => 'required|integer',
        ]);

        $statsBanner->update($validated);
        
        return redirect()->route('admin.home-content.index')->with('success', 'Stats banner updated successfully.');
    }

    public function deleteStatsBanner(StatsBanner $statsBanner)
    {
        $statsBanner->delete();
        return redirect()->route('admin.home-content.index')->with('success', 'Stats banner deleted successfully.');
    }
}
