@extends('admin.layouts.app')

@section('title', 'Hero Section')
@section('subtitle', 'Edit your homepage hero content')

@section('content')
    <div class="max-w-3xl">
        {{-- Delete Image Form (MUST be outside main form) --}}
        @if($hero->foreground_image)
            <form id="delete-image-form" method="POST" action="{{ route('admin.hero.delete-image', 'foreground_image') }}"
                class="hidden">
                @csrf
            </form>
        @endif

        <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="admin-card p-6 space-y-6">
                <div>
                    <label for="title" class="form-label">Title <span class="text-red-400">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $hero->title) }}" required
                        class="form-input" placeholder="We Build Digital Experiences">
                </div>

                <div>
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $hero->subtitle) }}"
                        class="form-input" placeholder="Award-Winning Agency">
                </div>

                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="3" class="form-input"
                        placeholder="Brief description...">{{ old('description', $hero->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="button_text" class="form-label">Primary Button Text</label>
                        <input type="text" id="button_text" name="button_text"
                            value="{{ old('button_text', $hero->button_text) }}" class="form-input"
                            placeholder="Get Started">
                    </div>
                    <div>
                        <label for="button_link" class="form-label">Primary Button Link</label>
                        <input type="text" id="button_link" name="button_link"
                            value="{{ old('button_link', $hero->button_link) }}" class="form-input" placeholder="/contact">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="button_text_secondary" class="form-label">Secondary Button Text</label>
                        <input type="text" id="button_text_secondary" name="button_text_secondary"
                            value="{{ old('button_text_secondary', $hero->button_text_secondary) }}" class="form-input"
                            placeholder="Learn More">
                    </div>
                    <div>
                        <label for="button_link_secondary" class="form-label">Secondary Button Link</label>
                        <input type="text" id="button_link_secondary" name="button_link_secondary"
                            value="{{ old('button_link_secondary', $hero->button_link_secondary) }}" class="form-input"
                            placeholder="/about">
                    </div>
                </div>

                <div>
                    <label for="foreground_image" class="form-label">Hero Image</label>
                    @if($hero->foreground_image)
                        <div class="mb-3 flex items-center gap-3">
                            <img src="{{ $hero->foreground_image_url }}" alt="Hero" class="h-32 object-contain rounded-lg">
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
                    <input type="file" id="foreground_image" name="foreground_image" accept="image/*" class="form-input">
                </div>
            </div>

            <button type="submit" class="px-6 py-3 rounded-lg btn-primary text-white font-medium">Save Hero Section</button>
        </form>
    </div>
@endsection