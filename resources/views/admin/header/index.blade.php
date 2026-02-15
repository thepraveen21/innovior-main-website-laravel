@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">Header & Logo Management</h1>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:16px;background:#E8F5E9;color:#2E7D32;border:1px solid #C8E6C9;border-radius:8px;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
            <div style="width:24px;height:24px;background:#4CAF50;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="padding:16px;background:#FFEBEE;color:#C62828;border:1px solid #FFCDD2;border-radius:8px;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
            <div style="width:24px;height:24px;background:#F44336;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8V12M12 16H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <strong style="font-weight:600;">Please fix the following errors:</strong>
                <ul style="margin:8px 0 0 0;padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Logo Settings -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 16L8.586 11.414C8.96106 11.0391 9.46967 10.8284 10 10.8284C10.5303 10.8284 11.0389 11.0391 11.414 11.414L16 16M14 14L15.586 12.414C15.9611 12.0391 16.4697 11.8284 17 11.8284C17.5303 11.8284 18.0389 12.0391 18.414 12.414L20 14M14 8H14.01M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Logo Settings
        </h3>
        
        <form action="{{ route('admin.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="background:#F7F9FF;padding:24px;border-radius:10px;border:1px dashed #2A4A9D;margin-bottom:24px;">
                <div style="color:#29499C;font-weight:600;margin-bottom:12px;font-size:15px;">Current Logo Preview</div>
                <div style="display:flex;align-items:center;gap:24px;">
                    <div style="flex-shrink:0;">
                        <div style="width:200px;height:100px;background:#FFFFFF;border-radius:8px;border:1px solid #E8EDFF;display:flex;align-items:center;justify-content:center;padding:16px;">
                            @if($header && $header->logo)
                                <img src="{{ asset('storage/' . $header->logo) }}" style="max-height:100%;max-width:100%;object-fit:contain;">
                            @else
                                <img src="{{ asset('images/logo.jpg') }}" style="max-height:100%;max-width:100%;object-fit:contain;">
                            @endif
                        </div>
                    </div>
                    <div>
                        @if($header && $header->logo)
                            <div style="color:#5A6C9D;font-size:14px;margin-bottom:8px;">Custom logo is currently set</div>
                            <div style="color:#2E7D32;font-size:13px;background:#E8F5E9;padding:6px 12px;border-radius:6px;display:inline-block;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" style="vertical-align:text-bottom;margin-right:6px;">
                                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#2E7D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Custom Logo Active
                            </div>
                        @else
                            <div style="color:#5A6C9D;font-size:14px;margin-bottom:8px;">Default logo is currently in use</div>
                            <div style="color:#F57C00;font-size:13px;background:#FFF3E0;padding:6px 12px;border-radius:6px;display:inline-block;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" style="vertical-align:text-bottom;margin-right:6px;">
                                    <path d="M12 8V12M12 16H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#F57C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Using Default Logo
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:15px;">Upload New Logo</label>
                <div style="position:relative;">
                    <input type="file" name="logo" class="form-control" accept="image/*" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    <small style="color:#5A6C9D;display:block;margin-top:8px;font-size:13px;">Recommended size: 200x60px. Max file size: 2MB. Supported formats: PNG, JPG, SVG</small>
                </div>
            </div>

            <div style="margin-bottom:32px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:15px;">Logo Alt Text</label>
                <input type="text" name="logo_alt_text" class="form-control" value="{{ $header->logo_alt_text ?? 'Innovior Logo' }}" placeholder="Innovior Logo" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                <small style="color:#5A6C9D;display:block;margin-top:8px;font-size:13px;">Text displayed when logo image fails to load (important for accessibility)</small>
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;border-top:1px solid #E8EDFF;padding-top:24px;">
                <div style="color:#5A6C9D;font-size:14px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="vertical-align:text-bottom;margin-right:8px;color:#29499C;">
                        <path d="M12 15V12M12 9H12.01M7.2 21H16.8C17.9201 21 18.4802 21 18.908 20.782C19.2843 20.5903 19.5903 20.2843 19.782 19.908C20 19.4802 20 18.9201 20 17.8V6.2C20 5.0799 20 4.51984 19.782 4.09202C19.5903 3.71569 19.2843 3.40973 18.908 3.21799C18.4802 3 17.9201 3 16.8 3H7.2C6.0799 3 5.51984 3 5.09202 3.21799C4.71569 3.40973 4.40973 3.71569 4.21799 4.09202C4 4.51984 4 5.07989 4 6.2V17.8C4 18.9201 4 19.4802 4.21799 19.908C4.40973 20.2843 4.71569 20.5903 5.09202 20.782C5.51984 21 6.07989 21 7.2 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Changes take effect immediately after saving
                </div>
                <button type="submit" class="btn btn-success" style="padding:12px 28px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.3503 17.623 3.8507 18.1676 4.55231C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89317 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Header Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Information Box -->
    <div style="background:#F7F9FF;border-left:4px solid #2A4A9D;padding:20px;border-radius:10px;">
        <div style="display:flex;align-items:flex-start;gap:12px;">
            <div style="flex-shrink:0;width:36px;height:36px;background:#2A4A9D;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 16V12M12 8H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <h4 style="margin-top:0;margin-bottom:12px;color:#29499C;font-weight:600;font-size:16px;">Tips & Best Practices</h4>
                <ul style="margin:0;padding-left:20px;color:#5A6C9D;">
                    <li style="margin-bottom:6px;padding-left:4px;">Use a PNG or SVG file for a transparent background</li>
                    <li style="margin-bottom:6px;padding-left:4px;">Keep the logo file size small for fast loading (under 100KB recommended)</li>
                    <li style="margin-bottom:6px;padding-left:4px;">Optimal dimensions: 200x60px (width x height)</li>
                    <li style="padding-left:4px;">The logo will be displayed in the header on all website pages</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection