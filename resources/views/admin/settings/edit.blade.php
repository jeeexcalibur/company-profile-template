@extends('admin.layouts.app')

@section('title', 'Company Settings')
@section('subtitle', 'Configure your company information')

@section('content')
    <div class="max-w-4xl">
        {{-- Delete Image Forms (MUST be outside main form) --}}
        @if($settings->logo)
            <form id="delete-logo-form" method="POST" action="{{ route('admin.settings.delete-image', 'logo') }}"
                class="hidden">
                @csrf
            </form>
        @endif
        @if($settings->favicon)
            <form id="delete-favicon-form" method="POST" action="{{ route('admin.settings.delete-image', 'favicon') }}"
                class="hidden">
                @csrf
            </form>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="admin-card p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Basic Information</h3>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_name" class="form-label">Company Name <span
                                    class="text-red-400">*</span></label>
                            <input type="text" id="company_name" name="company_name"
                                value="{{ old('company_name', $settings->company_name) }}" required class="form-input">
                        </div>
                        <div>
                            <label for="tagline" class="form-label">Tagline</label>
                            <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $settings->tagline) }}"
                                class="form-input" placeholder="Your company tagline">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="form-input">{{ old('description', $settings->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="logo" class="form-label">Logo</label>
                            @if($settings->logo)
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="{{ $settings->logo_url }}" alt="Logo" class="h-16 object-contain">
                                    <button type="button"
                                        onclick="if(confirm('Delete logo?')) document.getElementById('delete-logo-form').submit();"
                                        class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                        title="Delete Logo">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <input type="file" id="logo" name="logo" accept="image/*" class="form-input">
                        </div>
                        <div>
                            <label for="favicon" class="form-label">Favicon</label>
                            @if($settings->favicon)
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="{{ $settings->favicon_url }}" alt="Favicon" class="h-8 object-contain">
                                    <button type="button"
                                        onclick="if(confirm('Delete favicon?')) document.getElementById('delete-favicon-form').submit();"
                                        class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                        title="Delete Favicon">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <input type="file" id="favicon" name="favicon" accept="image/*,.ico" class="form-input">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="admin-card p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Contact Information</h3>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $settings->email) }}"
                                class="form-input" placeholder="contact@company.com">
                        </div>
                        <div>
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}"
                                class="form-input" placeholder="+1 (555) 123-4567">
                        </div>
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" rows="2"
                            class="form-input">{{ old('address', $settings->address) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="admin-card p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Social Media Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $settings->facebook) }}"
                            class="form-input" placeholder="https://facebook.com/...">
                    </div>
                    <div>
                        <label for="twitter" class="form-label">Twitter / X</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter) }}"
                            class="form-input" placeholder="https://twitter.com/...">
                    </div>
                    <div>
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="url" id="instagram" name="instagram"
                            value="{{ old('instagram', $settings->instagram) }}" class="form-input"
                            placeholder="https://instagram.com/...">
                    </div>
                    <div>
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin) }}"
                            class="form-input" placeholder="https://linkedin.com/company/...">
                    </div>
                    <div>
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="url" id="youtube" name="youtube" value="{{ old('youtube', $settings->youtube) }}"
                            class="form-input" placeholder="https://youtube.com/@...">
                    </div>
                    <div>
                        <label for="whatsapp" class="form-label">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}"
                            class="form-input" placeholder="+1234567890">
                    </div>
                </div>
            </div>

            <button type="submit" class="px-6 py-3 rounded-lg btn-primary text-white font-medium">Save Settings</button>
        </form>
    </div>
@endsection