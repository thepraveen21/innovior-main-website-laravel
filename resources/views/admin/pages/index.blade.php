@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;">
        <h1 style="margin:0;font-size:28px;font-weight:600;">Pages</h1>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary" style="padding:10px 20px;">Create New Page</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:5px;margin-bottom:20px;">{{ session('success') }}</div>
    @endif
    
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <div style="overflow-x:auto;">
            <table class="table" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8f9fa;">
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Title</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Slug</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td style="padding:12px;font-weight:500;">{{ $page->title }}</td>
                            <td style="padding:12px;">{{ $page->slug }}</td>
                            <td style="padding:12px;">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning" style="padding:6px 12px;margin-right:5px;">Edit</a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="padding:6px 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" style="padding:20px;text-align:center;color:#999;">No pages yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
