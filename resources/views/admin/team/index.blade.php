@extends('admin.layouts.app')

@section('title', 'Team Members')
@section('subtitle', 'Manage your team')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div></div>
        <a href="{{ route('admin.team.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg btn-primary text-white font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Add Member
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($members as $member)
            <div class="admin-card p-6 hover-lift">
                <div class="flex items-start gap-4">
                    @if($member->photo)
                        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-16 h-16 rounded-full object-cover">
                    @else
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center">
                            <span class="text-white text-xl font-semibold">{{ substr($member->name, 0, 1) }}</span>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h3 class="text-white font-semibold truncate">{{ $member->name }}</h3>
                        <p class="text-primary-400 text-sm">{{ $member->position }}</p>
                        @if($member->is_active)
                            <span
                                class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full text-xs bg-green-500/20 text-green-400">Active</span>
                        @else
                            <span
                                class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full text-xs bg-gray-500/20 text-gray-400">Inactive</span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 mt-4 pt-4 border-t border-white/10">
                    <a href="{{ route('admin.team.edit', $member) }}"
                        class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('admin.team.destroy', $member) }}" class="inline"
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
        @empty
            <div class="col-span-full text-center py-12 text-white/50">
                No team members found. <a href="{{ route('admin.team.create') }}" class="text-primary-400 hover:underline">Add
                    your first team member</a>
            </div>
        @endforelse
    </div>

    @if($members->hasPages())
        <div class="mt-6">{{ $members->links() }}</div>
    @endif
@endsection