<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorksHero;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\WorksStats;
use App\Models\WorksStatItem;
use App\Models\WorksCta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorksContentController extends Controller
{
    public function index()
    {
        $hero = WorksHero::first() ?? new WorksHero();
        $categories = ProjectCategory::orderBy('order')->get();
        $projects = Project::with('category')->orderBy('order')->get();
        $stats = WorksStats::first() ?? new WorksStats();
        $statItems = WorksStatItem::where('works_stats_id', $stats->id ?? 0)->orderBy('order')->get();
        $cta = WorksCta::first() ?? new WorksCta();

        return view('admin.works-content.index', compact('hero', 'categories', 'projects', 'stats', 'statItems', 'cta'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $hero = WorksHero::first();
        
        if ($request->hasFile('background_image')) {
            if ($hero && $hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('works', 'public');
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            WorksHero::create($validated);
        }

        return back()->with('success', 'Hero section updated successfully!');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active');

        ProjectCategory::create($validated);

        return back()->with('success', 'Category added successfully!');
    }

    public function updateCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active');

        $category = ProjectCategory::findOrFail($id);
        $category->update($validated);

        return back()->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        ProjectCategory::findOrFail($id)->delete();
        return back()->with('success', 'Category deleted successfully!');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Project::create($validated);

        return back()->with('success', 'Project added successfully!');
    }

    public function updateProject(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'client' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        return back()->with('success', 'Project updated successfully!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return back()->with('success', 'Project deleted successfully!');
    }

    public function updateStats(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
        ]);

        $stats = WorksStats::first();
        if ($stats) {
            $stats->update($validated);
        } else {
            WorksStats::create($validated);
        }

        return back()->with('success', 'Stats section heading updated successfully!');
    }

    public function storeStatItem(Request $request)
    {
        $validated = $request->validate([
            'icon_svg' => 'nullable|string',
            'color' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $stats = WorksStats::first();
        if (!$stats) {
            $stats = WorksStats::create(['heading' => 'Our Impact']);
        }

        $validated['works_stats_id'] = $stats->id;
        WorksStatItem::create($validated);

        return back()->with('success', 'Stat item added successfully!');
    }

    public function updateStatItem(Request $request, $id)
    {
        $validated = $request->validate([
            'icon_svg' => 'nullable|string',
            'color' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $item = WorksStatItem::findOrFail($id);
        $item->update($validated);

        return back()->with('success', 'Stat item updated successfully!');
    }

    public function deleteStatItem($id)
    {
        WorksStatItem::findOrFail($id)->delete();
        return back()->with('success', 'Stat item deleted successfully!');
    }

    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
        ]);

        $cta = WorksCta::first();
        if ($cta) {
            $cta->update($validated);
        } else {
            WorksCta::create($validated);
        }

        return back()->with('success', 'CTA section updated successfully!');
    }
}
