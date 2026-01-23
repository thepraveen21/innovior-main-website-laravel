@extends('layouts.admin')

@section('title', 'News Content Management')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">News & Updates Content Management</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hero Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news-content.update-hero') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $hero->heading ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $hero->description ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Background Image</label>
                    <input type="file" name="background_image" class="form-control" accept="image/*">
                    @if($hero && $hero->background_image)
                        <small class="text-muted">Current: {{ basename($hero->background_image) }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Hero</button>
            </form>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">News Categories</h5>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                + Add Category
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ $category->order }}</td>
                            <td>
                                <span class="badge bg-{{ $category->is_active ? 'success' : 'secondary' }}">
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editCategory({{ json_encode($category) }})">Edit</button>
                                <form action="{{ route('admin.news-content.category.delete', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No categories found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- News Articles Section -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0">News Articles</h5>
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addArticleModal">
                + Add Article
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th>Read Time</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td><span class="badge bg-secondary">{{ $article->category->name }}</span></td>
                            <td>{{ $article->published_date->format('M d, Y') }}</td>
                            <td>{{ $article->read_time }} min</td>
                            <td>
                                @if($article->is_featured)
                                <span class="badge bg-success">Featured</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $article->is_active ? 'success' : 'secondary' }}">
                                    {{ $article->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editArticle({{ json_encode($article) }})">Edit</button>
                                <form action="{{ route('admin.news-content.article.delete', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this article?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No articles found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Latest News Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news-content.update-latest-section') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $latestSection->heading ?? 'Latest News' }}" required>
                </div>
                <button type="submit" class="btn btn-dark">Update Latest News Section</button>
            </form>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Newsletter Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news-content.update-newsletter') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $newsletter->heading ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" required>{{ $newsletter->description ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $newsletter->button_text ?? 'Subscribe' }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update Newsletter</button>
            </form>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.news-content.category.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add News Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="categoryActive" checked>
                        <label class="form-check-label" for="categoryActive">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit News Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="editCategoryName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" id="editCategoryOrder" class="form-control" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="editCategoryActive">
                        <label class="form-check-label" for="editCategoryActive">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Article Modal -->
<div class="modal fade" id="addArticleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.news-content.article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add News Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Published Date</label>
                            <input type="date" name="published_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Content (Optional)</label>
                        <textarea name="content" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Author (Optional)</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Read Time (minutes)</label>
                            <input type="number" name="read_time" class="form-control" value="5" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_featured" class="form-check-input" id="addFeatured">
                                <label class="form-check-label" for="addFeatured">Featured</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" id="addActive" checked>
                                <label class="form-check-label" for="addActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Article</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Article Modal -->
<div class="modal fade" id="editArticleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editArticleForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit News Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" id="editArticleCategory" class="form-select" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Published Date</label>
                            <input type="date" name="published_date" id="editArticleDate" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="editArticleTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Excerpt</label>
                        <textarea name="excerpt" id="editArticleExcerpt" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Content (Optional)</label>
                        <textarea name="content" id="editArticleContent" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small id="editArticleImageCurrent" class="text-muted"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Author (Optional)</label>
                            <input type="text" name="author" id="editArticleAuthor" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Read Time (minutes)</label>
                            <input type="number" name="read_time" id="editArticleReadTime" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="editArticleOrder" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_featured" class="form-check-input" id="editArticleFeatured">
                                <label class="form-check-label" for="editArticleFeatured">Featured</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" id="editArticleActive">
                                <label class="form-check-label" for="editArticleActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Article</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCategory(category) {
    document.getElementById('editCategoryForm').action = '/admin/news-content/category/' + category.id;
    document.getElementById('editCategoryName').value = category.name;
    document.getElementById('editCategoryOrder').value = category.order;
    document.getElementById('editCategoryActive').checked = category.is_active;
    new bootstrap.Modal(document.getElementById('editCategoryModal')).show();
}

function editArticle(article) {
    document.getElementById('editArticleForm').action = '/admin/news-content/article/' + article.id;
    document.getElementById('editArticleCategory').value = article.category_id;
    document.getElementById('editArticleTitle').value = article.title;
    document.getElementById('editArticleExcerpt').value = article.excerpt;
    document.getElementById('editArticleContent').value = article.content || '';
    document.getElementById('editArticleAuthor').value = article.author || '';
    document.getElementById('editArticleDate').value = article.published_date;
    document.getElementById('editArticleReadTime').value = article.read_time;
    document.getElementById('editArticleOrder').value = article.order;
    document.getElementById('editArticleFeatured').checked = article.is_featured;
    document.getElementById('editArticleActive').checked = article.is_active;
    document.getElementById('editArticleImageCurrent').textContent = article.image ? 'Current: ' + article.image.split('/').pop() : '';
    new bootstrap.Modal(document.getElementById('editArticleModal')).show();
}
</script>
@endsection
