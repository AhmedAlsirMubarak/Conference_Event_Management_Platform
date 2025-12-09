@extends('user.layouts.app')

@section('title', $speaker->name . ' | Strategic Speaker')

@section('header-title', 'Speaker Details')
@section('header-subtitle', 'View speaker information')

@section('content')
    <div class="w-full">
        <a href="{{ route('user.strategic_speakers.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Speakers
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-3 gap-6 p-6">
                <!-- Left: Photo Section -->
                <div>
                    <div class="h-40 bg-gray-100 flex items-center justify-center rounded-lg">
                        @if ($speaker->photo)
                            <img src="/storage/{{ $speaker->photo }}" alt="{{ $speaker->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>
                    @if ($speaker->logo)
                        <div class="mt-4">
                            <label class="text-xs font-medium text-gray-500 uppercase">Logo</label>
                            <div class="mt-2 w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                                <img src="/storage/{{ $speaker->logo }}" alt="Logo" class="max-w-[90px] h-full object-contain">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right: Info Section -->
                <div class="col-span-2 space-y-3">
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Name</label>
                        <p class="text-xl font-bold text-gray-900 mt-1">{{ $speaker->name }}</p>
                    </div>
                    @if ($speaker->title)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Title</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $speaker->title }}</p>
                        </div>
                    @endif
                    @if ($speaker->company)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Company</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $speaker->company }}</p>
                        </div>
                    @endif
                    @if ($speaker->bio)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Biography</label>
                            <p class="text-gray-600 mt-1 text-sm whitespace-pre-wrap">{{ $speaker->bio }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection