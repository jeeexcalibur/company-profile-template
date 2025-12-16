@extends('admin.layouts.app')

@section('title', 'Services')
@section('subtitle', 'Manage your company services')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div></div>
        <a href="{{ route('admin.services.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg btn-primary text-white font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Service
        </a>
    </div>

    <div class="table-container overflow-hidden">
        <table class="w-full">
            <thead class="table-header">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Service</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-4 text-right text-xs font-medium text-white/50 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($services as $service)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($service->image)
                                    <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                        class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-primary-500/20 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="text-white font-medium">{{ $service->title }}</p>
                                    <p class="text-white/50 text-sm line-clamp-1">{{ Str::limit($service->description, 50) }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-white/70">{{ $service->icon ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($service->is_active)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Active</span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500/20 text-gray-400">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($service->is_featured)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-500/20 text-primary-400">Featured</span>
                            @else
                                <span class="text-white/30">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.services.edit', $service) }}"
                                    class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-white/50">
                            No services found. <a href="{{ route('admin.services.create') }}"
                                class="text-primary-400 hover:underline">Add your first service</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
        <div class="mt-6">
            {{ $services->links() }}
        </div>
    @endif
@endsection