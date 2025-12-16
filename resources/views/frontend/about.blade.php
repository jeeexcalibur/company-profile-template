@extends('frontend.layouts.app')

@section('title', 'About Us - ' . ($settings->company_name ?? 'Company'))

@section('content')
    <!-- Page Header -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Us</h1>
                <p class="text-white/60 max-w-2xl mx-auto">Learn more about our story, mission, and the team behind our
                    success.</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    @if($about)
        <section class="pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
                    <div data-aos="fade-right">
                        @if($about->image_url)
                            <img src="{{ $about->image_url }}" alt="About" class="rounded-3xl shadow-2xl">
                        @else
                            <div class="glass rounded-3xl aspect-video flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full gradient-primary flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div data-aos="fade-left">
                        <h2 class="text-3xl font-bold text-white mb-6">{{ $about->title }}</h2>
                        <p class="text-white/70 leading-relaxed whitespace-pre-line">{{ $about->content }}</p>
                    </div>
                </div>

                <!-- Mission & Vision -->
                @if($about->mission_title || $about->vision_title)
                    <div class="grid md:grid-cols-2 gap-8 mb-24">
                        @if($about->mission_title)
                            <div class="glass rounded-2xl p-8" data-aos="fade-up">
                                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-6">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">{{ $about->mission_title }}</h3>
                                <p class="text-white/70 leading-relaxed">{{ $about->mission_content }}</p>
                            </div>
                        @endif

                        @if($about->vision_title)
                            <div class="glass rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-6">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">{{ $about->vision_title }}</h3>
                                <p class="text-white/70 leading-relaxed">{{ $about->vision_content }}</p>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Stats -->
                @if($about->years_experience || $about->projects_completed || $about->happy_clients || $about->team_members)
                    <div class="glass rounded-3xl p-8 md:p-12" data-aos="fade-up">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                            @if($about->years_experience)
                                <div>
                                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">{{ $about->years_experience }}+</p>
                                    <p class="text-white/60">Years Experience</p>
                                </div>
                            @endif
                            @if($about->projects_completed)
                                <div>
                                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">{{ $about->projects_completed }}+</p>
                                    <p class="text-white/60">Projects Completed</p>
                                </div>
                            @endif
                            @if($about->happy_clients)
                                <div>
                                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">{{ $about->happy_clients }}+</p>
                                    <p class="text-white/60">Happy Clients</p>
                                </div>
                            @endif
                            @if($about->team_members)
                                <div>
                                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">{{ $about->team_members }}+</p>
                                    <p class="text-white/60">Team Members</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Team Preview -->
    @if($team->count() > 0)
        <section class="py-24 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Meet Our Team</h2>
                    <p class="text-white/60 max-w-2xl mx-auto">The talented people behind our success.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($team as $index => $member)
                        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            @if($member->photo_url)
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}"
                                    class="w-32 h-32 mx-auto rounded-full object-cover mb-4 ring-4 ring-primary-500/30">
                            @else
                                <div
                                    class="w-32 h-32 mx-auto rounded-full gradient-primary flex items-center justify-center mb-4 ring-4 ring-primary-500/30">
                                    <span class="text-white text-3xl font-bold">{{ substr($member->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <h3 class="text-lg font-semibold text-white">{{ $member->name }}</h3>
                            <p class="text-primary-400 text-sm mb-3">{{ $member->position }}</p>
                            @if($member->has_social_links)
                                <div class="flex items-center justify-center gap-3">
                                    @if($member->linkedin)
                                        <a href="{{ $member->linkedin }}" target="_blank"
                                            class="text-white/40 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if($member->twitter)
                                        <a href="{{ $member->twitter }}" target="_blank"
                                            class="text-white/40 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('team') }}"
                        class="inline-flex items-center text-primary-400 hover:text-primary-300 font-medium">
                        View All Team Members
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endif
@endsection