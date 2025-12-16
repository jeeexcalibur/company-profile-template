@extends('admin.layouts.app')

@section('title', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')
@section('subtitle', isset($testimonial) ? 'Update testimonial details' : 'Add a new client testimonial')

@section('content')
    <div class="max-w-3xl">
        <form method="POST"
            action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($testimonial)) @method('PUT') @endif

            <div class="admin-card p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="client_name" class="form-label">Client Name <span class="text-red-400">*</span></label>
                        <input type="text" id="client_name" name="client_name"
                            value="{{ old('client_name', $testimonial->client_name ?? '') }}" required class="form-input">
                    </div>
                    <div>
                        <label for="client_position" class="form-label">Position</label>
                        <input type="text" id="client_position" name="client_position"
                            value="{{ old('client_position', $testimonial->client_position ?? '') }}" class="form-input"
                            placeholder="e.g., CEO">
                    </div>
                    <div>
                        <label for="client_company" class="form-label">Company</label>
                        <input type="text" id="client_company" name="client_company"
                            value="{{ old('client_company', $testimonial->client_company ?? '') }}" class="form-input">
                    </div>
                </div>

                <div>
                    <label for="content" class="form-label">Testimonial Content <span class="text-red-400">*</span></label>
                    <textarea id="content" name="content" rows="4" required class="form-input"
                        placeholder="What did the client say...">{{ old('content', $testimonial->content ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="client_photo" class="form-label">Client Photo</label>
                        @if(isset($testimonial) && $testimonial->client_photo_url)
                            <div class="mb-3">
                                <img src="{{ $testimonial->client_photo_url }}" alt="{{ $testimonial->client_name }}"
                                    class="w-16 h-16 rounded-full object-cover">
                            </div>
                        @endif
                        <input type="file" id="client_photo" name="client_photo" accept="image/*" class="form-input">
                    </div>
                    <div>
                        <label for="rating" class="form-label">Rating <span class="text-red-400">*</span></label>
                        <select id="rating" name="rating" required class="form-input">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div>
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" class="form-input w-24">
                    </div>
                    <label class="flex items-center gap-2 cursor-pointer pt-6">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured ?? false) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500">
                        <span class="text-white/80 text-sm">Featured</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer pt-6">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500">
                        <span class="text-white/80 text-sm">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="px-6 py-3 rounded-lg btn-primary text-white font-medium">{{ isset($testimonial) ? 'Update' : 'Add' }}
                    Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10 hover:text-white transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection