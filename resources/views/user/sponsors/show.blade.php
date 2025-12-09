@extends('user.layouts.app')

@section('title', $sponsor->name . ' | Sponsors')

@section('header-title', 'Sponsor Details')
@section('header-subtitle', 'View sponsor information')

@section('content')
    <div class="w-full">
        <a href="{{ route('user.sponsors.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Sponsors
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-3 gap-6 p-6">
                <!-- Left: Logo Section -->
                <div>
                    <div class="h-32 bg-gray-100 flex items-center justify-center rounded-lg">
                        @if ($sponsor->logo)
                            <img src="/storage/{{ $sponsor->logo }}" alt="{{ $sponsor->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>
                </div>

                <!-- Right: Info Section -->
                <div class="col-span-2 space-y-3">
                    <!-- Name -->
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Name</label>
                        <p class="text-xl font-bold text-gray-900 mt-1">{{ $sponsor->name }}</p>
                    </div>

                    <!-- Category -->
                    @if ($sponsor->category)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Category</label>
                            <p class="mt-1">
                                <span
                                    class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                    {{ $sponsor->category }}
                                </span>
                            </p>
                        </div>
                    @endif

                    <!-- Website -->
                    @if ($sponsor->website)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Website</label>
                            <p class="mt-1">
                                <a href="{{ $sponsor->website }}" target="_blank"
                                    class="text-sm text-green-600 hover:text-green-800 break-all inline-flex items-center gap-2">
                                    {{ $sponsor->website }}
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m4-6h-2.5a2.5 2.5 0 01-2.5-2.5V4m0 0H8m4 0V2m0 0h2.5A2.5 2.5 0 0116 4.5V6" />
                                    </svg>
                                </a>
                            </p>
                        </div>
                    @endif

                    <!-- Timestamps -->
                    <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-200">
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Created</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $sponsor->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Updated</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $sponsor->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="pt-3 border-t border-gray-200">
                        <a href="{{ route('user.sponsors.index') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back to Sponsors
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection