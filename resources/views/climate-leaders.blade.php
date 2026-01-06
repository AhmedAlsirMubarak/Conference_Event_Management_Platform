@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100">
        <!-- Hero Section -->
        <div class="bg-gray-900 text-white py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('climate_leaders.title') }}</h1>
                    <p class="text-lg text-gray-300">{{ __('climate_leaders.subtitle') }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Description Section -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="md:col-span-3">
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        {{ __('climate_leaders.description') }}
                    </p>
                </div>
            </div>

            <!-- Leaders Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- This section will be populated with dynamic content -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-linear-to-r from-blue-500 to-blue-600 h-32"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('climate_leaders.leader_placeholder') }}</h3>
                        <p class="text-gray-600 mb-4">{{ __('climate_leaders.coming_soon') }}</p>
                        <div class="flex items-center text-blue-600 font-semibold">
                            <span>{{ __('climate_leaders.learn_more') }}</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="bg-blue-600 rounded-lg shadow-lg p-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">{{ __('climate_leaders.cta_title') }}</h2>
                <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
                    {{ __('climate_leaders.cta_description') }}
                </p>
                <a href="#"
                    class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    {{ __('climate_leaders.cta_button') }}
                </a>
            </div>
        </div>
    </div>
@endsection