@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">Services Page Content</h1>
    
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

    <!-- Hero Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3H19C19.5523 3 20 3.44772 20 4V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4C4 3.44772 4.44772 3 5 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 11L20 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Hero Section
        </h3>
        <form action="{{ route('admin.services-content.update-hero') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Badge</label>
                    <input type="text" name="badge" class="form-control" value="{{ $hero->badge ?? 'Our Expertise' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'Digital Solutions for Modern Enterprises' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                <textarea name="description" class="form-control" rows="3" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $hero->description ?? 'We build intelligent, scalable, and secure systems that drive business growth and operational excellence.' }}</textarea>
            </div>
            
            <div style="margin-bottom:24px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:12px;font-size:14px;">Hero Image</label>
                @if($hero && $hero->hero_image)
                    <div style="background:#F7F9FF;padding:16px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;display:inline-block;">
                        <img src="{{ asset('storage/' . $hero->hero_image) }}" style="max-width:300px;border-radius:6px;border:1px solid #D1D9FF;">
                    </div>
                @endif
                <div style="position:relative;">
                    <input type="file" name="hero_image" class="form-control" accept="image/*" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="padding:12px 28px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Update Hero Section
            </button>
        </form>
    </div>

    <!-- Services -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Service Details
        </h3>
        
        <!-- Add New Service -->
        <form action="{{ route('admin.services-content.service.store') }}" method="POST" enctype="multipart/form-data" style="border:2px dashed #2A4A9D;padding:24px;border-radius:10px;margin-bottom:32px;background:#F7F9FF;">
            <h5 style="margin-top:0;margin-bottom:20px;color:#29499C;font-size:16px;font-weight:600;">Add New Service</h5>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:16px;margin-bottom:16px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Nav Title</label>
                    <input type="text" name="nav_title" class="form-control" placeholder="IT Consultancy" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Heading</label>
                    <input type="text" name="heading" class="form-control" placeholder="IT Consultancy" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Order</label>
                    <input type="number" name="order" class="form-control" value="0" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Active</label>
                    <div style="display:flex;align-items:center;height:44px;">
                        <input type="checkbox" name="is_active" value="1" checked style="width:20px;height:20px;accent-color:#29499C;">
                    </div>
                </div>
            </div>
            <div style="margin-bottom:16px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Description</label>
                <textarea name="description" class="form-control" rows="2" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="padding:10px 24px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add Service
            </button>
        </form>

        <!-- Existing Services -->
        @foreach($services as $service)
        <div style="background:#F9FAFF;border:1px solid #E8EDFF;padding:24px;border-radius:10px;margin-bottom:20px;transition:all 0.3s;" onmouseover="this.style.borderColor='#29499C';this.style.boxShadow='0 4px 12px rgba(41, 73, 156, 0.08)'" onmouseout="this.style.borderColor='#E8EDFF';this.style.boxShadow='none'">
            <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid #E8EDFF;">
                <div>
                    <h5 style="margin:0 0 8px 0;color:#29499C;font-size:18px;font-weight:600;">{{ $service->heading }}</h5>
                    <div style="display:flex;gap:16px;align-items:center;">
                        <div style="color:#5A6C9D;font-size:13px;background:#FFFFFF;padding:4px 12px;border-radius:6px;border:1px solid #E8EDFF;">
                            Slug: {{ $service->slug }}
                        </div>
                        <div style="color:#5A6C9D;font-size:13px;background:#FFFFFF;padding:4px 12px;border-radius:6px;border:1px solid #E8EDFF;">
                            Order: {{ $service->order }}
                        </div>
                    </div>
                </div>
                <div>
                    @if($service->is_active)
                        <span style="padding:6px 16px;background:#E8F5E9;color:#2E7D32;border-radius:20px;font-size:13px;font-weight:600;display:inline-flex;align-items:center;gap:6px;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#2E7D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Active
                        </span>
                    @else
                        <span style="padding:6px 16px;background:#F5F5F5;color:#757575;border-radius:20px;font-size:13px;font-weight:600;display:inline-flex;align-items:center;gap:6px;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 6L6 18M6 6L18 18" stroke="#757575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Inactive
                        </span>
                    @endif
                </div>
            </div>
            
            <form action="{{ route('admin.services-content.service.update', $service) }}" method="POST" enctype="multipart/form-data" style="margin-bottom:24px;">
                @csrf
                @method('PUT')
                <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;margin-bottom:16px;">
                    <div>
                        <input type="text" name="nav_title" class="form-control form-control-sm" value="{{ $service->nav_title }}" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                    </div>
                    <div>
                        <input type="text" name="heading" class="form-control form-control-sm" value="{{ $service->heading }}" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                    </div>
                    <div>
                        <input type="number" name="order" class="form-control form-control-sm" value="{{ $service->order }}" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                    </div>
                    <div style="display:flex;align-items:center;">
                        <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} style="width:20px;height:20px;accent-color:#29499C;">
                        <span style="margin-left:8px;color:#29499C;font-size:13px;font-weight:500;">Active</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-success w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Update</button>
                    </div>
                </div>
                <div style="margin-bottom:16px;">
                    <textarea name="description" class="form-control form-control-sm" rows="2" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;">{{ $service->description }}</textarea>
                </div>
                <div style="display:flex;gap:20px;align-items:flex-start;">
                    <div style="flex:1;">
                        <div style="background:#FFFFFF;padding:12px;border-radius:8px;border:1px solid #E8EDFF;display:inline-block;">
                            <img src="{{ asset('storage/' . $service->image) }}" style="max-width:150px;border-radius:4px;border:1px solid #D1D9FF;">
                        </div>
                    </div>
                    <div style="flex:2;">
                        <label style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Update Image</label>
                        <input type="file" name="image" class="form-control form-control-sm" accept="image/*" style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                        <small style="color:#5A6C9D;font-size:12px;display:block;margin-top:6px;">Leave empty to keep current image</small>
                    </div>
                </div>
            </form>
            
            <!-- Features for this service -->
            <div style="background:#FFFFFF;padding:20px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;">
                <h6 style="margin:0 0 16px 0;color:#29499C;font-size:15px;font-weight:600;display:flex;align-items:center;gap:8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M7.2 21H16.8C17.9201 21 18.4802 21 18.908 20.782C19.2843 20.5903 19.5903 20.2843 19.782 19.908C20 19.4802 20 18.9201 20 17.8V6.2C20 5.0799 20 4.51984 19.782 4.09202C19.5903 3.71569 19.2843 3.40973 18.908 3.21799C18.4802 3 17.9201 3 16.8 3H7.2C6.0799 3 5.51984 3 5.09202 3.21799C4.71569 3.40973 4.40973 3.71569 4.21799 4.09202C4 4.51984 4 5.07989 4 6.2V17.8C4 18.9201 4 19.4802 4.21799 19.908C4.40973 20.2843 4.71569 20.5903 5.09202 20.782C5.51984 21 6.07989 21 7.2 21Z" stroke="#29499C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Features
                </h6>
                <form action="{{ route('admin.services-content.feature.store') }}" method="POST" style="margin-bottom:16px;">
                    @csrf
                    <input type="hidden" name="service_detail_id" value="{{ $service->id }}">
                    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;">
                        <div style="grid-column:span 2;">
                            <input type="text" name="feature_text" class="form-control form-control-sm" placeholder="Feature text" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                        </div>
                        <div>
                            <input type="number" name="order" class="form-control form-control-sm" placeholder="Order" value="0" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add Feature</button>
                        </div>
                    </div>
                </form>
                
                <ul style="margin:0;padding-left:0;list-style:none;">
                    @foreach($service->features->sortBy('order') as $feature)
                    <li style="margin-bottom:8px;padding:10px 12px;background:#F7F9FF;border-radius:6px;border-left:3px solid #2A4A9D;display:flex;justify-content:space-between;align-items:center;">
                        <div>
                            <span style="color:#29499C;font-weight:500;">{{ $feature->feature_text }}</span>
                            <span style="color:#5A6C9D;font-size:12px;margin-left:12px;background:#FFFFFF;padding:2px 8px;border-radius:4px;border:1px solid #E8EDFF;">
                                Order: {{ $feature->order }}
                            </span>
                        </div>
                        <form action="{{ route('admin.services-content.feature.delete', $feature) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="padding:4px 12px;background:#DC3545;color:white;border:none;border-radius:4px;font-weight:500;font-size:12px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'" onclick="return confirm('Delete this feature?')">Delete</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <form action="{{ route('admin.services-content.service.delete', $service) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" style="padding:8px 20px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'" onclick="return confirm('Delete this entire service?')">Delete Service</button>
            </form>
        </div>
        @endforeach
    </div>

    <!-- CTA Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.73 21C13.5542 21.3031 13.3018 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Call to Action Section
        </h3>
        <form action="{{ route('admin.services-content.update-cta') }}" method="POST">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:20px;margin-bottom:24px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Ready to Transform Your Business?' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? 'Let\'s discuss how Innovior can build the perfect solution for you.' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Get a Free Consultation' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $cta->button_link ?? '/contact' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="padding:12px 28px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Update CTA Section
            </button>
        </form>
    </div>
</div>
@endsection