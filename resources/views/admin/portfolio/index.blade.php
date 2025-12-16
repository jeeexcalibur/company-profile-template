@extends('admin.layouts.app')

@section('title', 'Portfolio')
@section('subtitle', 'Manage your portfolio items')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div></div>
        <a href="{{ route('admin.portfolio.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg btn-primary text-white font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Portfolio Item
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portfolios as $portfolio)
            <div class="admin-card overflow-hidden hover-lift">
                @if($portfolio->image_url)
                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover">
                @else
                    <div
                        class="w-full h-48 bg-gradient-to-br from-primary-500/30 to-accent-500/30 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                <div class="p-4">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            @if($portfolio->category)
                                <span class="text-primary-400 text-xs font-medium">{{ $portfolio->category }}</span>
                            @endif
                            <h3 class="text-white font-semibold">{{ $portfolio->title }}</h3>
                            @if($portfolio->client_name)
                                <p class="text-white/50 text-sm">{{ $portfolio->client_name }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-1">
                            @if($portfolio->is_featured)
                                <span class="px-2 py-0.5 rounded-full text-xs bg-primary-500/20 text-primary-400">Featured</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-2 mt-4 pt-4 border-t border-white/10">
                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                            class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" class="inline"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="p-2 rounded-lg hover:bg-red-500/10 text-white/70 hover:text-red-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-white/50">
                No portfolio items found. <a href="{{ route('admin.portfolio.create') }}"
                    class="text-primary-400 hover:underline">Add your first item</a>
            </div>
        @endforelse
    </div>

    @if($portfolios->hasPages())
        <div class="mt-6">{{ $portfolios->links() }}</div>
    @endif
@endsection