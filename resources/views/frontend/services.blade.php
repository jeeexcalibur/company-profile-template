@extends('frontend.layouts.app')

@section('title', 'Services - ' . ($settings->company_name ?? 'Company'))

@section('content')
    <!-- Page Header -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/4 right-0 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
                <p class="text-white/60 max-w-2xl mx-auto">Comprehensive solutions designed to help your business thrive in
                    the digital world.</p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div class="glass rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <div class="w-16 h-16 rounded-2xl gradient-primary flex items-center justify-center mb-6">
                            @include('frontend.partials.icon', ['icon' => $service->icon ?? 'code'])
                        </div>

                        <h3 class="text-xl font-semibold text-white mb-3">{{ $service->title }}</h3>
                        <p class="text-white/60 mb-6 leading-relaxed">{{ $service->description }}</p>

                        @if($service->features && count($service->features) > 0)
                            <ul class="space-y-2">
                                @foreach($service->features as $feature)
                                    @if($feature)
                                        <li class="flex items-center gap-2 text-white/70 text-sm">
                                            <svg class="w-5 h-5 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                        @if($service->is_featured)
                            <div class="mt-6 pt-6 border-t border-white/10">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary-500/20 text-primary-400">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    Featured
                                </span>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-white/50">No services available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-12 text-center relative overflow-hidden" data-aos="fade-up">
                <div class="absolute inset-0 gradient-primary opacity-10"></div>
                <div class="relative">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Need a Custom Solution?</h2>
                    <p class="text-white/70 max-w-xl mx-auto mb-8">Contact us to discuss your specific requirements and how
                        we can help.</p>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection