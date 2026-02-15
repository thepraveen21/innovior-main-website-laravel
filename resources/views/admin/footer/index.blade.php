@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h1 style="margin-bottom:30px;font-size:28px;font-weight:600;">Footer Management</h1>
    
    @if(session('success'))
        <div class="alert alert-success" style="padding:15px;background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:5px;margin-bottom:20px;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="padding:15px;background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;border-radius:5px;margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Footer Settings -->
    <div style="background:#fff;padding:24px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="margin-top:0;margin-bottom:20px;font-size:20px;font-weight:600;">Footer Settings</h3>
        <form action="{{ route('admin.footer.update') }}" method="POST">
            @csrf

            <!-- Company Information -->
            <div style="margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid #eee;">
                <h4 style="margin-top:0;margin-bottom:15px;font-size:16px;font-weight:600;color:#333;">Company Information</h4>
                
                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Company Name <span style="color:red;">*</span></label>
                    <input type="text" name="company_name" class="form-control" value="{{ $footer->company_name ?? 'Innovior' }}" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Company Description</label>
                    <textarea name="company_description" class="form-control" rows="3" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">{{ $footer->company_description ?? '' }}</textarea>
                    <small style="color:#666;">Display text about your company in the footer</small>
                </div>
            </div>

            <!-- Contact Information -->
            <div style="margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid #eee;">
                <h4 style="margin-top:0;margin-bottom:15px;font-size:16px;font-weight:600;color:#333;">Contact Information</h4>
                
                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Address</label>
                    <textarea name="address" class="form-control" rows="2" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">{{ $footer->address ?? '' }}</textarea>
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" value="{{ $footer->phone ?? '' }}" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $footer->email ?? '' }}" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>
            </div>

            <!-- Social Media Links -->
            <div style="margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid #eee;">
                <h4 style="margin-top:0;margin-bottom:15px;font-size:16px;font-weight:600;color:#333;">Social Media Links</h4>
                
                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Facebook URL</label>
                    <input type="url" name="facebook_url" class="form-control" value="{{ $footer->facebook_url ?? '' }}" placeholder="https://www.facebook.com/..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="form-control" value="{{ $footer->linkedin_url ?? '' }}" placeholder="https://www.linkedin.com/company/..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>

                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Instagram URL</label>
                    <input type="url" name="instagram_url" class="form-control" value="{{ $footer->instagram_url ?? '' }}" placeholder="https://www.instagram.com/..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                </div>
            </div>

            <!-- Footer Bottom -->
            <div style="margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid #eee;">
                <h4 style="margin-top:0;margin-bottom:15px;font-size:16px;font-weight:600;color:#333;">Footer Bottom</h4>
                
                <div class="form-group" style="margin-bottom:15px;">
                    <label class="form-label" style="display:block;margin-bottom:8px;font-weight:500;">Copyright Text</label>
                    <input type="text" name="copyright_text" class="form-control" value="{{ $footer->copyright_text ?? '' }}" placeholder="© Year Company Name. All Rights Reserved." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                    <small style="color:#666;">Customize the copyright text displayed at the bottom of footer</small>
                </div>
            </div>

            <button type="submit" class="btn btn-success" style="background:#28a745;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;font-weight:500;">Update Footer</button>
        </form>
    </div>

    <!-- Information Box -->
    <div style="background:#e7f3ff;border-left:4px solid #2196F3;padding:15px;border-radius:5px;">
        <h4 style="margin-top:0;color:#1976D2;">ℹ️ Tips</h4>
        <ul style="margin:0;padding-left:20px;color:#1565c0;">
            <li>Company Name is required and will be displayed in the footer</li>
            <li>Provide complete URLs for social media links (include https://)</li>
            <li>Leave social media fields empty if you don't have accounts</li>
            <li>All changes will be reflected on the website footer immediately</li>
        </ul>
    </div>
</div>
@endsection
