@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:800px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Edit Slider</h1>
    <div style="background:#fff;padding:32px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $slider->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text) }}">
        </div>
        <div class="mb-3">
            <label for="button_link" class="form-label">Button Link</label>
            <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $slider->button_link) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Background Image</label>
            @if($slider->image)
                <div><img src="{{ asset('storage/' . $slider->image) }}" style="max-width:200px;margin-bottom:10px;"></div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="is_active" id="is_active" {{ $slider->is_active ? 'checked' : '' }}>
            <label for="is_active">Active</label>
        </div>
        <div style="display:flex;gap:10px;">
            <button type="submit" class="btn btn-success" style="padding:10px 24px;">Update</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary" style="padding:10px 24px;">Cancel</a>
        </div>
    </form>
    </div>
</div>
@endsection
