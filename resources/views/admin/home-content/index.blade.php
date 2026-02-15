@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">Home Page Content</h1>
    
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

    <!-- Hero Slider Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3H19C19.5523 3 20 3.44772 20 4V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4C4 3.44772 4.44772 3 5 3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 11L20 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Hero Slider
        </h3>
        <form action="{{ route('admin.home-content.update-hero') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Hero Title/Badge</label>
                    <input type="text" name="hero_title" class="form-control" value="{{ $about->hero_title ?? 'Innovating Tomorrow' }}" placeholder="e.g., Innovating Tomorrow" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Hero Button Text</label>
                    <input type="text" name="hero_button_text" class="form-control" value="{{ $about->hero_button_text ?? '' }}" placeholder="e.g., Start Your Project" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Hero Description/Main Heading</label>
                <textarea name="hero_description" class="form-control" rows="4" placeholder="Enter main heading for hero section" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $about->hero_description ?? '' }}</textarea>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Hero Button Link</label>
                <input type="text" name="hero_button_link" class="form-control" value="{{ $about->hero_button_link ?? '' }}" placeholder="e.g., /contact" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
            </div>
            
            <div style="margin-bottom:24px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:12px;font-size:14px;">Hero Image</label>
                @if($about && $about->hero_image)
                    <div style="background:#F7F9FF;padding:16px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;display:inline-block;">
                        <img src="{{ asset('storage/' . $about->hero_image) }}" style="max-width:300px;border-radius:6px;border:1px solid #D1D9FF;">
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
                Update Hero Slider
            </button>
        </form>
    </div>

    <!-- About Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.09 9C9.3251 8.33167 9.78915 7.76811 10.4 7.40913C11.0108 7.05016 11.7289 6.91894 12.4272 7.03871C13.1255 7.15849 13.7588 7.52152 14.2151 8.06355C14.6713 8.60558 14.9211 9.29152 14.92 10C14.92 12 11.92 13 11.92 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            About Section
        </h3>
        <form action="{{ route('admin.home-content.update-about') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:20px;margin-bottom:20px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Sub Heading</label>
                    <input type="text" name="sub_heading" class="form-control" value="{{ $about->sub_heading ?? 'Who We Are' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Main Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $about->heading ?? '' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Paragraph 1</label>
                <textarea name="paragraph_1" class="form-control" rows="3" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $about->paragraph_1 ?? '' }}</textarea>
            </div>
            
            <div style="margin-bottom:20px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Paragraph 2</label>
                <textarea name="paragraph_2" class="form-control" rows="3" style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">{{ $about->paragraph_2 ?? '' }}</textarea>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:16px;margin-bottom:24px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control" value="{{ $about->stat_1_number ?? '50+' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-control" value="{{ $about->stat_1_label ?? 'Projects' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control" value="{{ $about->stat_2_number ?? '100%' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-control" value="{{ $about->stat_2_label ?? 'Success' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
            </div>
            
            <div style="margin-bottom:24px;">
                <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:12px;font-size:14px;">Image</label>
                @if($about && $about->image)
                    <div style="background:#F7F9FF;padding:16px;border-radius:8px;border:1px solid #E8EDFF;margin-bottom:16px;display:inline-block;">
                        <img src="{{ asset('storage/' . $about->image) }}" style="max-width:200px;border-radius:6px;border:1px solid #D1D9FF;">
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
                Update About Section
            </button>
        </form>
    </div>

    <!-- CTA Section -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.73 21C13.5542 21.3031 13.3018 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Call to Action Section
        </h3>
        <form action="{{ route('admin.home-content.update-cta') }}" method="POST">
            @csrf
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:20px;margin-bottom:24px;">
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $cta->heading ?? 'Let\'s Build Something Powerful' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $cta->description ?? '' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label class="form-label" style="display:block;color:#29499C;font-weight:600;margin-bottom:8px;font-size:14px;">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $cta->button_text ?? 'Start Your Project' }}" required style="width:100%;padding:12px 16px;border:1px solid #D1D9FF;border-radius:8px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
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

    <!-- Services Note -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Services
        </h3>
        
        <!-- Add New Service -->
        <form action="{{ route('admin.home-content.service.store') }}" method="POST" style="border:2px dashed #2A4A9D;padding:20px;border-radius:10px;margin-bottom:24px;background:#F7F9FF;">
            <h5 style="margin-top:0;margin-bottom:16px;color:#29499C;font-size:16px;font-weight:600;">Add New Service</h5>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;margin-bottom:12px;">
                <div>
                    <input type="text" name="icon" class="form-control" placeholder="Icon (emoji or class)" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="text" name="title" class="form-control" placeholder="Service Title" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="text" name="description" class="form-control" placeholder="Description" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="number" name="order" class="form-control" placeholder="Order" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add</button>
                </div>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:12px;align-items:center;">
                <div>
                    <input type="text" name="link" class="form-control" placeholder="Link (optional)" style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <label style="color:#29499C;font-weight:500;font-size:14px;"><input type="checkbox" name="is_active" value="1" checked style="margin-right:8px;vertical-align:middle;"> Active</label>
                </div>
            </div>
        </form>

        <!-- Existing Services -->
        <table class="table" style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Icon</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Title</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Description</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Order</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Active</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr style="border-bottom:1px solid #E8EDFF;">
                    <form action="{{ route('admin.home-content.service.update', $service) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td style="padding:12px 16px;"><input type="text" name="icon" class="form-control form-control-sm" value="{{ $service->icon }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="text" name="title" class="form-control form-control-sm" value="{{ $service->title }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="text" name="description" class="form-control form-control-sm" value="{{ $service->description }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="number" name="order" class="form-control form-control-sm" value="{{ $service->order }}" required style="width:70px;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} style="transform:scale(1.2);"></td>
                        <td style="padding:12px 16px;">
                            <input type="hidden" name="link" value="{{ $service->link }}">
                            <button type="submit" class="btn btn-sm btn-success" style="padding:6px 12px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;margin-right:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.service.delete', $service) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')" style="padding:6px 12px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Process Steps -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:24px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Process Steps
        </h3>
        
        <!-- Add New Process Step -->
        <form action="{{ route('admin.home-content.process-step.store') }}" method="POST" style="border:2px dashed #2A4A9D;padding:20px;border-radius:10px;margin-bottom:24px;background:#F7F9FF;">
            <h5 style="margin-top:0;margin-bottom:16px;color:#29499C;font-size:16px;font-weight:600;">Add New Process Step</h5>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;">
                <div>
                    <input type="text" name="title" class="form-control" placeholder="Step Title" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="text" name="description" class="form-control" placeholder="Description" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="number" name="order" class="form-control" placeholder="Order" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add</button>
                </div>
            </div>
        </form>

        <!-- Existing Process Steps -->
        <table class="table" style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Title</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Description</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Order</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processSteps as $step)
                <tr style="border-bottom:1px solid #E8EDFF;">
                    <form action="{{ route('admin.home-content.process-step.update', $step) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td style="padding:12px 16px;"><input type="text" name="title" class="form-control form-control-sm" value="{{ $step->title }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="text" name="description" class="form-control form-control-sm" value="{{ $step->description }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="number" name="order" class="form-control form-control-sm" value="{{ $step->order }}" required style="width:70px;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;">
                            <button type="submit" class="btn btn-sm btn-success" style="padding:6px 12px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;margin-right:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.process-step.delete', $step) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this step?')" style="padding:6px 12px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Stats Banner -->
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:24px;font-size:20px;font-weight:600;color:#29499C;display:flex;align-items:center;gap:10px;">
            <div style="width:36px;height:36px;background:#29499C;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 21H6.2C5.0799 21 4.51984 21 4.09202 20.782C3.71569 20.5903 3.40973 20.2843 3.21799 19.908C3 19.4802 3 18.9201 3 17.8V3M7 10L11 6L15 10L21 4M21 4H16M21 4V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            Stats Banner
        </h3>
        
        <!-- Add New Stat -->
        <form action="{{ route('admin.home-content.stats-banner.store') }}" method="POST" style="border:2px dashed #2A4A9D;padding:20px;border-radius:10px;margin-bottom:24px;background:#F7F9FF;">
            <h5 style="margin-top:0;margin-bottom:16px;color:#29499C;font-size:16px;font-weight:600;">Add New Stat</h5>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(150px, 1fr));gap:12px;">
                <div>
                    <input type="text" name="number" class="form-control" placeholder="Number (500+, 10K)" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="text" name="label" class="form-control" placeholder="Label" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <input type="number" name="order" class="form-control" placeholder="Order" required style="width:100%;padding:10px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;transition:all 0.3s;" onfocus="this.style.borderColor='#29499C';this.style.boxShadow='0 0 0 3px rgba(41, 73, 156, 0.1)'" onblur="this.style.borderColor='#D1D9FF';this.style.boxShadow='none'">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100" style="padding:10px 16px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Add</button>
                </div>
            </div>
        </form>

        <!-- Existing Stats -->
        <table class="table" style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#F7F9FF;border-bottom:2px solid #E8EDFF;">
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Number</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Label</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Order</th>
                    <th style="padding:12px 16px;text-align:left;color:#29499C;font-weight:600;font-size:14px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats as $stat)
                <tr style="border-bottom:1px solid #E8EDFF;">
                    <form action="{{ route('admin.home-content.stats-banner.update', $stat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td style="padding:12px 16px;"><input type="text" name="number" class="form-control form-control-sm" value="{{ $stat->number }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="text" name="label" class="form-control form-control-sm" value="{{ $stat->label }}" required style="width:100%;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;"><input type="number" name="order" class="form-control form-control-sm" value="{{ $stat->order }}" required style="width:70px;padding:8px 12px;border:1px solid #D1D9FF;border-radius:6px;font-size:14px;color:#333;background:#FFFFFF;"></td>
                        <td style="padding:12px 16px;">
                            <button type="submit" class="btn btn-sm btn-success" style="padding:6px 12px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;margin-right:8px;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Update</button>
                        </form>
                        <form action="{{ route('admin.home-content.stats-banner.delete', $stat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this stat?')" style="padding:6px 12px;background:#DC3545;color:white;border:none;border-radius:6px;font-weight:500;font-size:13px;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#C82333'" onmouseout="this.style.background='#DC3545'">Delete</button>
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection