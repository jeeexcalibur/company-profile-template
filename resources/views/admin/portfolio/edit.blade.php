@extends('admin.layouts.app')

@section('title', isset($portfolio) ? 'Edit Portfolio' : 'Add Portfolio Item')
@section('subtitle', isset($portfolio) ? 'Update portfolio details' : 'Add a new portfolio item')

@section('content')
    <div class="max-w-3xl">
        {{-- Delete Image Form (MUST be outside main form) --}}
        @if(isset($portfolio) && $portfolio->image_url)
            <form id="delete-image-form" method="POST" action="{{ route('admin.portfolio.delete-image', $portfolio) }}"
                class="hidden">
                @csrf
            </form>
        @endif

        <form method="POST"
            action="{{ isset($portfolio) ? route('admin.portfolio.update', $portfolio) : route('admin.portfolio.store') }}"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($portfolio)) @method('PUT') @endif

            <div class="admin-card p-6 space-y-6">
                <div>
                    <label for="title" class="form-label">Title <span class="text-red-400">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title ?? '') }}" required
                        class="form-input">
                </div>

                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="form-input">{{ old('description', $portfolio->description ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="client_name" class="form-label">Client Name</label>
                        <input type="text" id="client_name" name="client_name"
                            value="{{ old('client_name', $portfolio->client_name ?? '') }}" class="form-input">
                    </div>
                    <div>
                        <label for="category" class="form-label">Category</label>
                        <input type="text" id="category" name="category"
                            value="{{ old('category', $portfolio->category ?? '') }}" class="form-input" list="categories"
                            placeholder="e.g., Web Development">
                        <datalist id="categories">
                            @foreach($categories ?? [] as $cat)
                                <option value="{{ $cat }}">
                            @endforeach
                        </datalist>
                    </div>
                </div>

                <div>
                    <label for="image" class="form-label">Image {{ isset($portfolio) ? '' : '*' }}</label>
                    @if(isset($portfolio) && $portfolio->image_url)
                        <div class="mb-3 flex items-center gap-3">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                class="w-48 h-32 object-cover rounded-lg">
                            <button type="button"
                                onclick="if(confirm('Delete this image?')) document.getElementById('delete-image-form').submit();"
                                class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                title="Delete Image">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" class="form-input" {{ isset($portfolio) ? '' : 'required' }}>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="project_url" class="form-label">Project URL</label>
                        <input type="url" id="project_url" name="project_url"
                            value="{{ old('project_url', $portfolio->project_url ?? '') }}" class="form-input"
                            placeholder="https://...">
                    </div>
                    <div>
                        <label for="completed_at" class="form-label">Completed Date</label>
                        <input type="date" id="completed_at" name="completed_at"
                            value="{{ old('completed_at', isset($portfolio) && $portfolio->completed_at ? $portfolio->completed_at->format('Y-m-d') : '') }}"
                            class="form-input">
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div>
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}" class="form-input w-24">
                    </div>
                    <label class="flex items-center gap-2 cursor-pointer pt-6">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured ?? false) ? 'checked' : '' }} class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500">
                        <span class="text-white/80 text-sm">Featured</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer pt-6">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $portfolio->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500">
                        <span class="text-white/80 text-sm">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="px-6 py-3 rounded-lg btn-primary text-white font-medium">{{ isset($portfolio) ? 'Update' : 'Add' }}
                    Portfolio</button>
                <a href="{{ route('admin.portfolio.index') }}"
                    class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10 hover:text-white transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection