@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:800px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Edit Page</h1>
    <div style="background:#fff;padding:32px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $page->content) }}</textarea>
        </div>
        <div style="display:flex;gap:10px;">
            <button type="submit" class="btn btn-success" style="padding:10px 24px;">Update</button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary" style="padding:10px 24px;">Cancel</a>
        </div>
    </form>
    </div>
</div>
@endsection
