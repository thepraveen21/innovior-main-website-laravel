@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1200px;margin:60px auto;padding:0 20px;">
    <h2 style="margin-bottom:30px;font-size:28px;font-weight:600;color:#29499C;border-bottom:2px solid #2A4A9D;padding-bottom:10px;">Admin Dashboard</h2>
    
    <div style="background:#FFFFFF;padding:32px;border-radius:12px;box-shadow:0 4px 20px rgba(41, 73, 156, 0.12);border:1px solid #E8EDFF;">
        <div style="display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <div style="width:60px;height:60px;background:#29499C;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:16px;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white" />
                    <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <h3 style="margin:0;font-size:22px;font-weight:600;color:#29499C;">Welcome to Admin Panel</h3>
                <p style="color:#5A6C9D;font-size:15px;margin:6px 0 0 0;max-width:400px;">Select a section from the sidebar to manage website content efficiently.</p>
            </div>
        </div>
        
        <div style="display:flex;justify-content:center;gap:16px;margin-top:30px;">
            <div style="flex:1;max-width:200px;padding:20px;background:#F7F9FF;border-radius:10px;border:1px solid #E8EDFF;transition:all 0.3s ease;">
                <div style="color:#2A4A9D;font-weight:600;margin-bottom:8px;font-size:14px;">Total Pages</div>
                <div style="font-size:28px;font-weight:700;color:#29499C;">--</div>
            </div>
            <div style="flex:1;max-width:200px;padding:20px;background:#F7F9FF;border-radius:10px;border:1px solid #E8EDFF;transition:all 0.3s ease;">
                <div style="color:#2A4A9D;font-weight:600;margin-bottom:8px;font-size:14px;">Active Users</div>
                <div style="font-size:28px;font-weight:700;color:#29499C;">--</div>
            </div>
            <div style="flex:1;max-width:200px;padding:20px;background:#F7F9FF;border-radius:10px;border:1px solid #E8EDFF;transition:all 0.3s ease;">
                <div style="color:#2A4A9D;font-weight:600;margin-bottom:8px;font-size:14px;">Last Login</div>
                <div style="font-size:14px;color:#5A6C9D;margin-top:4px;">--</div>
            </div>
        </div>
        
        <div style="margin-top:40px;padding-top:30px;border-top:1px solid #E8EDFF;">
            <h4 style="color:#29499C;font-size:16px;font-weight:600;margin-bottom:16px;">Quick Actions</h4>
            <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
                <button style="padding:10px 20px;background:#29499C;color:white;border:none;border-radius:6px;font-weight:500;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#2A4A9D'" onmouseout="this.style.background='#29499C'">Create New Page</button>
                <button style="padding:10px 20px;background:white;color:#29499C;border:1px solid #29499C;border-radius:6px;font-weight:500;cursor:pointer;transition:all 0.3s;" onmouseover="this.style.background='#F7F9FF'" onmouseout="this.style.background='white'">Manage Users</button>
                <button style="padding:10px 20px;background:white;color:#29499C;border:1px solid #29499C;border-radius:6px;font-weight:500;cursor:pointer;transition:all 0.3s;" onmouseover="this.style.background='#F7F9FF'" onmouseout="this.style.background='white'">View Settings</button>
                <button style="padding:10px 20px;background:white;color:#29499C;border:1px solid #29499C;border-radius:6px;font-weight:500;cursor:pointer;transition:all 0.3s;" onmouseover="this.style.background='#F7F9FF'" onmouseout="this.style.background='white'">Site Analytics</button>
            </div>
        </div>
    </div>
    
    <div style="margin-top:30px;color:#5A6C9D;font-size:13px;text-align:center;padding:16px;border-top:1px solid #E8EDFF;">
        <p style="margin:0;">Need help? Check the <a href="#" style="color:#29499C;text-decoration:none;font-weight:500;">documentation</a> or contact support.</p>
    </div>
</div>
@endsection