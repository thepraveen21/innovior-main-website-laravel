@extends('layouts.admin')

@section('title', 'Works Content Management - Admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Works Content Management</h1>

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
            <form action="{{ route('admin.works-content.update-hero') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'Our Works' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2">{{ $hero->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Background Image</label>
                        <input type="file" name="background_image" class="form-control" accept="image/*">
                        @if($hero->background_image)
                            <small class="text-muted">Current: {{ basename($hero->background_image) }}</small>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Hero</button>
            </form>
        </div>
    </div>

    <!-- Project Categories -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Project Categories (Filters)</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->order }}</td>
                                <td><span class="badge bg-{{ $category->is_active ? 'success' : 'secondary' }}">{{ $category->is_active ? 'Yes' : 'No' }}</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}">Edit</button>
                                    <form action="{{ route('admin.works-content.category.delete', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.works-content.category.update', $category->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Slug</label>
                                                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
                                                    <small class="text-muted">Leave blank to auto-generate</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Order</label>
                                                    <input type="number" name="order" class="form-control" value="{{ $category->order }}">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" name="is_active" class="form-check-input" id="editActive{{ $category->id }}" {{ $category->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="editActive{{ $category->id }}">Active</label>
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
                                <td colspan="5" class="text-center">No categories found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addCategory">Add New Category</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addCategory" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.works-content.category.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                    <small class="text-muted">Leave blank to auto-generate</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" class="form-control" value="0">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="addActive" checked>
                                    <label class="form-check-label" for="addActive">Active</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Projects</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Duration</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 60px; height: 40px; object-fit: cover;">
                                    @endif
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->category->name ?? 'N/A' }}</td>
                                <td>{{ $project->client }}</td>
                                <td>{{ $project->duration }}</td>
                                <td><span class="badge bg-{{ $project->is_active ? 'success' : 'secondary' }}">{{ $project->is_active ? 'Yes' : 'No' }}</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProject{{ $project->id }}">Edit</button>
                                    <form action="{{ route('admin.works-content.project.delete', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this project?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editProject{{ $project->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.works-content.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select name="category_id" class="form-control" required>
                                                            @foreach($categories as $cat)
                                                                <option value="{{ $cat->id }}" {{ $project->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $project->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" name="image" class="form-control" accept="image/*">
                                                        @if($project->image)
                                                            <small class="text-muted">Current: {{ basename($project->image) }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Client</label>
                                                        <input type="text" name="client" class="form-control" value="{{ $project->client }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Duration</label>
                                                        <input type="text" name="duration" class="form-control" value="{{ $project->duration }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Link</label>
                                                        <input type="text" name="link" class="form-control" value="{{ $project->link }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Order</label>
                                                        <input type="number" name="order" class="form-control" value="{{ $project->order }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3 form-check">
                                                        <input type="checkbox" name="is_active" class="form-check-input" id="editProjectActive{{ $project->id }}" {{ $project->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="editProjectActive{{ $project->id }}">Active</label>
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
                                <td colspan="7" class="text-center">No projects found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addProject">Add New Project</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addProject" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('admin.works-content.project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Client</label>
                                        <input type="text" name="client" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Duration</label>
                                        <input type="text" name="duration" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="link" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control" value="0">
                                    </div>
                                    <div class="col-md-6 mb-3 form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" id="addProjectActive" checked>
                                        <label class="form-check-label" for="addProjectActive">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Statistics Section</h5>
        </div>
        <div class="card-body">
            <!-- Section Header -->
            <form action="{{ route('admin.works-content.update-stats') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Section Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $stats->heading ?? 'Our Impact' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Heading</button>
            </form>

            <!-- Stat Items -->
            <h6 class="mb-3">Stat Items</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Color</th>
                            <th>Number</th>
                            <th>Label</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statItems as $item)
                            <tr>
                                <td><span class="badge bg-{{ $item->color }}">{{ $item->color }}</span></td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->label }}</td>
                                <td>{{ $item->order }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStatItem{{ $item->id }}">Edit</button>
                                    <form action="{{ route('admin.works-content.stat-item.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editStatItem{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.works-content.stat-item.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Stat Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Color</label>
                                                    <select name="color" class="form-control" required>
                                                        <option value="blue" {{ $item->color == 'blue' ? 'selected' : '' }}>Blue</option>
                                                        <option value="purple" {{ $item->color == 'purple' ? 'selected' : '' }}>Purple</option>
                                                        <option value="red" {{ $item->color == 'red' ? 'selected' : '' }}>Red</option>
                                                        <option value="green" {{ $item->color == 'green' ? 'selected' : '' }}>Green</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" name="number" class="form-control" value="{{ $item->number }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Label</label>
                                                    <input type="text" name="label" class="form-control" value="{{ $item->label }}" required>
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
                                <td colspan="5" class="text-center">No stat items found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addStatItem">Add Stat Item</button>

            <!-- Add Modal -->
            <div class="modal fade" id="addStatItem" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.works-content.stat-item.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Stat Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <select name="color" class="form-control" required>
                                        <option value="blue">Blue</option>
                                        <option value="purple">Purple</option>
                                        <option value="red">Red</option>
                                        <option value="green">Green</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Number</label>
                                    <input type="text" name="number" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Label</label>
                                    <input type="text" name="label" class="form-control" required>
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

    <!-- CTA Section -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Call-to-Action Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.works-content.update-cta') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Ready to Transform Your Business?' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2">{{ $cta->description ?? '' }}</textarea>
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
                <button type="submit" class="btn btn-dark">Update CTA</button>
            </form>
        </div>
    </div>

</div>
@endsection
