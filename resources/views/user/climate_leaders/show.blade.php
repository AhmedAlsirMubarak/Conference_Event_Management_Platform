@extends('user.layouts.app')

@section('title', $climateLeader->fullname . ' | Climate Leaders')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="{{ route('user.climate-leaders.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-white hover:bg-gray-100 text-gray-700 rounded-lg font-medium transition-colors border border-gray-200 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Leaders
            </a>

            <!-- Leader Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header Banner -->
                <div class="h-48 bg-linear-to-r from-green-400 via-blue-500 to-purple-600"></div>

                <!-- Content -->
                <div class="px-6 py-8 md:px-10">
                    <!-- Header with Avatar -->
                    <div class="flex flex-col md:flex-row gap-8 mb-10">
                        <!-- Avatar -->
                        <div class="flex justify-center md:justify-start">
                            <div
                                class="w-32 h-32 bg-linear-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-5xl border-4 border-white -mt-20">
                                {{ strtoupper(substr($climateLeader->fullname, 0, 1)) }}
                            </div>
                        </div>

                        <!-- Name and Basic Info -->
                        <div class="flex-1 flex flex-col justify-center">
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $climateLeader->fullname }}</h1>
                            <p class="text-xl text-gray-600 mb-4">{{ $climateLeader->organization }}</p>

                            <!-- Contact Actions -->
                            <div class="flex flex-wrap gap-3">
                                <a href="mailto:{{ $climateLeader->email }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Email
                                </a>
                                <a href="tel:{{ $climateLeader->phone }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    Call
                                </a>
                                @if ($climateLeader->linkedin_profile)
                                    <a href="{{ $climateLeader->linkedin_profile }}" target="_blank"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg font-medium transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z" />
                                        </svg>
                                        LinkedIn
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Quick Info Grid -->
                    <div class="grid md:grid-cols-2 gap-6 mb-10 pb-10 border-b border-gray-200">
                        <!-- Contact Information -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Contact Information
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Email</p>
                                    <a href="mailto:{{ $climateLeader->email }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium mt-1 block break-all">
                                        {{ $climateLeader->email }}
                                    </a>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Phone</p>
                                    <a href="tel:{{ $climateLeader->phone }}" class="text-gray-900 font-medium mt-1 block">
                                        {{ $climateLeader->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Location</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Country of
                                        Nationality</p>
                                    <p class="text-gray-900 font-medium mt-1">{{ $climateLeader->Country_of_Nationality }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Country of
                                        Residence</p>
                                    <p class="text-gray-900 font-medium mt-1">{{ $climateLeader->Country_of_Residence }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biography Section -->
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">About</h2>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                            {{ $climateLeader->bio }}
                        </div>
                    </div>

                    <!-- Notes Section -->
                    @if ($climateLeader->notes)
                        <div class="mt-10 pt-8 border-t border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Notes</h3>
                            <div class="bg-gray-50 rounded-lg p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">
                                {{ $climateLeader->notes }}
                            </div>
                            @if ($climateLeader->last_reviewed_at)
                                <p class="text-xs text-gray-500 mt-3">Last reviewed
                                    {{ $climateLeader->last_reviewed_at->diffForHumans() }}
                                </p>
                            @endif
                        </div>
                    @endif

                    <!-- Metadata -->
                    <div class="mt-10 pt-6 border-t border-gray-200 text-xs text-gray-500">
                        <p>Member since {{ $climateLeader->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Related Leaders Section -->
            @php
                $relatedLeaders = \App\Models\ClimateLeaders::where('Country_of_Residence', $climateLeader->Country_of_Residence)
                    ->where('id', '!=', $climateLeader->id)
                    ->take(3)
                    ->get();
            @endphp

            @if ($relatedLeaders->count() > 0)
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Other Leaders from
                        {{ $climateLeader->Country_of_Residence }}
                    </h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($relatedLeaders as $relatedLeader)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                <div class="h-24 bg-linear-to-r from-green-400 to-blue-500"></div>
                                <div class="p-4 -mt-8 relative z-10">
                                    <div
                                        class="w-16 h-16 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg mb-3 mx-auto border-4 border-white">
                                        {{ strtoupper(substr($relatedLeader->fullname, 0, 1)) }}
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 text-center mb-1">{{ $relatedLeader->fullname }}</h3>
                                    <p class="text-sm text-gray-600 text-center mb-4">
                                        {{ Str::limit($relatedLeader->organization, 30) }}
                                    </p>
                                    <a href="{{ route('user.climate-leaders.show', $relatedLeader->id) }}"
                                        class="block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors text-sm">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
