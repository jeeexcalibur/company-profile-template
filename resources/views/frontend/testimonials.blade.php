@extends('frontend.layouts.app')

@section('title', 'Testimonials - ' . ($settings->company_name ?? 'Company'))

@section('content')
    <!-- Page Header -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Client Testimonials</h1>
                <p class="text-white/60 max-w-2xl mx-auto">See what our clients have to say about working with us.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($testimonials as $index => $testimonial)
                    <div class="glass rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-white/20' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        <!-- Quote -->
                        <blockquote class="text-white/80 leading-relaxed mb-6">
                            "{{ $testimonial->content }}"
                        </blockquote>

                        <!-- Client Info -->
                        <div class="flex items-center gap-4 pt-6 border-t border-white/10">
                            @if($testimonial->client_photo_url)
                                <img src="{{ $testimonial->client_photo_url }}" alt="{{ $testimonial->client_name }}"
                                    class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 rounded-full gradient-primary flex items-center justify-center">
                                    <span class="text-white font-semibold">{{ substr($testimonial->client_name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div>
                                <p class="text-white font-semibold">{{ $testimonial->client_name }}</p>
                                <p class="text-white/50 text-sm">
                                    {{ $testimonial->client_position }}
                                    @if($testimonial->client_company)
                                        <span class="text-primary-400">@ {{ $testimonial->client_company }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-white/50">No testimonials to display yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-12 text-center" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Ready to Join Our Happy Clients?</h2>
                <p class="text-white/70 max-w-xl mx-auto mb-8">Let's discuss how we can help you achieve your goals.</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                    Start Your Project
                </a>
            </div>
        </div>
    </section>
@endsection