@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;">
        <h1 style="margin:0;font-size:28px;font-weight:600;">Manage Home Sliders</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary" style="padding:10px 20px;">Add New Slider</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:5px;margin-bottom:20px;">{{ session('success') }}</div>
    @endif
    
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <div style="overflow-x:auto;">
            <table class="table" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8f9fa;">
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Order</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Title</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Description</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Status</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td style="padding:12px;">{{ $slider->order }}</td>
                            <td style="padding:12px;font-weight:500;">{{ $slider->title }}</td>
                            <td style="padding:12px;">{{ Str::limit($slider->description, 50) }}</td>
                            <td style="padding:12px;"><span style="color:{{ $slider->is_active ? '#28a745' : '#dc3545' }};font-weight:500;">{{ $slider->is_active ? 'Active' : 'Inactive' }}</span></td>
                            <td style="padding:12px;">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-warning" style="padding:6px 12px;margin-right:5px;">Edit</a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="padding:6px 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="padding:20px;text-align:center;color:#999;">No sliders yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
