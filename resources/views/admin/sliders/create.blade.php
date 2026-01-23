@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:800px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Create Slider</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div style="background:#fff;padding:32px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" name="button_text" id="button_text" class="form-control" value="{{ old('button_text') }}">
        </div>
        <div class="mb-3">
            <label for="button_link" class="form-label">Button Link</label>
            <input type="text" name="button_link" id="button_link" class="form-control" value="{{ old('button_link') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Background Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked>
            <label for="is_active">Active</label>
        </div>
        <div style="display:flex;gap:10px;">
            <button type="submit" class="btn btn-success" style="padding:10px 24px;">Create</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary" style="padding:10px 24px;">Cancel</a>
        </div>
    </form>
    </div>
</div>
@endsection
