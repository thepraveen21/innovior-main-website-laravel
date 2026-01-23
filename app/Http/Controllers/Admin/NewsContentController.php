<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsHero;
use App\Models\NewsCategory;
use App\Models\NewsArticle;
use App\Models\NewsLatestSection;
use App\Models\NewsNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsContentController extends Controller
{
    public function index()
    {
        $hero = NewsHero::first();
        $categories = NewsCategory::orderBy('order')->get();
        $articles = NewsArticle::with('category')->orderBy('order')->get();
        $latestSection = NewsLatestSection::first();
        $newsletter = NewsNewsletter::first();

        return view('admin.news-content.index', compact('hero', 'categories', 'articles', 'latestSection', 'newsletter'));
    }

    // Hero Section
    public function updateHero(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $hero = NewsHero::first() ?? new NewsHero();
        $hero->heading = $request->heading;
        $hero->description = $request->description;

        if ($request->hasFile('background_image')) {
            if ($hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $hero->background_image = $request->file('background_image')->store('news', 'public');
        }

        $hero->save();

        return redirect()->back()->with('success', 'Hero section updated successfully!');
    }

    // Categories
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $category = NewsCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    // Articles
    public function storeArticle(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'read_time' => 'required|integer|min:1',
            'order' => 'required|integer',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'read_time' => $request->read_time,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
            'order' => $request->order,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        NewsArticle::create($data);

        return redirect()->back()->with('success', 'Article created successfully!');
    }

    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'read_time' => 'required|integer|min:1',
            'order' => 'required|integer',
        ]);

        $article = NewsArticle::findOrFail($id);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'read_time' => $request->read_time,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
            'order' => $request->order,
        ];

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $article->update($data);

        return redirect()->back()->with('success', 'Article updated successfully!');
    }

    public function deleteArticle($id)
    {
        $article = NewsArticle::findOrFail($id);
        
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }

    // Latest News Section
    public function updateLatestSection(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
        ]);

        $latestSection = NewsLatestSection::first() ?? new NewsLatestSection();
        $latestSection->heading = $request->heading;
        $latestSection->save();

        return redirect()->back()->with('success', 'Latest News section updated successfully!');
    }

    // Newsletter
    public function updateNewsletter(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
        ]);

        $newsletter = NewsNewsletter::first() ?? new NewsNewsletter();
        $newsletter->heading = $request->heading;
        $newsletter->description = $request->description;
        $newsletter->button_text = $request->button_text;
        $newsletter->save();

        return redirect()->back()->with('success', 'Newsletter section updated successfully!');
    }
}
