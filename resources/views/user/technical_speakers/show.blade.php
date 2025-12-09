@extends('user.layouts.app')

@section('title', $speaker->name . ' | Technical Speaker')

@section('header-title', 'Speaker Details')
@section('header-subtitle', 'View speaker information')

@section('content')
    <div class="w-full max-w-4xl">
        <a href="{{ route('user.technical_speakers.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Speakers
        </a>

        <!-- Main Card -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <!-- Header with Background -->
            <div class="bg-linear-to-r from-indigo-50 to-purple-50 px-8 py-8">
                <div class="flex items-start gap-6">
                    <!-- Photo -->
                    <div class="shrink-0">
                        <div class="w-32 h-32 bg-white rounded-xl border-2 border-indigo-200 flex items-center justify-center overflow-hidden shadow-md">
                            @if ($speaker->photo)
                                <img src="/storage/{{ $speaker->photo }}" alt="{{ $speaker->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $speaker->name }}</h1>
                        @if ($speaker->title)
                            <p class="text-lg text-indigo-600 font-semibold mb-1">{{ $speaker->title }}</p>
                        @endif
                        @if ($speaker->company)
                            <p class="text-gray-600">{{ $speaker->company }}</p>
                        @endif
                    </div>

                    <!-- Logo -->
                    @if ($speaker->logo)
                        <div class="shrink-0 text-center">
                            <p class="text-xs font-medium text-gray-500 uppercase mb-2">Company Logo</p>
                            <div class="w-24 h-24 bg-white rounded-lg border border-gray-200 flex items-center justify-center">
                                <img src="/storage/{{ $speaker->logo }}" alt="Logo" class="max-w-[90%] h-auto object-contain">
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content -->
            <div class="px-8 py-6 space-y-6">
                <!-- Bio -->
                @if ($speaker->bio)
                    <div>
                        <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-3">Biography</h2>
                        <p class="text-gray-600 leading-relaxed whitespace-pre-wrap">{{ $speaker->bio }}</p>
                    </div>
                @endif

                <!-- Metadata -->
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase mb-1">Created</p>
                        <p class="text-sm text-gray-900">{{ $speaker->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase mb-1">Last Updated</p>
                        <p class="text-sm text-gray-900">{{ $speaker->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection