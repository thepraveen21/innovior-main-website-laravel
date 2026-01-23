@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Home Page Content</h1>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:5px;margin-bottom:20px;">{{ session('success') }}</div>
    @endif

    <!-- About Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">About Section</h3>
        <form action="{{ route('admin.home-content.update-about') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sub Heading</label>
                    <input type="text" name="sub_heading" class="form-control" value="{{ $about->sub_heading ?? 'Who We Are' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Main Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $about->heading ?? '' }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Paragraph 1</label>
                    <textarea name="paragraph_1" class="form-control" rows="3" required>{{ $about->paragraph_1 ?? '' }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Paragraph 2</label>
                    <textarea name="paragraph_2" class="form-control" rows="3">{{ $about->paragraph_2 ?? '' }}</textarea>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control" value="{{ $about->stat_1_number ?? '50+' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-control" value="{{ $about->stat_1_label ?? 'Projects' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control" value="{{ $about->stat_2_number ?? '100%' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-control" value="{{ $about->stat_2_label ?? 'Success' }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Image</label>
                    @if($about && $about->image)
                        <div><img src="{{ asset('storage/' . $about->image) }}" style="max-width:200px;margin-bottom:10px;"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update About Section</button>
        </form>
    </div>

    <!-- CTA Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Call to Action Section</h3>
        <form action="{{ route('admin.home-content.update-cta') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Let\'s Build Something Powerful' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Start Your Project' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $cta->button_link ?? '/contact' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update CTA Section</button>
        </form>
    </div>

    <!-- Services Note -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:15px;font-size:20px;font-weight:600;">Services</h3>
        
        <!-- Add New Service -->
        <form action="{{ route('admin.home-content.service.store') }}" method="POST" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:20px;">
            @csrf
            <h5 style="margin-top:0;">Add New Service</h5>
            <div class="row">
                <div class="col-md-2 mb-2">
                    <input type="text" name="icon" class="form-control" placeholder="Icon (emoji or class)" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="title" class="form-control" placeholder="Service Title" required>
                </div>
                <div class="col-md-4 mb-2">
                    <input type="text" name="description" class="form-control" placeholder="Description" required>
                </div>
                <div class="col-md-2 mb-2">
                    <input type="number" name="order" class="form-control" placeholder="Order" required>
                </div>
                <div class="col-md-1 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" name="link" class="form-control" placeholder="Link (optional)">
                </div>
                <div class="col-md-6 mb-2">
                    <label><input type="checkbox" name="is_active" value="1" checked> Active</label>
                </div>
            </div>
        </form>

        <!-- Existing Services -->
        <table class="table">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <form action="{{ route('admin.home-content.service.update', $service) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="icon" class="form-control form-control-sm" value="{{ $service->icon }}" required></td>
                        <td><input type="text" name="title" class="form-control form-control-sm" value="{{ $service->title }}" required></td>
                        <td><input type="text" name="description" class="form-control form-control-sm" value="{{ $service->description }}" required></td>
                        <td><input type="number" name="order" class="form-control form-control-sm" style="width:70px;" value="{{ $service->order }}" required></td>
                        <td><input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }}></td>
                        <td>
                            <input type="hidden" name="link" value="{{ $service->link }}">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.service.delete', $service) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Process Steps -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:15px;font-size:20px;font-weight:600;">Process Steps</h3>
        
        <!-- Add New Process Step -->
        <form action="{{ route('admin.home-content.process-step.store') }}" method="POST" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:20px;">
            @csrf
            <h5 style="margin-top:0;">Add New Process Step</h5>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <input type="text" name="title" class="form-control" placeholder="Step Title" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="description" class="form-control" placeholder="Description" required>
                </div>
                <div class="col-md-1 mb-2">
                    <input type="number" name="order" class="form-control" placeholder="Order" required>
                </div>
                <div class="col-md-1 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
            </div>
        </form>

        <!-- Existing Process Steps -->
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processSteps as $step)
                <tr>
                    <form action="{{ route('admin.home-content.process-step.update', $step) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="title" class="form-control form-control-sm" value="{{ $step->title }}" required></td>
                        <td><input type="text" name="description" class="form-control form-control-sm" value="{{ $step->description }}" required></td>
                        <td><input type="number" name="order" class="form-control form-control-sm" style="width:70px;" value="{{ $step->order }}" required></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.process-step.delete', $step) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this step?')">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Stats Banner -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:15px;font-size:20px;font-weight:600;">Stats Banner</h3>
        
        <!-- Add New Stat -->
        <form action="{{ route('admin.home-content.stats-banner.store') }}" method="POST" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:20px;">
            @csrf
            <h5 style="margin-top:0;">Add New Stat</h5>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <input type="text" name="number" class="form-control" placeholder="Number (500+, 10K)" required>
                </div>
                <div class="col-md-4 mb-2">
                    <input type="text" name="label" class="form-control" placeholder="Label" required>
                </div>
                <div class="col-md-2 mb-2">
                    <input type="number" name="order" class="form-control" placeholder="Order" required>
                </div>
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
            </div>
        </form>

        <!-- Existing Stats -->
        <table class="table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Label</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats as $stat)
                <tr>
                    <form action="{{ route('admin.home-content.stats-banner.update', $stat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="number" class="form-control form-control-sm" value="{{ $stat->number }}" required></td>
                        <td><input type="text" name="label" class="form-control form-control-sm" value="{{ $stat->label }}" required></td>
                        <td><input type="number" name="order" class="form-control form-control-sm" style="width:70px;" value="{{ $stat->order }}" required></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.stats-banner.delete', $stat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this stat?')">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
