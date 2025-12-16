@extends('frontend.layouts.app')

@section('title', $settings->company_name ?? 'Home')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-accent-500/20 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                @if($hero->subtitle ?? false)
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-primary-500/10 text-primary-400 text-sm font-medium mb-6">
                        <span class="w-2 h-2 bg-primary-400 rounded-full mr-2 animate-pulse"></span>
                        {{ $hero->subtitle }}
                    </span>
                @endif
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    {!! preg_replace('/(\w+)$/i', '<span class="gradient-text">$1</span>', $hero->title ?? 'Build Your Digital Presence') !!}
                </h1>
                
                @if($hero->description ?? false)
                    <p class="text-lg text-white/70 mb-8 max-w-xl">{{ $hero->description }}</p>
                @endif
                
                <div class="flex flex-wrap gap-4">
                    @if($hero->button_text ?? false)
                        <a href="{{ $hero->button_link ?? '#' }}" class="px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transform hover:-translate-y-1 transition-all duration-300">
                            {{ $hero->button_text }}
                        </a>
                    @endif
                    @if($hero->button_text_secondary ?? false)
                        <a href="{{ $hero->button_link_secondary ?? '#' }}" class="px-8 py-4 rounded-xl glass text-white font-semibold hover:bg-white/20 transition-all duration-300">
                            {{ $hero->button_text_secondary }}
                        </a>
                    @endif
                </div>
            </div>
            
            <div data-aos="fade-left" class="hidden lg:block">
                <div class="relative">
                    @if($hero->foreground_image_url ?? false)
                        <img src="{{ $hero->foreground_image_url }}" alt="Hero" class="relative z-10 animate-float">
                    @else
                        <!-- Default Hero Illustration -->
                        <div class="glass rounded-3xl p-8 relative">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-4">
                                    <div class="h-24 rounded-xl bg-gradient-to-br from-primary-500/30 to-primary-600/30 animate-pulse"></div>
                                    <div class="h-32 rounded-xl bg-gradient-to-br from-accent-500/30 to-accent-600/30 animate-pulse" style="animation-delay: 0.5s;"></div>
                                </div>
                                <div class="space-y-4 pt-8">
                                    <div class="h-32 rounded-xl bg-gradient-to-br from-purple-500/30 to-purple-600/30 animate-pulse" style="animation-delay: 1s;"></div>
                                    <div class="h-24 rounded-xl bg-gradient-to-br from-blue-500/30 to-blue-600/30 animate-pulse" style="animation-delay: 1.5s;"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
@if($services->count() > 0)
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Services</h2>
            <p class="text-white/60 max-w-2xl mx-auto">Comprehensive solutions tailored to transform your digital presence and drive business growth.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
                <div class="glass rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-6">
                        @include('frontend.partials.icon', ['icon' => $service->icon ?? 'code'])
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">{{ $service->title }}</h3>
                    <p class="text-white/60 mb-4">{{ Str::limit($service->description, 120) }}</p>
                    <a href="{{ route('services') }}" class="inline-flex items-center text-primary-400 hover:text-primary-300 font-medium">
                        Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- About Preview -->
@if($about)
<section class="py-24 relative">
    <div class="absolute inset-0">
        <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                @if($about->image_url)
                    <img src="{{ $about->image_url }}" alt="About" class="rounded-3xl shadow-2xl">
                @else
                    <div class="glass rounded-3xl aspect-square flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-24 h-24 mx-auto rounded-full gradient-primary flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <p class="text-white/60">About Us Image</p>
                        </div>
                    </div>
                @endif
            </div>
            
            <div data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ $about->title }}</h2>
                <p class="text-white/70 mb-8 leading-relaxed">{{ Str::limit($about->content, 300) }}</p>
                
                @if($about->years_experience || $about->projects_completed || $about->happy_clients)
                <div class="grid grid-cols-3 gap-6 mb-8">
                    @if($about->years_experience)
                    <div>
                        <p class="text-3xl font-bold gradient-text">{{ $about->years_experience }}+</p>
                        <p class="text-white/60 text-sm">Years Experience</p>
                    </div>
                    @endif
                    @if($about->projects_completed)
                    <div>
                        <p class="text-3xl font-bold gradient-text">{{ $about->projects_completed }}+</p>
                        <p class="text-white/60 text-sm">Projects Done</p>
                    </div>
                    @endif
                    @if($about->happy_clients)
                    <div>
                        <p class="text-3xl font-bold gradient-text">{{ $about->happy_clients }}+</p>
                        <p class="text-white/60 text-sm">Happy Clients</p>
                    </div>
                    @endif
                </div>
                @endif
                
                <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                    Learn More About Us
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Portfolio Preview -->
@if($portfolios->count() > 0)
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Work</h2>
            <p class="text-white/60 max-w-2xl mx-auto">Explore some of our recent projects and see how we help businesses succeed.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $index => $portfolio)
                <div class="group relative overflow-hidden rounded-2xl" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    @if($portfolio->image_url)
                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-72 bg-gradient-to-br from-primary-500/30 to-accent-500/30"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            @if($portfolio->category)
                                <span class="text-primary-400 text-sm font-medium">{{ $portfolio->category }}</span>
                            @endif
                            <h3 class="text-xl font-semibold text-white">{{ $portfolio->title }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center px-8 py-4 rounded-xl glass text-white font-semibold hover:bg-white/20 transition-all">
                View All Projects
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Preview -->
@if($testimonials->count() > 0)
<section class="py-24 relative">
    <div class="absolute inset-0">
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-accent-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">What Our Clients Say</h2>
            <p class="text-white/60 max-w-2xl mx-auto">Don't just take our word for it — hear from some of our satisfied clients.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testimonial)
                <div class="glass rounded-2xl p-8" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-white/80 mb-6 leading-relaxed">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center gap-4">
                        @if($testimonial->client_photo_url)
                            <img src="{{ $testimonial->client_photo_url }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 rounded-full gradient-primary flex items-center justify-center">
                                <span class="text-white font-semibold">{{ substr($testimonial->client_name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <p class="text-white font-semibold">{{ $testimonial->client_name }}</p>
                            <p class="text-white/50 text-sm">{{ $testimonial->client_position }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass rounded-3xl p-12 md:p-16 text-center relative overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 gradient-primary opacity-10"></div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Project?</h2>
                <p class="text-white/70 max-w-2xl mx-auto mb-8">Let's work together to bring your vision to life. Get in touch with us today.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transform hover:-translate-y-1 transition-all duration-300">
                    Get In Touch
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
