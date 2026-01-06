@extends('user.layouts.app')

@section('title', 'Sponsors | User Dashboard')

@section('header-title', 'Sponsors')
@section('header-subtitle', 'Browse all sponsors')

@section('content')
    <div class="flex flex-col">
        <!-- Header -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900">All Sponsors</h3>
            <p class="text-sm text-gray-500 mt-1">Total: {{ count($sponsors) }} sponsors</p>
        </div>

        <!-- Search Form -->
        <div class="mb-6">
            <form action="{{ route('user.sponsors.search') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="q" placeholder="Search sponsors by name, category, or website..."
                    value="{{ request('q', '') }}"
                    class="flex-1 pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <button type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-colors">
                    Search
                </button>
                @if(request('q'))
                    <a href="{{ route('user.sponsors.index') }}"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Sponsors Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($sponsors as $sponsor)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <!-- Logo Section -->
                    <div class="h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if ($sponsor->logo)
                            <img src="{{ asset('storage/uploads/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}"
                                class="max-w-[150px] h-full object-contain">
                        @else
                            <div class="text-gray-400 text-center">
                                <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm">No logo</p>
                            </div>
                        @endif
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $sponsor->name }}</h3>

                        @if ($sponsor->category)
                            <div class="mb-3">
                                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-medium">
                                    {{ $sponsor->category }}
                                </span>
                            </div>
                        @endif

                        @if ($sponsor->website)
                            <p class="text-sm text-gray-600 mb-4">
                                <a href="{{ $sponsor->website }}" target="_blank"
                                    class="text-green-600 hover:text-green-800 break-all">
                                    Visit Website
                                </a>
                            </p>
                        @endif

                        <!-- View Button -->
                        <div class="pt-4 border-t border-gray-200">
                            <a href="{{ route('user.sponsors.show', $sponsor->id) }}"
                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No sponsors yet</h3>
                        <p class="text-gray-500">Check back soon for sponsor information.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
