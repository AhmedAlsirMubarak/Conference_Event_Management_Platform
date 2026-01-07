@extends('user.layouts.app')

@section('title', 'Strategic Speakers')

@section('header-title', 'Strategic Speakers')
@section('header-subtitle', 'View all strategic speakers')

@section('content')
    <div class="flex flex-col">
        <!-- Search Bar -->
        <div class="mb-6">
            <form action="{{ route('user.strategic_speakers.index') }}" method="GET" class="flex gap-2 mb-4">
                <input type="text" name="search" placeholder="Search by name, title, or company..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    value="{{ request('search') }}">
                <button type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                @if (request('search'))
                    <a href="{{ route('user.strategic_speakers.index') }}"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg font-medium transition-colors">
                        Clear
                    </a>
                @endif
            </form>

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">All Speakers</h3>
                    <p class="text-sm text-gray-500 mt-1">Total: {{ count($speakers) }} speakers</p>
                </div>
                <a href="{{ route('user.strategic_speakers.export') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export CSV
                </a>
            </div>
        </div>

        <!-- Speakers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($speakers as $speaker)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <!-- Photo Section -->
                    <div class="h-24 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if ($speaker->photo)
                            <img src="/{{ $speaker->photo }}" alt="{{ $speaker->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1 text-center">{{ $speaker->name }}</h3>
                        @if ($speaker->title)
                            <p class="text-sm text-gray-600 mb-2 text-center">{{ $speaker->title }}</p>
                        @endif
                        @if ($speaker->company)
                            <p class="text-sm text-gray-500 mb-3 text-center">{{ $speaker->company }}</p>
                        @endif
                        @if ($speaker->logo)
                            <div class="flex justify-center mb-4">
                                <img src="/storage/{{ $speaker->logo }}" alt="Logo" class="h-16 w-16 object-contain">
                            </div>
                        @endif
                        <div class="flex items-center gap-2 pt-4 border-t border-gray-200">
                            <a href="{{ route('user.strategic_speakers.show', $speaker->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No speakers found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try adjusting your search criteria.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection