<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustriesHero;
use App\Models\IndustriesIntro;
use App\Models\IndustryCard;
use App\Models\IndustriesWhy;
use App\Models\IndustriesWhyItem;
use App\Models\IndustriesCta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustriesContentController extends Controller
{
    public function index()
    {
        $hero = IndustriesHero::first();
        $intro = IndustriesIntro::first();
        $industries = IndustryCard::orderBy('order')->get();
        $why = IndustriesWhy::first();
        $whyItems = IndustriesWhyItem::orderBy('order')->get();
        $cta = IndustriesCta::first();
        
        return view('admin.industries-content.index', compact('hero', 'intro', 'industries', 'why', 'whyItems', 'cta'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'required',
            'heading' => 'required',
            'description' => 'required',
        ]);

        $hero = IndustriesHero::firstOrNew();
        $hero->fill($validated)->save();
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Hero section updated successfully.');
    }

    public function updateIntro(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'stat_1_number' => 'required',
            'stat_1_label' => 'required',
            'stat_2_number' => 'required',
            'stat_2_label' => 'required',
        ]);

        $intro = IndustriesIntro::firstOrNew();
        $intro->fill($validated)->save();
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Intro section updated successfully.');
    }

    public function storeIndustry(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'link' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('industries', 'public');
        }

        IndustryCard::create($validated);
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Industry added successfully.');
    }

    public function updateIndustry(Request $request, IndustryCard $industry)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }
            $validated['image'] = $request->file('image')->store('industries', 'public');
        }

        $industry->update($validated);
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Industry updated successfully.');
    }

    public function deleteIndustry(IndustryCard $industry)
    {
        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }
        $industry->delete();
        return redirect()->route('admin.industries-content.index')->with('success', 'Industry deleted successfully.');
    }

    public function updateWhy(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $why = IndustriesWhy::firstOrNew();
        
        if ($request->hasFile('image')) {
            if ($why->image) {
                Storage::disk('public')->delete($why->image);
            }
            $validated['image'] = $request->file('image')->store('industries', 'public');
        }

        $why->fill($validated)->save();
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Why section updated successfully.');
    }

    public function storeWhyItem(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'order' => 'required|integer',
        ]);

        IndustriesWhyItem::create($validated);
        
        return redirect()->route('admin.industries-content.index')->with('success', 'Why item added successfully.');
    }

    public function deleteWhyItem(IndustriesWhyItem $whyItem)
    {
        $whyItem->delete();
        return redirect()->route('admin.industries-content.index')->with('success', 'Why item deleted successfully.');
    }

    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]);

        $cta = IndustriesCta::firstOrNew();
        $cta->fill($validated)->save();
        
        return redirect()->route('admin.industries-content.index')->with('success', 'CTA section updated successfully.');
    }
}
