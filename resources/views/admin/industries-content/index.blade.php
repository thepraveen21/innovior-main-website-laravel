@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">Industries Page Content</h1>
    
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
        <form action="{{ route('admin.industries-content.update-hero') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Badge</label>
                    <input type="text" name="badge" class="form-control" value="{{ $hero->badge ?? 'Sectors We Serve' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? 'Technology Built for Real-World Impact' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                <textarea name="description" class="form-control" rows="3" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $hero->description ?? 'Innovior delivers tailored software solutions across diverse industries, helping organizations scale, innovate, and lead in their markets.' }}</textarea>
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

    <!-- Intro Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 8V12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 16H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Intro Section
        </h3>
        <form action="{{ route('admin.industries-content.update-intro') }}" method="POST">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $intro->heading ?? 'Understanding Your Challenges' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                    <textarea name="description" class="form-control" rows="3" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $intro->description ?? 'Every industry operates differently. We don\'t believe in one-size-fits-all. Our domain experts dive deep into your sector\'s regulations, workflows, and customer expectations to build software that actually works.' }}</textarea>
                </div>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:16px;margin-bottom:24px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control" value="{{ $intro->stat_1_number ?? '8+' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-control" value="{{ $intro->stat_1_label ?? 'Industries Served' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control" value="{{ $intro->stat_2_number ?? '100%' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-control" value="{{ $intro->stat_2_label ?? 'Compliance Ready' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="padding:12px 28px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Update Intro Section
            </button>
        </form>
    </div>

    <!-- Industry Cards -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 21V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V21M19 21L21 21M19 21H14M5 21L3 21M5 21H10M9 6.99998H10M9 11H10M14 6.99998H15M14 11H15M10 21V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V21M10 21H14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Industry Cards
        </h3>
        
        <!-- Add New Industry -->
        <form action="{{ route('admin.industries-content.industry.store') }}" method="POST" enctype="multipart/form-data" style="border:2px dashed #2A4A9D;padding:24px;border-radius:10px;margin-bottom:32px;background:#F7F9FF;">
            <h5 style="margin-top:0;margin-bottom:20px;color:#29499C;font-size:16px;font-weight:600;">Add New Industry</h5>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;margin-bottom:12px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Healthcare" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Secure telemedicine..." required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Link (optional)</label>
                    <input type="text" name="link" class="form-control" placeholder="#" style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
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
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Action</label>
                    <button type="submit" class="btn btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add</button>
                </div>
            </div>
            <div style="margin-top:12px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:13px;">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
            </div>
        </form>

        <!-- Existing Industries -->
        <table class="table" style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Image</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Title</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Description</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Order</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Active</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $industry)
                <tr style="border-bottom:1px solid #E8EDFF;">
                    <form action="{{ route('admin.industries-content.industry.update', $industry) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td style="padding:12px 16px;vertical-align:middle;">
                            <div style="width:60px;height:40px;border-radius:6px;overflow:hidden;border:2px solid #E8EDFF;">
                                <img src="{{ asset('storage/' . $industry->image) }}" style="width:100%;height:100%;object-fit:cover;">
                            </div>
                        </td>
                        <td style="padding:12px 16px;vertical-align:middle;"><input type="text" name="title" class="form-control form-control-sm" value="{{ $industry->title }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;vertical-align:middle;"><input type="text" name="description" class="form-control form-control-sm" value="{{ $industry->description }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;vertical-align:middle;"><input type="number" name="order" class="form-control form-control-sm" value="{{ $industry->order }}" required style="width:60px;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;vertical-align:middle;">
                            <input type="checkbox" name="is_active" value="1" {{ $industry->is_active ? 'checked' : '' }} style="width:20px;height:20px;accent-color:#29499C;">
                        </td>
                        <td style="padding:12px 16px;vertical-align:middle;">
                            <input type="hidden" name="link" value="{{ $industry->link }}">
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <input type="file" name="image" class="form-control form-control-sm" accept="image/*" style="width:100%;padding:6px 10px;border:1px solid #D1D9FF;border-radius:4px;font-size:12px;color:#333;background:#FFFFFF;">
                                <div style="display:flex;gap:8px;">
                                    <button type="submit" class="btn btn-sm btn-success" style="padding:6px 12px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;flex:1;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Update</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.industries-content.industry.delete', $industry) }}" method="POST" style="display:inline;margin-top:8px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="padding:6px 12px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;width:100%;margin-top:8px;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'" onclick="return confirm('Delete this industry?')">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Why Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Why Innovior Section
        </h3>
        <form action="{{ route('admin.industries-content.update-why') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $why->heading ?? 'Why Innovior for Your Industry?' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                    <textarea name="description" class="form-control" rows="2" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $why->description ?? 'We don\'t just write code. We understand the specific regulatory and operational demands of your sector.' }}</textarea>
                </div>
            </div>
            
            <div style="margin-bottom:24px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:12px;font-size:14px;">Image</label>
                @if($why && $why->image)
                    <div style="background:#F7F9FF;padding:16px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;display:inline-block;">
                        <img src="{{ asset('storage/' . $why->image) }}" style="max-width:200px;border-radius:6px;border:1px solid #D1D9FF;">
                    </div>
                @endif
                <div style="position:relative;">
                    <input type="file" name="image" class="form-control" accept="image/*" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="padding:12px 28px;background:#29499C;color:white;border:none;border-radius:8px;font-weight:600;font-size:15px;cursor:pointer;transition:background 0.3s;display:flex;align-items:center;gap:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Update Why Section
            </button>
        </form>

        <!-- Why Items -->
        <div style="margin-top:32px;padding-top:24px;border-top:1px solid #E8EDFF;">
            <h5 style="margin:0 0 16px 0;color:#29499C;font-size:16px;font-weight:600;">Why Items</h5>
            <form action="{{ route('admin.industries-content.why-item.store') }}" method="POST" style="border:2px dashed #2A4A9D;padding:20px;border-radius:10px;margin-bottom:24px;background:#F7F9FF;">
                @csrf
                <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;">
                    <div style="grid-column:span 2;">
                        <input type="text" name="heading" class="form-control" placeholder="Enterprise Security" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div style="grid-column:span 3;">
                        <input type="text" name="description" class="form-control" placeholder="Built-in compliance..." required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div>
                        <input type="number" name="order" class="form-control" placeholder="Order" value="0" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add</button>
                    </div>
                </div>
            </form>

            <ul style="margin:0;padding-left:0;list-style:none;">
                @foreach($whyItems as $item)
                <li style="margin-bottom:12px;padding:16px;background:#F7F9FF;border-radius:8px;border:1px solid #E8EDFF;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;">
                        <div>
                            <div style="color:#29499C;font-weight:600;font-size:15px;margin-bottom:6px;">{{ $item->heading }}</div>
                            <div style="color:#5A6C9D;font-size:14px;">{{ $item->description }}</div>
                            <div style="color:#5A6C9D;font-size:12px;margin-top:8px;background:#FFFFFF;padding:4px 10px;border-radius:4px;border:1px solid #E8EDFF;display:inline-block;">
                                Order: {{ $item->order }}
                            </div>
                        </div>
                        <form action="{{ route('admin.industries-content.why-item.delete', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="padding:6px 16px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
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
        <form action="{{ route('admin.industries-content.update-cta') }}" method="POST">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:20px;margin-bottom:24px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Innovate Within Your Sector' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? 'Discuss your industry-specific challenges with our consultants today.' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Schedule a Consultation' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
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