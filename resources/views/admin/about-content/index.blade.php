@extends('layouts.admin')

@section('title', 'About Content Management - Admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4" style="color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">About Content Management</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background:#E8F5E9;color:#2E7D32;border:1px solid #C8E6C9;border-radius:8px;display:flex;align-items:center;gap:12px;">
            <div style="width:24px;height:24px;background:#4CAF50;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%232E7D32%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#29499C; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 3H19C19.5523 3 20 3.44772 20 4V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4C4 3.44772 4.44772 3 5 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 11L20 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Hero Section
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <form action="{{ route('admin.about-content.update-hero') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $hero->subtitle ?? 'Our Story' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'About Innovior' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $hero->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Hero Image</label>
                        @if($hero && $hero->hero_image)
                            <div style="background:#F7F9FF;padding:16px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;display:inline-block;">
                                <img src="{{ asset('storage/' . $hero->hero_image) }}" style="max-width:300px;border-radius:6px;border:1px solid #D1D9FF;">
                            </div>
                        @endif
                        <input type="file" name="hero_image" class="form-control" accept="image/*" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Hero
                </button>
            </form>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#2A4A9D; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 8V12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 16H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Overview Section
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <form action="{{ route('admin.about-content.update-overview') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $overview->heading ?? 'Who We Are' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="description" class="form-control" rows="4" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $overview->description ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $overview->button_text ?? 'Work With Us' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $overview->button_link ?? '#contact' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>

                <h6 class="mt-3 mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Statistics</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 1 Number</label>
                        <input type="text" name="stat1_number" class="form-control" value="{{ $overview->stat1_number ?? '100+' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 1 Label</label>
                        <input type="text" name="stat1_label" class="form-control" value="{{ $overview->stat1_label ?? 'Projects Delivered' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 2 Number</label>
                        <input type="text" name="stat2_number" class="form-control" value="{{ $overview->stat2_number ?? '50+' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 2 Label</label>
                        <input type="text" name="stat2_label" class="form-control" value="{{ $overview->stat2_label ?? 'Happy Clients' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 3 Number</label>
                        <input type="text" name="stat3_number" class="form-control" value="{{ $overview->stat3_number ?? '15+' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 3 Label</label>
                        <input type="text" name="stat3_label" class="form-control" value="{{ $overview->stat3_label ?? 'Team Members' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 4 Number</label>
                        <input type="text" name="stat4_number" class="form-control" value="{{ $overview->stat4_number ?? '5+' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Stat 4 Label</label>
                        <input type="text" name="stat4_label" class="form-control" value="{{ $overview->stat4_label ?? 'Years Experience' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Overview
                </button>
            </form>
        </div>
    </div>

    <!-- Mission, Vision, Values Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#29499C; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Mission, Vision & Values
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <form action="{{ route('admin.about-content.update-mvv') }}" method="POST">
                @csrf
                <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Mission</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                        <input type="text" name="mission_title" class="form-control" value="{{ $mvv->mission_title ?? 'Our Mission' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                        <input type="text" name="mission_icon" class="form-control" value="{{ $mvv->mission_icon ?? 'fas fa-bullseye' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="mission_description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $mvv->mission_description ?? '' }}</textarea>
                    </div>
                </div>

                <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Vision</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                        <input type="text" name="vision_title" class="form-control" value="{{ $mvv->vision_title ?? 'Our Vision' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                        <input type="text" name="vision_icon" class="form-control" value="{{ $mvv->vision_icon ?? 'fas fa-eye' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="vision_description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $mvv->vision_description ?? '' }}</textarea>
                    </div>
                </div>

                <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Values</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                        <input type="text" name="values_title" class="form-control" value="{{ $mvv->values_title ?? 'Our Values' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                        <input type="text" name="values_icon" class="form-control" value="{{ $mvv->values_icon ?? 'fas fa-heart' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="values_description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $mvv->values_description ?? '' }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-info" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update MVV
                </button>
            </form>
        </div>
    </div>

    <!-- Why Choose Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#2A4A9D; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Why Choose Innovior
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-why') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $why->heading ?? 'Why Choose Innovior' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $why->subtitle ?? 'We bring more than just code to the table.' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>
                <button type="submit" class="btn btn-warning" style="background-color:#29499C;border-color:#29499C;color:white;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Section Heading
                </button>
            </form>

            <!-- Why Items List -->
            <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Why Items</h6>
            <div class="table-responsive">
                <table class="table table-striped" style="border:1px solid #E8EDFF;">
                    <thead style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                        <tr>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Icon</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Title</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Description</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Order</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($whyItems as $item)
                            <tr style="border-bottom:1px solid #E8EDFF;">
                                <td style="padding:12px 16px;"><i class="{{ $item->icon }}" style="color:#29499C;"></i> {{ $item->icon }}</td>
                                <td style="padding:12px 16px;">{{ $item->title }}</td>
                                <td style="padding:12px 16px;">{{ Str::limit($item->description, 50) }}</td>
                                <td style="padding:12px 16px;">{{ $item->order }}</td>
                                <td style="padding:12px 16px;">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editWhyItem{{ $item->id }}" style="background-color:#29499C;border-color:#29499C;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Edit</button>
                                    <form action="{{ route('admin.about-content.why-item.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" style="background-color:#DC3545;border-color:#DC3545;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#C82333'" onmouseout="this.style.backgroundColor='#DC3545'">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editWhyItem{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                                        <form action="{{ route('admin.about-content.why-item.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Edit Why Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                                            </div>
                                            <div class="modal-body" style="padding:24px;">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Icon</label>
                                                    <input type="text" name="icon" class="form-control" value="{{ $item->icon }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                                    <textarea name="description" class="form-control" rows="3" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                                    <input type="number" name="order" class="form-control" value="{{ $item->order }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                                <button type="submit" class="btn btn-primary" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center" style="padding:20px;color:#5A6C9D;">No why items found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Why Item -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addWhyItem" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 24px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add New Why Item
            </button>

            <!-- Add Modal -->
            <div class="modal fade" id="addWhyItem" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                        <form action="{{ route('admin.about-content.why-item.store') }}" method="POST">
                            @csrf
                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Add Why Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                            </div>
                            <div class="modal-body" style="padding:24px;">
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                                    <input type="text" name="icon" class="form-control" value="fas fa-check" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                    <input type="text" name="title" class="form-control" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                    <textarea name="description" class="form-control" rows="3" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                    <input type="number" name="order" class="form-control" value="0" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                            </div>
                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                <button type="submit" class="btn btn-success" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Culture Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#29499C; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.09 9C9.3251 8.33167 9.78915 7.76811 10.4 7.40913C11.0108 7.05016 11.7289 6.91894 12.4272 7.03871C13.1255 7.15849 13.7588 7.52152 14.2151 8.06355C14.6713 8.60558 14.9211 9.29152 14.92 10C14.92 12 11.92 13 11.92 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 17H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Team & Culture
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-culture') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $culture->heading ?? 'Our Team & Culture' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                        <textarea name="description" class="form-control" rows="3" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $culture->description ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark" style="background-color:#29499C;border-color:#29499C;color:white;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Culture Section
                </button>
            </form>

            <!-- Culture Highlights -->
            <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Culture Highlights</h6>
            <div class="mb-3">
                @forelse($cultureHighlights as $highlight)
                    <span style="background:#F7F9FF;color:#29499C;padding:8px 16px;border-radius:20px;font-size:14px;font-weight:500;border:1px solid #E8EDFF;display:inline-block;margin:0 8px 8px 0;">
                        {{ $highlight->title }}
                        <form action="{{ route('admin.about-content.culture-highlight.delete', $highlight->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-close" style="font-size:10px;margin-left:8px;background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;" onclick="return confirm('Delete this highlight?')"></button>
                        </form>
                    </span>
                @empty
                    <p class="text-muted">No highlights added</p>
                @endforelse
            </div>

            <!-- Add Highlight -->
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addCultureHighlight" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:6px;padding:8px 16px;font-weight:500;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add Highlight
            </button>

            <!-- Add Modal -->
            <div class="modal fade" id="addCultureHighlight" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                        <form action="{{ route('admin.about-content.culture-highlight.store') }}" method="POST">
                            @csrf
                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Add Culture Highlight</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                            </div>
                            <div class="modal-body" style="padding:24px;">
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                    <input type="text" name="title" class="form-control" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                    <input type="number" name="order" class="form-control" value="0" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                            </div>
                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                <button type="submit" class="btn btn-success" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offices Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#2A4A9D; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 21V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V21M19 21L21 21M19 21H14M5 21L3 21M5 21H10M9 6.99998H10M9 11H10M14 6.99998H15M14 11H15M10 21V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V21M10 21H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Our Offices
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-offices') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $offices->heading ?? 'Our Presence' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $offices->subtitle ?? 'Connecting with clients locally and globally.' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary" style="background-color:#2A4A9D;border-color:#2A4A9D;color:white;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Section Heading
                </button>
            </form>

            <!-- Office Locations List -->
            <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Office Locations</h6>
            <div class="table-responsive">
                <table class="table table-striped" style="border:1px solid #E8EDFF;">
                    <thead style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                        <tr>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Icon</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Title</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Role</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Address</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($officeLocations as $location)
                            <tr style="border-bottom:1px solid #E8EDFF;">
                                <td style="padding:12px 16px;"><i class="{{ $location->icon }}" style="color:#29499C;"></i></td>
                                <td style="padding:12px 16px;">{{ $location->title }}</td>
                                <td style="padding:12px 16px;">{{ $location->role }}</td>
                                <td style="padding:12px 16px;">{{ $location->address }}</td>
                                <td style="padding:12px 16px;">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editOfficeLocation{{ $location->id }}" style="background-color:#29499C;border-color:#29499C;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Edit</button>
                                    <form action="{{ route('admin.about-content.office-location.delete', $location->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" style="background-color:#DC3545;border-color:#DC3545;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#C82333'" onmouseout="this.style.backgroundColor='#DC3545'">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editOfficeLocation{{ $location->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                                        <form action="{{ route('admin.about-content.office-location.update', $location->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Edit Office Location</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                                            </div>
                                            <div class="modal-body" style="padding:24px;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Icon</label>
                                                        <input type="text" name="icon" class="form-control" value="{{ $location->icon }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $location->title }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Role</label>
                                                        <input type="text" name="role" class="form-control" value="{{ $location->role }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Address</label>
                                                        <input type="text" name="address" class="form-control" value="{{ $location->address }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                                        <textarea name="description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">{{ $location->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 1 Icon</label>
                                                        <input type="text" name="contact1_icon" class="form-control" value="{{ $location->contact1_icon }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 1 Text</label>
                                                        <input type="text" name="contact1_text" class="form-control" value="{{ $location->contact1_text }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 2 Icon</label>
                                                        <input type="text" name="contact2_icon" class="form-control" value="{{ $location->contact2_icon }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 2 Text</label>
                                                        <input type="text" name="contact2_text" class="form-control" value="{{ $location->contact2_text }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                                        <input type="number" name="order" class="form-control" value="{{ $location->order }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                                <button type="submit" class="btn btn-primary" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center" style="padding:20px;color:#5A6C9D;">No office locations found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Office Location -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addOfficeLocation" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 24px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add New Office Location
            </button>

            <!-- Add Modal -->
            <div class="modal fade" id="addOfficeLocation" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                        <form action="{{ route('admin.about-content.office-location.store') }}" method="POST">
                            @csrf
                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Add Office Location</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                            </div>
                            <div class="modal-body" style="padding:24px;">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                                        <input type="text" name="icon" class="form-control" value="fas fa-map-marker-alt" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                        <input type="text" name="title" class="form-control" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Role</label>
                                        <input type="text" name="role" class="form-control" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Address</label>
                                        <input type="text" name="address" class="form-control" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                        <textarea name="description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 1 Icon</label>
                                        <input type="text" name="contact1_icon" class="form-control" placeholder="fas fa-envelope" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 1 Text</label>
                                        <input type="text" name="contact1_text" class="form-control" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 2 Icon</label>
                                        <input type="text" name="contact2_icon" class="form-control" placeholder="fas fa-phone" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Contact 2 Text</label>
                                        <input type="text" name="contact2_text" class="form-control" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                        <input type="number" name="order" class="form-control" value="0" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                <button type="submit" class="btn btn-success" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">Add Location</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners Section -->
    <div class="card mb-4" style="border:1px solid #E8EDFF;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);">
        <div class="card-header" style="background-color:#29499C; color:white;border-radius:12px 12px 0 0;padding:20px 24px;">
            <h5 class="mb-0" style="font-weight:600;font-size:18px;display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.5 9C8.5 9.82843 7.82843 10.5 7 10.5C6.17157 10.5 5.5 9.82843 5.5 9C5.5 8.17157 6.17157 7.5 7 7.5C7.82843 7.5 8.5 8.17157 8.5 9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 9C18.5 9.82843 17.8284 10.5 17 10.5C16.1716 10.5 15.5 9.82843 15.5 9C15.5 8.17157 16.1716 7.5 17 7.5C17.8284 7.5 18.5 8.17157 18.5 9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.5 15.5C15.5 16.3284 14.8284 17 14 17C13.1716 17 12.5 16.3284 12.5 15.5C12.5 14.6716 13.1716 14 14 14C14.8284 14 15.5 14.6716 15.5 15.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.5 15.5C8.5 16.3284 7.82843 17 7 17C6.17157 17 5.5 16.3284 5.5 15.5C5.5 14.6716 6.17157 14 7 14C7.82843 14 8.5 14.6716 8.5 15.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Strategic Partners
            </h5>
        </div>
        <div class="card-body" style="padding:32px;">
            <!-- Section Header -->
            <form action="{{ route('admin.about-content.update-partners') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $partners->heading ?? 'Strategic Partners' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="color:#29499C;font-weight:600;">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $partners->subtitle ?? 'Collaborating with industry leaders to deliver world-class solutions.' }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:12px 28px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Update Section Heading
                </button>
            </form>

            <!-- Partner Items List -->
            <h6 class="mb-3" style="color:#29499C;font-weight:600;font-size:16px;">Partner Items</h6>
            <div class="table-responsive">
                <table class="table table-striped" style="border:1px solid #E8EDFF;">
                    <thead style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                        <tr>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Icon</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Title</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Description</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Order</th>
                            <th style="color:#29499C;font-weight:600;padding:12px 16px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partnerItems as $item)
                            <tr style="border-bottom:1px solid #E8EDFF;">
                                <td style="padding:12px 16px;"><i class="{{ $item->icon }}" style="color:#29499C;"></i></td>
                                <td style="padding:12px 16px;">{{ $item->title }}</td>
                                <td style="padding:12px 16px;">{{ Str::limit($item->description, 50) }}</td>
                                <td style="padding:12px 16px;">{{ $item->order }}</td>
                                <td style="padding:12px 16px;">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPartnerItem{{ $item->id }}" style="background-color:#29499C;border-color:#29499C;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Edit</button>
                                    <form action="{{ route('admin.about-content.partner-item.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" style="background-color:#DC3545;border-color:#DC3545;border-radius:6px;padding:6px 12px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#C82333'" onmouseout="this.style.backgroundColor='#DC3545'">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editPartnerItem{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                                        <form action="{{ route('admin.about-content.partner-item.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Edit Partner Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                                            </div>
                                            <div class="modal-body" style="padding:24px;">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Icon</label>
                                                    <input type="text" name="icon" class="form-control" value="{{ $item->icon }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                                    <textarea name="description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                                    <input type="number" name="order" class="form-control" value="{{ $item->order }}" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                                <button type="submit" class="btn btn-primary" style="background-color:#29499C;border-color:#29499C;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#2A4A9D'" onmouseout="this.style.backgroundColor='#29499C'">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center" style="padding:20px;color:#5A6C9D;">No partner items found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Add New Partner Item -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addPartnerItem" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 24px;font-weight:600;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add New Partner
            </button>

            <!-- Add Modal -->
            <div class="modal fade" id="addPartnerItem" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content" style="border:1px solid #E8EDFF;border-radius:12px;">
                        <form action="{{ route('admin.about-content.partner-item.store') }}" method="POST">
                            @csrf
                            <div class="modal-header" style="background:#F7F9FF;border-bottom:1px solid #E8EDFF;border-radius:12px 12px 0 0;padding:20px 24px;">
                                <h5 class="modal-title" style="color:#29499C;font-weight:600;">Add Partner Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" style="background:transparent url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%2329499C%22%3E%3Cpath d=%22M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z%22/%3E%3C/svg%3E') no-repeat center;"></button>
                            </div>
                            <div class="modal-body" style="padding:24px;">
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Icon (Font Awesome class)</label>
                                    <input type="text" name="icon" class="form-control" value="fas fa-handshake" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Title</label>
                                    <input type="text" name="title" class="form-control" required style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Description</label>
                                    <textarea name="description" class="form-control" rows="2" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color:#29499C;font-weight:600;">Order</label>
                                    <input type="number" name="order" class="form-control" value="0" style="border:1px solid #D1D9FF;border-radius:8px;padding:12px 16px;color:#333;background:#FFFFFF;">
                                </div>
                            </div>
                            <div class="modal-footer" style="background:#F7F9FF;border-top:1px solid #E8EDFF;border-radius:0 0 12px 12px;padding:20px 24px;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#5A6C9D;border-color:#5A6C9D;border-radius:8px;padding:10px 20px;font-weight:500;">Close</button>
                                <button type="submit" class="btn btn-success" style="background-color:#2A4A9D;border-color:#2A4A9D;border-radius:8px;padding:10px 20px;font-weight:500;transition:background 0.3s;" onmouseover="this.style.backgroundColor='#29499C'" onmouseout="this.style.backgroundColor='#2A4A9D'">Add Partner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection