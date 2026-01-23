@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h2 style="margin-bottom:30px;font-size:28px;font-weight:600;">Admin Dashboard</h2>
    
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:20px;margin-bottom:40px;">
        <!-- Sliders Card -->
        <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            <h3 style="margin-top:0;font-size:18px;font-weight:600;">🎨 Home Sliders</h3>
            <p style="color:#666;font-size:14px;margin-bottom:20px;">Manage hero slider on home page</p>
            <div style="display:flex;gap:10px;margin-bottom:15px;">
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary btn-sm" style="flex:1;text-align:center;padding:8px 16px;">Manage Sliders</a>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-success btn-sm" style="flex:1;text-align:center;padding:8px 16px;">Add New</a>
            </div>
            <p style="margin:0;font-size:13px;color:#999;padding-top:10px;border-top:1px solid #eee;">Total: {{ \App\Models\Slider::count() }}</p>
        </div>

        <!-- Pages Card -->
        <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            <h3 style="margin-top:0;font-size:18px;font-weight:600;">📄 Pages</h3>
            <p style="color:#666;font-size:14px;margin-bottom:20px;">Manage website pages content</p>
            <div style="display:flex;gap:10px;margin-bottom:15px;">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-primary btn-sm" style="flex:1;text-align:center;padding:8px 16px;">Manage Pages</a>
                <a href="{{ route('admin.pages.create') }}" class="btn btn-success btn-sm" style="flex:1;text-align:center;padding:8px 16px;">Add New</a>
            </div>
            <p style="margin:0;font-size:13px;color:#999;padding-top:10px;border-top:1px solid #eee;">Total: {{ \App\Models\Page::count() }}</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:18px;font-weight:600;">Recent Sliders</h3>
        <div style="overflow-x:auto;">
            <table class="table" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8f9fa;">
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Title</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Status</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Order</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Slider::orderBy('order')->limit(5)->get() as $slider)
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td style="padding:12px;">{{ $slider->title }}</td>
                            <td style="padding:12px;"><span style="color:{{ $slider->is_active ? '#28a745' : '#dc3545' }};font-weight:500;">{{ $slider->is_active ? 'Active' : 'Inactive' }}</span></td>
                            <td style="padding:12px;">{{ $slider->order }}</td>
                            <td style="padding:12px;">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-warning" style="padding:6px 12px;">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="padding:20px;text-align:center;color:#999;">No sliders yet. <a href="{{ route('admin.sliders.create') }}" style="color:#007bff;">Create one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:18px;font-weight:600;">Recent Pages</h3>
        <div style="overflow-x:auto;">
            <table class="table" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8f9fa;">
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Title</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Slug</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Updated</th>
                        <th style="padding:12px;text-align:left;border-bottom:2px solid #dee2e6;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Page::latest()->limit(5)->get() as $page)
                        <tr style="border-bottom:1px solid #dee2e6;">
                            <td style="padding:12px;">{{ $page->title }}</td>
                            <td style="padding:12px;">{{ $page->slug }}</td>
                            <td style="padding:12px;">{{ $page->updated_at->diffForHumans() }}</td>
                            <td style="padding:12px;">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning" style="padding:6px 12px;">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="padding:20px;text-align:center;color:#999;">No pages yet. <a href="{{ route('admin.pages.create') }}" style="color:#007bff;">Create one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
