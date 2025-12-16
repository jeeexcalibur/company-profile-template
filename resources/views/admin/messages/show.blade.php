@extends('admin.layouts.app')

@section('title', 'View Message')
@section('subtitle', 'From ' . $message->name)

@section('content')
    <div class="max-w-3xl">
        <div class="admin-card p-6 mb-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full gradient-primary flex items-center justify-center">
                        <span class="text-white text-xl font-semibold">{{ substr($message->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white">{{ $message->name }}</h3>
                        <p class="text-white/60">{{ $message->email }}</p>
                        @if($message->phone)
                            <p class="text-white/40 text-sm">{{ $message->phone }}</p>
                        @endif
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-white/50 text-sm">{{ $message->created_at->format('M d, Y') }}</p>
                    <p class="text-white/30 text-sm">{{ $message->created_at->format('h:i A') }}</p>
                </div>
            </div>

            @if($message->subject)
                <div class="mb-4">
                    <span class="text-white/50 text-sm">Subject:</span>
                    <p class="text-white font-medium">{{ $message->subject }}</p>
                </div>
            @endif

            <div class="border-t border-white/10 pt-4">
                <p class="text-white/80 leading-relaxed whitespace-pre-line">{{ $message->message }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            @if(!$message->is_replied)
                <form method="POST" action="{{ route('admin.messages.replied', $message) }}">
                    @csrf
                    <button type="submit" class="px-6 py-3 rounded-lg btn-primary text-white font-medium">
                        Mark as Replied
                    </button>
                </form>
            @else
                <span class="px-4 py-2 rounded-lg bg-green-500/20 text-green-400">
                    Replied on {{ $message->replied_at->format('M d, Y') }}
                </span>
            @endif

            <a href="mailto:{{ $message->email }}"
                class="px-6 py-3 rounded-lg glass text-white font-medium hover:bg-white/10 transition-colors">
                Send Email
            </a>

            <a href="{{ route('admin.messages.index') }}"
                class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10 hover:text-white transition-colors font-medium">
                Back to Messages
            </a>
        </div>
    </div>
@endsection