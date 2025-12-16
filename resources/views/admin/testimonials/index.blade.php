@extends('admin.layouts.app')

@section('title', 'Testimonials')
@section('subtitle', 'Manage client testimonials')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg btn-primary text-white font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Testimonial
    </a>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($testimonials as $testimonial)
        <div class="admin-card p-6 hover-lift">
            <div class="flex items-center gap-1 mb-4">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            
            <p class="text-white/70 text-sm mb-4 line-clamp-3">"{{ $testimonial->content }}"</p>
            
            <div class="flex items-center gap-3">
                @if($testimonial->client_photo_url)
                    <img src="{{ $testimonial->client_photo_url }}" alt="{{ $testimonial->client_name }}" class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 rounded-full gradient-primary flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">{{ substr($testimonial->client_name, 0, 1) }}</span>
                    </div>
                @endif
                <div>
                    <p class="text-white font-medium text-sm">{{ $testimonial->client_name }}</p>
                    <p class="text-white/50 text-xs">{{ $testimonial->client_position }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}</p>
                </div>
            </div>
            
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-white/10">
                <div class="flex items-center gap-2">
                    @if($testimonial->is_featured)
                        <span class="px-2 py-0.5 rounded-full text-xs bg-primary-500/20 text-primary-400">Featured</span>
                    @endif
                    @if($testimonial->is_active)
                        <span class="px-2 py-0.5 rounded-full text-xs bg-green-500/20 text-green-400">Active</span>
                    @else
                        <span class="px-2 py-0.5 rounded-full text-xs bg-gray-500/20 text-gray-400">Inactive</span>
                    @endif
                </div>
                <div class="flex items-center gap-1">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-white/70 hover:text-red-400 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 text-white/50">
            No testimonials found. <a href="{{ route('admin.testimonials.create') }}" class="text-primary-400 hover:underline">Add your first testimonial</a>
        </div>
    @endforelse
</div>

@if($testimonials->hasPages())
    <div class="mt-6">{{ $testimonials->links() }}</div>
@endif
@endsection
