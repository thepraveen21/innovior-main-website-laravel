@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Services Page Content</h1>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:5px;margin-bottom:20px;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="padding:15px;background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;border-radius:5px;margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Hero Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Hero Section</h3>
        <form action="{{ route('admin.services-content.update-hero') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Badge</label>
                    <input type="text" name="badge" class="form-control" value="{{ $hero->badge ?? 'Our Expertise' }}" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'Digital Solutions for Modern Enterprises' }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $hero->description ?? 'We build intelligent, scalable, and secure systems that drive business growth and operational excellence.' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Hero Section</button>
        </form>
    </div>

    <!-- Services -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Service Details</h3>
        
        <!-- Add New Service -->
        <form action="{{ route('admin.services-content.service.store') }}" method="POST" enctype="multipart/form-data" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:20px;">
            @csrf
            <h5 style="margin-top:0;">Add New Service</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nav Title</label>
                    <input type="text" name="nav_title" class="form-control" placeholder="IT Consultancy" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" placeholder="IT Consultancy" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="0" required>
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">Active</label><br>
                    <input type="checkbox" name="is_active" value="1" checked style="width:20px;height:20px;margin-top:8px;">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Service</button>
        </form>

        <!-- Existing Services -->
        @foreach($services as $service)
        <div style="border:1px solid #dee2e6;padding:20px;border-radius:5px;margin-bottom:15px;">
            <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:15px;">
                <div>
                    <h5 style="margin:0 0 5px 0;">{{ $service->heading }}</h5>
                    <small style="color:#666;">Slug: {{ $service->slug }} | Order: {{ $service->order }}</small>
                </div>
                <div>
                    @if($service->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
            
            <form action="{{ route('admin.services-content.service.update', $service) }}" method="POST" enctype="multipart/form-data" style="margin-bottom:15px;">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text" name="nav_title" class="form-control form-control-sm" value="{{ $service->nav_title }}" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="text" name="heading" class="form-control form-control-sm" value="{{ $service->heading }}" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <input type="number" name="order" class="form-control form-control-sm" value="{{ $service->order }}" required>
                    </div>
                    <div class="col-md-1 mb-2">
                        <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} style="width:20px;height:20px;">
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                    </div>
                    <div class="col-md-12 mb-2">
                        <textarea name="description" class="form-control form-control-sm" rows="2" required>{{ $service->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <img src="{{ asset('storage/' . $service->image) }}" style="max-width:150px;margin-bottom:5px;">
                        <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                </div>
            </form>
            
            <!-- Features for this service -->
            <h6 style="margin:15px 0 10px 0;">Features</h6>
            <form action="{{ route('admin.services-content.feature.store') }}" method="POST" style="margin-bottom:10px;">
                @csrf
                <input type="hidden" name="service_detail_id" value="{{ $service->id }}">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" name="feature_text" class="form-control form-control-sm" placeholder="Feature text" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="order" class="form-control form-control-sm" placeholder="Order" value="0" required>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-sm btn-primary w-100">Add</button>
                    </div>
                </div>
            </form>
            
            <ul style="margin:0;padding-left:20px;">
                @foreach($service->features->sortBy('order') as $feature)
                <li style="margin-bottom:5px;">
                    {{ $feature->feature_text }} (Order: {{ $feature->order }})
                    <form action="{{ route('admin.services-content.feature.delete', $feature) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" style="padding:2px 8px;font-size:11px;" onclick="return confirm('Delete this feature?')">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
            
            <form action="{{ route('admin.services-content.service.delete', $service) }}" method="POST" style="margin-top:10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this entire service?')">Delete Service</button>
            </form>
        </div>
        @endforeach
    </div>

    <!-- CTA Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Call to Action Section</h3>
        <form action="{{ route('admin.services-content.update-cta') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Ready to Transform Your Business?' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? 'Let\'s discuss how Innovior can build the perfect solution for you.' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Get a Free Consultation' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $cta->button_link ?? '/contact' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update CTA Section</button>
        </form>
    </div>
</div>
@endsection
