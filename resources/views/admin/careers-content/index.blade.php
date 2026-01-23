@extends('layouts.admin')

@section('title', 'Careers Content Management')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Careers Page Content Management</h1>

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
            <form action="{{ route('admin.careers-content.update-hero') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{ $hero->tag ?? 'Careers at Innovior' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $hero->description ?? '' }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $hero->button_text ?? 'Explore Opportunities' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $hero->button_link ?? '#openings' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Hero</button>
            </form>
        </div>
    </div>

    <!-- Culture Section -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Company Culture Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.careers-content.update-culture') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $culture->heading ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $culture->description ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-info">Update Culture Section</button>
            </form>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Culture Cards</h6>
                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addCultureCardModal">
                    + Add Card
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cultureCards as $card)
                        <tr>
                            <td>{{ $card->title }}</td>
                            <td>{{ Str::limit($card->description, 50) }}</td>
                            <td>{{ $card->order }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editCultureCard({{ json_encode($card) }})">Edit</button>
                                <form action="{{ route('admin.careers-content.culture-card.delete', $card->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this card?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No culture cards found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Job Openings -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Current Job Openings</h5>
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addOpeningModal">
                + Add Job Opening
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Job Type</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($openings as $opening)
                        <tr>
                            <td>{{ $opening->title }}</td>
                            <td><span class="badge bg-secondary">{{ $opening->job_type }}</span></td>
                            <td>{{ $opening->location }}</td>
                            <td>
                                <span class="badge bg-{{ $opening->is_active ? 'success' : 'secondary' }}">
                                    {{ $opening->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $opening->order }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editOpening({{ json_encode($opening) }})">Edit</button>
                                <form action="{{ route('admin.careers-content.opening.delete', $opening->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this opening?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No job openings found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Why Join Section -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Why Join Innovior Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.careers-content.update-why-section') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $whySection->heading ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update Why Join Section</button>
            </form>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Why Join Items</h6>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addWhyItemModal">
                    + Add Item
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($whyItems as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->description, 50) }}</td>
                            <td>{{ $item->order }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editWhyItem({{ json_encode($item) }})">Edit</button>
                                <form action="{{ route('admin.careers-content.why-item.delete', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No why join items found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Hiring Process -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Hiring Process Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.careers-content.update-process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $process->heading ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-dark">Update Process Section</button>
            </form>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Process Steps</h6>
                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#addProcessStepModal">
                    + Add Step
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($processSteps as $step)
                        <tr>
                            <td>{{ $step->title }}</td>
                            <td>{{ $step->order }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editProcessStep({{ json_encode($step) }})">Edit</button>
                                <form action="{{ route('admin.careers-content.process-step.delete', $step->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this step?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No process steps found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">CTA Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.careers-content.update-cta') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" required>{{ $cta->description ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $cta->email ?? '' }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $cta->button_link ?? '' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update CTA</button>
            </form>
        </div>
    </div>
</div>

<!-- Add Culture Card Modal -->
<div class="modal fade" id="addCultureCardModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.careers-content.culture-card.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Culture Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Card</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Culture Card Modal -->
<div class="modal fade" id="editCultureCardModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCultureCardForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Culture Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="editCultureCardTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="editCultureCardDescription" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" id="editCultureCardOrder" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Card</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Opening Modal -->
<div class="modal fade" id="addOpeningModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.careers-content.opening.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Job Opening</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Type</label>
                            <select name="job_type" class="form-select" required>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <select name="location" class="form-select" required>
                                <option value="On-site">On-site</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_active" class="form-check-input" id="addOpeningActive" checked>
                                <label class="form-check-label" for="addOpeningActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Opening</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Opening Modal -->
<div class="modal fade" id="editOpeningModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editOpeningForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Job Opening</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="title" id="editOpeningTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="editOpeningDescription" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Type</label>
                            <select name="job_type" id="editOpeningJobType" class="form-select" required>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <select name="location" id="editOpeningLocation" class="form-select" required>
                                <option value="On-site">On-site</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="editOpeningOrder" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_active" class="form-check-input" id="editOpeningActive">
                                <label class="form-check-label" for="editOpeningActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Opening</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Why Item Modal -->
<div class="modal fade" id="addWhyItemModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.careers-content.why-item.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Why Join Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Why Item Modal -->
<div class="modal fade" id="editWhyItemModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editWhyItemForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Why Join Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="editWhyItemTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="editWhyItemDescription" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" id="editWhyItemOrder" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Process Step Modal -->
<div class="modal fade" id="addProcessStepModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.careers-content.process-step.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Process Step</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Step</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Process Step Modal -->
<div class="modal fade" id="editProcessStepModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProcessStepForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Process Step</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="editProcessStepTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" id="editProcessStepOrder" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Step</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCultureCard(card) {
    document.getElementById('editCultureCardForm').action = '/admin/careers-content/culture-card/' + card.id;
    document.getElementById('editCultureCardTitle').value = card.title;
    document.getElementById('editCultureCardDescription').value = card.description;
    document.getElementById('editCultureCardOrder').value = card.order;
    new bootstrap.Modal(document.getElementById('editCultureCardModal')).show();
}

function editOpening(opening) {
    document.getElementById('editOpeningForm').action = '/admin/careers-content/opening/' + opening.id;
    document.getElementById('editOpeningTitle').value = opening.title;
    document.getElementById('editOpeningDescription').value = opening.description;
    document.getElementById('editOpeningJobType').value = opening.job_type;
    document.getElementById('editOpeningLocation').value = opening.location;
    document.getElementById('editOpeningOrder').value = opening.order;
    document.getElementById('editOpeningActive').checked = opening.is_active;
    new bootstrap.Modal(document.getElementById('editOpeningModal')).show();
}

function editWhyItem(item) {
    document.getElementById('editWhyItemForm').action = '/admin/careers-content/why-item/' + item.id;
    document.getElementById('editWhyItemTitle').value = item.title;
    document.getElementById('editWhyItemDescription').value = item.description;
    document.getElementById('editWhyItemOrder').value = item.order;
    new bootstrap.Modal(document.getElementById('editWhyItemModal')).show();
}

function editProcessStep(step) {
    document.getElementById('editProcessStepForm').action = '/admin/careers-content/process-step/' + step.id;
    document.getElementById('editProcessStepTitle').value = step.title;
    document.getElementById('editProcessStepOrder').value = step.order;
    new bootstrap.Modal(document.getElementById('editProcessStepModal')).show();
}
</script>
@endsection
