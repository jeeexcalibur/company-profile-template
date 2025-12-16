@extends('frontend.layouts.app')

@section('title', 'Portfolio - ' . ($settings->company_name ?? 'Company'))

@section('content')
    <!-- Page Header -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/4 -right-20 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Portfolio</h1>
                <p class="text-white/60 max-w-2xl mx-auto">Explore our recent projects and see what we can do for you.</p>
            </div>
        </div>
    </section>

    <!-- Portfolio Filter & Grid -->
    <section class="pb-24" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Filter -->
            @if($categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
                    <button @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ? 'gradient-primary text-white' : 'glass text-white/70 hover:text-white'"
                        class="px-6 py-2 rounded-full font-medium transition-all">
                        All
                    </button>
                    @foreach($categories as $category)
                        <button @click="activeCategory = '{{ $category }}'"
                            :class="activeCategory === '{{ $category }}' ? 'gradient-primary text-white' : 'glass text-white/70 hover:text-white'"
                            class="px-6 py-2 rounded-full font-medium transition-all">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            @endif

            <!-- Portfolio Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portfolios as $index => $portfolio)
                    <div x-show="activeCategory === 'all' || activeCategory === '{{ $portfolio->category }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100" class="group" data-aos="fade-up"
                        data-aos-delay="{{ ($index % 3) * 100 }}">
                        <div class="glass rounded-2xl overflow-hidden hover-lift">
                            <div class="relative overflow-hidden">
                                @if($portfolio->image_url)
                                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                        class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div
                                        class="w-full h-64 bg-gradient-to-br from-primary-500/30 to-accent-500/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                @if($portfolio->project_url)
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                                        <a href="{{ $portfolio->project_url }}" target="_blank"
                                            class="px-6 py-2 rounded-full gradient-primary text-white text-sm font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            View Project
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                @if($portfolio->category)
                                    <span class="text-primary-400 text-sm font-medium">{{ $portfolio->category }}</span>
                                @endif
                                <h3 class="text-xl font-semibold text-white mt-1 mb-2">{{ $portfolio->title }}</h3>
                                @if($portfolio->description)
                                    <p class="text-white/60 text-sm line-clamp-2">{{ $portfolio->description }}</p>
                                @endif
                                @if($portfolio->client_name)
                                    <p class="text-white/40 text-sm mt-3">Client: {{ $portfolio->client_name }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-white/50">No portfolio items to display.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection