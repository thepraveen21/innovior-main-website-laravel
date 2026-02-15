@extends('layouts.admin')

@section('title', 'Contact Content Management')

@section('content')
<div style="padding: 30px;">
    <h1 style="margin-bottom: 30px;">Contact Content Management</h1>

    @if (session('success'))
        <div style="background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hero Section -->
    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
        <h2 style="margin-bottom: 20px; color: #2c3e50;">Hero Section</h2>
        <form method="POST" action="{{ route('admin.contact-content.update-hero') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Heading</label>
                <input type="text" name="heading" value="{{ $hero->heading ?? '' }}" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Description</label>
                <textarea name="description" rows="3" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $hero->description ?? '' }}</textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Background Image</label>
                <input type="file" name="background_image" accept="image/*" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @if($hero && $hero->background_image)
                    <small style="color: #666;">Current: {{ $hero->background_image }}</small>
                @endif
            </div>
            <button type="submit" style="background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Update Hero Section
            </button>
        </form>
    </div>

    <!-- Contact Info Section -->
    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
        <h2 style="margin-bottom: 20px; color: #2c3e50;">Contact Info Section</h2>
        <form method="POST" action="{{ route('admin.contact-content.update-info') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Heading</label>
                <input type="text" name="heading" value="{{ $info->heading ?? '' }}" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Description</label>
                <textarea name="description" rows="3" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $info->description ?? '' }}</textarea>
            </div>
            <button type="submit" style="background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Update Contact Info
            </button>
        </form>
    </div>

    <!-- Info Cards Section -->
    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="color: #2c3e50; margin: 0;">Info Cards</h2>
            <button onclick="showAddInfoCardModal()" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                + Add Info Card
            </button>
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8f9fa;">
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Title</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Content</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Color</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Order</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($infoCards as $card)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ $card->title }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ Str::limit($card->content, 50) }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                        <span style="display: inline-block; padding: 4px 12px; background: {{ $card->icon_color }}; color: white; border-radius: 3px;">
                            {{ $card->icon_color }}
                        </span>
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ $card->order }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                        <button onclick="editInfoCard({{ $card->id }}, '{{ $card->title }}', '{{ addslashes($card->content) }}', '{{ $card->icon_color }}', {{ $card->order }})" 
                            style="background: #f39c12; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;">
                            Edit
                        </button>
                        <form method="POST" action="{{ route('admin.contact-content.info-card.delete', $card) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" 
                                style="background: #e74c3c; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 20px; text-align: center; color: #999;">No info cards found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Form Settings Section -->
    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
        <h2 style="margin-bottom: 20px; color: #2c3e50;">Form Settings</h2>
        <form method="POST" action="{{ route('admin.contact-content.update-form-settings') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Heading</label>
                <input type="text" name="heading" value="{{ $formSettings->heading ?? '' }}" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Submit Button Text</label>
                <input type="text" name="submit_button_text" value="{{ $formSettings->submit_button_text ?? '' }}" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Success Message</label>
                <textarea name="success_message" rows="2" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $formSettings->success_message ?? '' }}</textarea>
            </div>
            <button type="submit" style="background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Update Form Settings
            </button>
        </form>
    </div>

    <!-- Map Section -->
    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
        <h2 style="margin-bottom: 20px; color: #2c3e50;">Map Section</h2>
        <form method="POST" action="{{ route('admin.contact-content.update-map') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Heading</label>
                <input type="text" name="heading" value="{{ $map->heading ?? '' }}" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Map Embed URL</label>
                <textarea name="map_embed_url" rows="3" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $map->map_embed_url ?? '' }}</textarea>
                <small style="color: #666;">Paste the Google Maps embed iframe src URL</small>
            </div>
            <button type="submit" style="background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Update Map Section
            </button>
        </form>
    </div>

</div>

<!-- Add Info Card Modal -->
<div id="addInfoCardModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 30px; border-radius: 8px; width: 90%; max-width: 500px;">
        <h3 style="margin-bottom: 20px;">Add Info Card</h3>
        <form method="POST" action="{{ route('admin.contact-content.info-card.store') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Title</label>
                <input type="text" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Content</label>
                <textarea name="content" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Icon Color</label>
                <select name="icon_color" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="">Select Color</option>
                    <option value="#3498db">Blue</option>
                    <option value="#9b59b6">Purple</option>
                    <option value="#e74c3c">Red</option>
                    <option value="#27ae60">Green</option>
                    <option value="#f39c12">Orange</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Order</label>
                <input type="number" name="order" value="0" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="display: flex; gap: 10px;">
                <button type="submit" style="flex: 1; background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Add Card
                </button>
                <button type="button" onclick="closeAddInfoCardModal()" style="flex: 1; background: #95a5a6; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Info Card Modal -->
<div id="editInfoCardModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 30px; border-radius: 8px; width: 90%; max-width: 500px;">
        <h3 style="margin-bottom: 20px;">Edit Info Card</h3>
        <form id="editInfoCardForm" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Title</label>
                <input type="text" name="title" id="edit_title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Content</label>
                <textarea name="content" id="edit_content" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Icon Color</label>
                <select name="icon_color" id="edit_icon_color" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="">Select Color</option>
                    <option value="#3498db">Blue</option>
                    <option value="#9b59b6">Purple</option>
                    <option value="#e74c3c">Red</option>
                    <option value="#27ae60">Green</option>
                    <option value="#f39c12">Orange</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Order</label>
                <input type="number" name="order" id="edit_order" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="display: flex; gap: 10px;">
                <button type="submit" style="flex: 1; background: #f39c12; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Update Card
                </button>
                <button type="button" onclick="closeEditInfoCardModal()" style="flex: 1; background: #95a5a6; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showAddInfoCardModal() {
    document.getElementById('addInfoCardModal').style.display = 'flex';
}

function closeAddInfoCardModal() {
    document.getElementById('addInfoCardModal').style.display = 'none';
}

function editInfoCard(id, title, content, iconColor, order) {
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_content').value = content;
    document.getElementById('edit_icon_color').value = iconColor;
    document.getElementById('edit_order').value = order;
    document.getElementById('editInfoCardForm').action = '/admin/contact-content/info-card/' + id;
    document.getElementById('editInfoCardModal').style.display = 'flex';
}

function closeEditInfoCardModal() {
    document.getElementById('editInfoCardModal').style.display = 'none';
}
</script>
@endsection