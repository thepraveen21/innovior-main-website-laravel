@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Industries Page Content</h1>
    
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
        <form action="{{ route('admin.industries-content.update-hero') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Badge</label>
                    <input type="text" name="badge" class="form-control" value="{{ $hero->badge ?? 'Sectors We Serve' }}" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'Technology Built for Real-World Impact' }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $hero->description ?? 'Innovior delivers tailored software solutions across diverse industries, helping organizations scale, innovate, and lead in their markets.' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Hero Section</button>
        </form>
    </div>

    <!-- Intro Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Intro Section</h3>
        <form action="{{ route('admin.industries-content.update-intro') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $intro->heading ?? 'Understanding Your Challenges' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $intro->description ?? 'Every industry operates differently. We don\'t believe in one-size-fits-all. Our domain experts dive deep into your sector\'s regulations, workflows, and customer expectations to build software that actually works.' }}</textarea>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control" value="{{ $intro->stat_1_number ?? '8+' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-control" value="{{ $intro->stat_1_label ?? 'Industries Served' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control" value="{{ $intro->stat_2_number ?? '100%' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-control" value="{{ $intro->stat_2_label ?? 'Compliance Ready' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Intro Section</button>
        </form>
    </div>

    <!-- Industry Cards -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Industry Cards</h3>
        
        <!-- Add New Industry -->
        <form action="{{ route('admin.industries-content.industry.store') }}" method="POST" enctype="multipart/form-data" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:20px;">
            @csrf
            <h5 style="margin-top:0;">Add New Industry</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Healthcare" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Secure telemedicine..." required>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Link (optional)</label>
                    <input type="text" name="link" class="form-control" placeholder="#">
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="0" required>
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">Active</label><br>
                    <input type="checkbox" name="is_active" value="1" checked style="width:20px;height:20px;margin-top:8px;">
                </div>
                <div class="col-md-1 mb-3">
                    <label class="form-label">&nbsp;</label><br>
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
            </div>
        </form>

        <!-- Existing Industries -->
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $industry)
                <tr>
                    <form action="{{ route('admin.industries-content.industry.update', $industry) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td>
                            <img src="{{ asset('storage/' . $industry->image) }}" style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
                        </td>
                        <td><input type="text" name="title" class="form-control form-control-sm" value="{{ $industry->title }}" required></td>
                        <td><input type="text" name="description" class="form-control form-control-sm" value="{{ $industry->description }}" required></td>
                        <td><input type="number" name="order" class="form-control form-control-sm" style="width:60px;" value="{{ $industry->order }}" required></td>
                        <td>
                            <input type="checkbox" name="is_active" value="1" {{ $industry->is_active ? 'checked' : '' }} style="width:20px;height:20px;">
                        </td>
                        <td>
                            <input type="hidden" name="link" value="{{ $industry->link }}">
                            <input type="file" name="image" class="form-control form-control-sm mb-1" accept="image/*">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </form>
                        <form action="{{ route('admin.industries-content.industry.delete', $industry) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this industry?')">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Why Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Why Innovior Section</h3>
        <form action="{{ route('admin.industries-content.update-why') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $why->heading ?? 'Why Innovior for Your Industry?' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" required>{{ $why->description ?? 'We don\'t just write code. We understand the specific regulatory and operational demands of your sector.' }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Image</label>
                    @if($why && $why->image)
                        <div><img src="{{ asset('storage/' . $why->image) }}" style="max-width:200px;margin-bottom:10px;"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Why Section</button>
        </form>

        <!-- Why Items -->
        <h5 style="margin:20px 0 10px 0;">Why Items</h5>
        <form action="{{ route('admin.industries-content.why-item.store') }}" method="POST" style="border:1px solid #dee2e6;padding:15px;border-radius:5px;margin-bottom:15px;">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-2">
                    <input type="text" name="heading" class="form-control" placeholder="Enterprise Security" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="description" class="form-control" placeholder="Built-in compliance..." required>
                </div>
                <div class="col-md-1 mb-2">
                    <input type="number" name="order" class="form-control" placeholder="Order" value="0" required>
                </div>
                <div class="col-md-1 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
            </div>
        </form>

        <ul style="margin:0;padding-left:20px;">
            @foreach($whyItems as $item)
            <li style="margin-bottom:8px;">
                <strong>{{ $item->heading }}:</strong> {{ $item->description }} (Order: {{ $item->order }})
                <form action="{{ route('admin.industries-content.why-item.delete', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" style="padding:2px 8px;font-size:11px;" onclick="return confirm('Delete this item?')">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- CTA Section -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Call to Action Section</h3>
        <form action="{{ route('admin.industries-content.update-cta') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Innovate Within Your Sector' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? 'Discuss your industry-specific challenges with our consultants today.' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Schedule a Consultation' }}" required>
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
