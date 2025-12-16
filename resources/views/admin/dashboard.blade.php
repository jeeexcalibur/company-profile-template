@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Welcome back, ' . auth()->user()->name)

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/50 text-sm">Total Services</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $stats['services'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-primary-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/50 text-sm">Team Members</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $stats['team_members'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/50 text-sm">Portfolio Items</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $stats['portfolios'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/50 text-sm">Unread Messages</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $stats['unread_messages'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-accent-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Quick Actions -->
        <div class="admin-card p-6">
            <h2 class="text-lg font-semibold text-white mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.services.create') }}"
                    class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors group">
                    <div
                        class="w-10 h-10 rounded-lg bg-primary-500/20 flex items-center justify-center group-hover:bg-primary-500/30 transition-colors">
                        <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-white/80 text-sm">Add Service</span>
                </a>
                <a href="{{ route('admin.team.create') }}"
                    class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors group">
                    <div
                        class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <span class="text-white/80 text-sm">Add Team Member</span>
                </a>
                <a href="{{ route('admin.portfolio.create') }}"
                    class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors group">
                    <div
                        class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-white/80 text-sm">Add Portfolio</span>
                </a>
                <a href="{{ route('admin.settings.edit') }}"
                    class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors group">
                    <div
                        class="w-10 h-10 rounded-lg bg-accent-500/20 flex items-center justify-center group-hover:bg-accent-500/30 transition-colors">
                        <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="text-white/80 text-sm">Edit Settings</span>
                </a>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="admin-card p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-white">Recent Messages</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-primary-400 hover:text-primary-300 text-sm">View
                    All</a>
            </div>
            <div class="space-y-4">
                @forelse($recentMessages as $message)
                    <a href="{{ route('admin.messages.show', $message) }}"
                        class="flex items-start gap-3 p-3 rounded-lg hover:bg-white/5 transition-colors">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-sm font-semibold">{{ substr($message->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="text-white font-medium text-sm truncate">{{ $message->name }}</p>
                                @if(!$message->is_read)
                                    <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                                @endif
                            </div>
                            <p class="text-white/50 text-xs truncate">{{ $message->subject ?? 'No subject' }}</p>
                            <p class="text-white/30 text-xs mt-1">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-white/50 text-center py-4">No messages yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection