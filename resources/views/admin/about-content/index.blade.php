@extends('layouts.admin')

@section('title', 'About Content Management - Admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">About Content Management</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hero Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-content.update-hero') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $hero->subtitle ?? 'Our Story' }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'About Innovior' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2">{{ $hero->description ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Hero</button>
            </form>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Overview Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-content.update-overview') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $overview->heading ?? 'Who We Are' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $overview->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $overview->button_text ?? 'Work With Us' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $overview->button_link ?? '#contact' }}" required>
                    </div>
                </div>

                <h6 class="mt-3 mb-3">Statistics</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 1 Number</label>
                        <input type="text" name="stat1_number" class="form-control" value="{{ $overview->stat1_number ?? '100+' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 1 Label</label>
                        <input type="text" name="stat1_label" class="form-control" value="{{ $overview->stat1_label ?? 'Projects Delivered' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 2 Number</label>
                        <input type="text" name="stat2_number" class="form-control" value="{{ $overview->stat2_number ?? '50+' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 2 Label</label>
                        <input type="text" name="stat2_label" class="form-control" value="{{ $overview->stat2_label ?? 'Happy Clients' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 3 Number</label>
                        <input type="text" name="stat3_number" class="form-control" value="{{ $overview->stat3_number ?? '15+' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 3 Label</label>
                        <input type="text" name="stat3_label" class="form-control" value="{{ $overview->stat3_label ?? 'Team Members' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 4 Number</label>
                        <input type="text" name="stat4_number" class="form-control" value="{{ $overview->stat4_number ?? '5+' }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Stat 4 Label</label>
                        <input type="text" name="stat4_label" class="form-control" value="{{ $overview->stat4_label ?? 'Years Experience' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Overview</button>
            </form>
        </div>
    </div>

    <!-- Mission, Vision, Values Section -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Mission, Vision & Values</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-content.update-mvv') }}" method="POST">
                @csrf
                <h6 class="mb-3">Mission</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="mission_title" class="form-control" value="{{ $mvv->mission_title ?? 'Our Mission' }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Icon (Font Awesome class)</label>
                        <input type="text" name="mission_icon" class="form-control" value="{{ $mvv->mission_icon ?? 'fas fa-bullseye' }}" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label">Description</label>
                        <textarea name="mission_description" class="form-control" rows="2">{{ $mvv->mission_description ?? '' }}</textarea>
                    </div>
                </div>

                <h6 class="mb-3">Vision</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="vision_title" class="form-control" value="{{ $mvv->vision_title ?? 'Our Vision' }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Icon (Font Awesome class)</label>
                        <input type="text" name="vision_icon" class="form-control" value="{{ $mvv->vision_icon ?? 'fas fa-eye' }}" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label">Description</label>
                        <textarea name="vision_description" class="form-control" rows="2">{{ $mvv->vision_description ?? '' }}</textarea>
                    </div>
                </div>

                <h6 class="mb-3">Values</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="values_title" class="form-control" value="{{ $mvv->values_title ?? 'Our Values' }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Icon (Font Awesome class)</label>
                        <input type="text" name="values_icon" class="form-control" value="{{ $mvv->values_icon ?? 'fas fa-heart' }}" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label">Description</label>
                        <textarea name="values_description" class="form-control" rows="2">{{ $mvv->values_description ?? '' }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Update MVV</button>
            </form>
        </div>
    </div>

    <!-- Why Choose Section -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Why Choose Innovior</h5>
        </div>
        <div class="card-body">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-why') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $why->heading ?? 'Why Choose Innovior' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $why->subtitle ?? 'We bring more than just code to the table.' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Update Section Heading</button>
            </form>

            <!-- Why Items List -->
            <h6 class="mb-3">Why Items</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($whyItems as $item)
                            <tr>
                                <td><i class="{{ $item->icon }}"></i> {{ $item->icon }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>{{ $item->order }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editWhyItem{{ $item->id }}">Edit</button>
                                    <form action="{{ route('admin.about-content.why-item.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editWhyItem{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.about-content.why-item.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Why Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Icon</label>
                                                    <input type="text" name="icon" class="form-control" value="{{ $item->icon }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Order</label>
                                                    <input type="number" name="order" class="form-control" value="{{ $item->order }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No why items found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Why Item -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addWhyItem">Add New Why Item</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addWhyItem" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.about-content.why-item.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Why Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Icon (Font Awesome class)</label>
                                    <input type="text" name="icon" class="form-control" value="fas fa-check" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Culture Section -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Team & Culture</h5>
        </div>
        <div class="card-body">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-culture') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $culture->heading ?? 'Our Team & Culture' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $culture->description ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Update Culture Section</button>
            </form>

            <!-- Culture Highlights -->
            <h6 class="mb-3">Culture Highlights</h6>
            <div class="mb-3">
                @forelse($cultureHighlights as $highlight)
                    <span class="badge bg-primary me-2 mb-2" style="font-size: 14px;">
                        {{ $highlight->title }}
                        <form action="{{ route('admin.about-content.culture-highlight.delete', $highlight->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-close btn-close-white" style="font-size: 10px;" onclick="return confirm('Delete this highlight?')"></button>
                        </form>
                    </span>
                @empty
                    <p class="text-muted">No highlights added</p>
                @endforelse
            </div>

            <!-- Add Highlight -->
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addCultureHighlight">Add Highlight</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addCultureHighlight" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form action="{{ route('admin.about-content.culture-highlight.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Culture Highlight</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offices Section -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Our Offices</h5>
        </div>
        <div class="card-body">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-offices') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $offices->heading ?? 'Our Presence' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $offices->subtitle ?? 'Connecting with clients locally and globally.' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Update Section Heading</button>
            </form>

            <!-- Office Locations List -->
            <h6 class="mb-3">Office Locations</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($officeLocations as $location)
                            <tr>
                                <td><i class="{{ $location->icon }}"></i></td>
                                <td>{{ $location->title }}</td>
                                <td>{{ $location->role }}</td>
                                <td>{{ $location->address }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editOfficeLocation{{ $location->id }}">Edit</button>
                                    <form action="{{ route('admin.about-content.office-location.delete', $location->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editOfficeLocation{{ $location->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.about-content.office-location.update', $location->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Office Location</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Icon</label>
                                                        <input type="text" name="icon" class="form-control" value="{{ $location->icon }}" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $location->title }}" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Role</label>
                                                        <input type="text" name="role" class="form-control" value="{{ $location->role }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" class="form-control" value="{{ $location->address }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" rows="2">{{ $location->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Contact 1 Icon</label>
                                                        <input type="text" name="contact1_icon" class="form-control" value="{{ $location->contact1_icon }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Contact 1 Text</label>
                                                        <input type="text" name="contact1_text" class="form-control" value="{{ $location->contact1_text }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Contact 2 Icon</label>
                                                        <input type="text" name="contact2_icon" class="form-control" value="{{ $location->contact2_icon }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Contact 2 Text</label>
                                                        <input type="text" name="contact2_text" class="form-control" value="{{ $location->contact2_text }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Order</label>
                                                        <input type="number" name="order" class="form-control" value="{{ $location->order }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No office locations found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Office Location -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addOfficeLocation">Add New Office Location</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addOfficeLocation" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('admin.about-content.office-location.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Office Location</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Icon (Font Awesome class)</label>
                                        <input type="text" name="icon" class="form-control" value="fas fa-map-marker-alt" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Role</label>
                                        <input type="text" name="role" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact 1 Icon</label>
                                        <input type="text" name="contact1_icon" class="form-control" placeholder="fas fa-envelope">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact 1 Text</label>
                                        <input type="text" name="contact1_text" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact 2 Icon</label>
                                        <input type="text" name="contact2_icon" class="form-control" placeholder="fas fa-phone">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact 2 Text</label>
                                        <input type="text" name="contact2_text" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Location</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Strategic Partners</h5>
        </div>
        <div class="card-body">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-partners') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $partners->heading ?? 'Strategic Partners' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $partners->subtitle ?? 'Collaborating with industry leaders to deliver world-class solutions.' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Section Heading</button>
            </form>

            <!-- Partner Items List -->
            <h6 class="mb-3">Partner Items</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partnerItems as $item)
                            <tr>
                                <td><i class="{{ $item->icon }}"></i></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>{{ $item->order }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPartnerItem{{ $item->id }}">Edit</button>
                                    <form action="{{ route('admin.about-content.partner-item.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editPartnerItem{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.about-content.partner-item.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Partner Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Icon</label>
                                                    <input type="text" name="icon" class="form-control" value="{{ $item->icon }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" rows="2">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Order</label>
                                                    <input type="number" name="order" class="form-control" value="{{ $item->order }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No partner items found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Partner Item -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addPartnerItem">Add New Partner</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addPartnerItem" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.about-content.partner-item.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Partner Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Icon (Font Awesome class)</label>
                                    <input type="text" name="icon" class="form-control" value="fas fa-handshake" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Partner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
