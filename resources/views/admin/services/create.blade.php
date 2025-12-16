@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('subtitle', 'Create a new service')

@section('content')
    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="admin-card p-6 space-y-6">
                <div>
                    <label for="title" class="form-label">Service Title <span class="text-red-400">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-input"
                        placeholder="e.g., Web Development">
                </div>

                <div>
                    <label for="description" class="form-label">Description <span class="text-red-400">*</span></label>
                    <textarea id="description" name="description" rows="4" required class="form-input"
                        placeholder="Describe the service...">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="icon" class="form-label">Icon Name</label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon') }}" class="form-input"
                            placeholder="e.g., code, palette, cloud">
                        <p class="text-white/40 text-sm mt-1">Use icon names like: code, smartphone, palette, trending-up,
                            cloud, lightbulb</p>
                    </div>

                    <div>
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                            class="form-input" placeholder="0">
                    </div>
                </div>

                <div>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-input">
                </div>

                <div>
                    <label class="form-label">Features</label>
                    <div x-data="{ features: [''] }" class="space-y-2">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex gap-2">
                                <input type="text" :name="'features[' + index + ']'" x-model="features[index]"
                                    class="form-input flex-1" placeholder="Feature item">
                                <button type="button" @click="features.splice(index, 1)"
                                    class="px-3 py-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                    x-show="features.length > 1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="features.push('')"
                            class="text-primary-400 hover:text-primary-300 text-sm">+ Add another feature</button>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500 focus:ring-primary-500/20">
                        <span class="text-white/80 text-sm">Featured Service</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-primary-500 focus:ring-primary-500/20">
                        <span class="text-white/80 text-sm">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="px-6 py-3 rounded-lg btn-primary text-white font-medium">Create
                    Service</button>
                <a href="{{ route('admin.services.index') }}"
                    class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10 hover:text-white transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection