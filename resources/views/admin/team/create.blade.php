@extends('admin.layouts.app')

@section('title', isset($member) ? 'Edit Team Member' : 'Add Team Member')
@section('subtitle', isset($member) ? 'Update member details' : 'Add a new team member')

@section('content')
    <div class="max-w-3xl">
        <form method="POST" action="{{ isset($member) ? route('admin.team.update', $member) : route('admin.team.store') }}"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($member)) @method('PUT') @endif

            <div class="admin-card p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="form-label">Name <span class="text-red-400">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $member->name ?? '') }}" required
                            class="form-input">
                    </div>
                    <div>
                        <label for="position" class="form-label">Position <span class="text-red-400">*</span></label>
                        <input type="text" id="position" name="position"
                            value="{{ old('position', $member->position ?? '') }}" required class="form-input"
                            placeholder="e.g., CEO, Developer">
                    </div>
                </div>

                <div>
                    <label for="bio" class="form-label">Bio</label>
                    <textarea id="bio" name="bio" rows="3"
                        class="form-input">{{ old('bio', $member->bio ?? '') }}</textarea>
                </div>

                <div>
                    <label for="photo" class="form-label">Photo</label>
                    @if(isset($member) && $member->photo)
                        <div class="mb-3">
                            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}"
                                class="w-24 h-24 rounded-full object-cover">
                        </div>
                    @endif
                    <input type="file" id="photo" name="photo" accept="image/*" class="form-input">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $member->email ?? '') }}"
                            class="form-input">
                    </div>
                    <div>
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone ?? '') }}"
                            class="form-input">
                    </div>
                </div>
            </div>

            <div class="admin-card p-6 space-y-6">
                <h3 class="text-lg font-semibold text-white">Social Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" id="facebook" name="facebook"
                            value="{{ old('facebook', $member->facebook ?? '') }}" class="form-input">
                    </div>
                    <div>
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $member->twitter ?? '') }}"
                            class="form-input">
                    </div>
                    <div>
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="url" id="instagram" name="instagram"
                            value="{{ old('instagram', $member->instagram ?? '') }}" class="form-input">
                    </div>
                    <div>
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin"
                            value="{{ old('linkedin', $member->linkedin ?? '') }}" class="form-input">
                    </div>
                </div>
            </div>

            <div class="admin-card p-6">
                <div class="flex items-center gap-6">
                    <div>
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $member->sort_order ?? 0) }}" class="form-input w-24">
                    </div>
                    <label class="flex items-center gap-2 cursor-pointer pt-6">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500">
                        <span class="text-white/80 text-sm">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="px-6 py-3 rounded-lg btn-primary text-white font-medium">{{ isset($member) ? 'Update' : 'Add' }}
                    Member</button>
                <a href="{{ route('admin.team.index') }}"
                    class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10 hover:text-white transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection