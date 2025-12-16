@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('subtitle', 'View and manage contact form submissions')

@section('content')
    <div class="mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.messages.index') }}"
                class="px-4 py-2 rounded-lg {{ !request('filter') ? 'gradient-primary text-white' : 'glass text-white/70 hover:text-white' }} transition-colors">
                All Messages
            </a>
            <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
                class="px-4 py-2 rounded-lg {{ request('filter') === 'unread' ? 'gradient-primary text-white' : 'glass text-white/70 hover:text-white' }} transition-colors">
                Unread
            </a>
            <a href="{{ route('admin.messages.index', ['filter' => 'unreplied']) }}"
                class="px-4 py-2 rounded-lg {{ request('filter') === 'unreplied' ? 'gradient-primary text-white' : 'glass text-white/70 hover:text-white' }} transition-colors">
                Unreplied
            </a>
        </div>
    </div>

    <div class="table-container overflow-hidden">
        <table class="w-full">
            <thead class="table-header">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">From</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-white/50 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-medium text-white/50 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($messages as $message)
                    <tr class="hover:bg-white/5 transition-colors {{ !$message->is_read ? 'bg-primary-500/5' : '' }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full gradient-primary flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-sm font-semibold">{{ substr($message->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <p class="text-white font-medium">{{ $message->name }}</p>
                                        @if(!$message->is_read)
                                            <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                                        @endif
                                    </div>
                                    <p class="text-white/50 text-sm">{{ $message->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white/80">{{ $message->subject ?? 'No subject' }}</p>
                            <p class="text-white/40 text-sm line-clamp-1">{{ Str::limit($message->message, 50) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($message->is_replied)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Replied</span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-white/50 text-sm">
                            {{ $message->created_at->format('M d, Y') }}<br>
                            <span class="text-white/30">{{ $message->created_at->format('h:i A') }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.messages.show', $message) }}"
                                    class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="inline"
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-white/50">
                            No messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
        <div class="mt-6">{{ $messages->links() }}</div>
    @endif
@endsection