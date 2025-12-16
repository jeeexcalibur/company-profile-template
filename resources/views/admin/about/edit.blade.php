@extends('admin.layouts.app')

@section('title', 'About Section')
@section('subtitle', 'Edit your about page content')

@section('content')
    <div class="max-w-4xl">
        {{-- Delete Image Form (MUST be outside main form) --}}
        @if($about->image)
            <form id="delete-image-form" method="POST" action="{{ route('admin.about.delete-image') }}" class="hidden">
                @csrf
            </form>
        @endif

        <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="admin-card p-6 space-y-6">
                <div>
                    <label for="title" class="form-label">Title <span class="text-red-400">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $about->title) }}" required
                        class="form-input">
                </div>

                <div>
                    <label for="content" class="form-label">Content <span class="text-red-400">*</span></label>
                    <textarea id="content" name="content" rows="5" required
                        class="form-input">{{ old('content', $about->content) }}</textarea>
                </div>

                <div>
                    <label for="image" class="form-label">Image</label>
                    @if($about->image)
                        <div class="mb-3 flex items-center gap-3">
                            <img src="{{ $about->image_url }}" alt="About" class="w-48 h-48 object-cover rounded-lg">
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
                    <input type="file" id="image" name="image" accept="image/*" class="form-input">
                </div>
            </div>

            <div class="admin-card p-6 space-y-6">
                <h3 class="text-lg font-semibold text-white">Mission & Vision</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label for="mission_title" class="form-label">Mission Title</label>
                            <input type="text" id="mission_title" name="mission_title"
                                value="{{ old('mission_title', $about->mission_title) }}" class="form-input">
                        </div>
                        <div>
                            <label for="mission_content" class="form-label">Mission Content</label>
                            <textarea id="mission_content" name="mission_content" rows="3"
                                class="form-input">{{ old('mission_content', $about->mission_content) }}</textarea>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label for="vision_title" class="form-label">Vision Title</label>
                            <input type="text" id="vision_title" name="vision_title"
                                value="{{ old('vision_title', $about->vision_title) }}" class="form-input">
                        </div>
                        <div>
                            <label for="vision_content" class="form-label">Vision Content</label>
                            <textarea id="vision_content" name="vision_content" rows="3"
                                class="form-input">{{ old('vision_content', $about->vision_content) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-card p-6 space-y-6">
                <h3 class="text-lg font-semibold text-white">Statistics</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div>
                        <label for="years_experience" class="form-label">Years Experience</label>
                        <input type="number" id="years_experience" name="years_experience"
                            value="{{ old('years_experience', $about->years_experience) }}" class="form-input" min="0">
                    </div>
                    <div>
                        <label for="projects_completed" class="form-label">Projects Completed</label>
                        <input type="number" id="projects_completed" name="projects_completed"
                            value="{{ old('projects_completed', $about->projects_completed) }}" class="form-input" min="0">
                    </div>
                    <div>
                        <label for="happy_clients" class="form-label">Happy Clients</label>
                        <input type="number" id="happy_clients" name="happy_clients"
                            value="{{ old('happy_clients', $about->happy_clients) }}" class="form-input" min="0">
                    </div>
                    <div>
                        <label for="team_members" class="form-label">Team Members</label>
                        <input type="number" id="team_members" name="team_members"
                            value="{{ old('team_members', $about->team_members) }}" class="form-input" min="0">
                    </div>
                </div>
            </div>

            <button type="submit" class="px-6 py-3 rounded-lg btn-primary text-white font-medium">Save About
                Section</button>
        </form>
    </div>
@endsection