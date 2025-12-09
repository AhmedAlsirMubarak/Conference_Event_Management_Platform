@extends('user.layouts.app')

@section('title', $member->name . ' | Technical Committee')

@section('header-title', 'Member Details')
@section('header-subtitle', 'View member information')

@section('content')

    <div class="w-full">
        <a href="{{ route('user.technical_committees.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Members
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-3 gap-6 p-6">
                <!-- Left: Photo Section -->
                <div>
                    <div class="h-40 bg-gray-100 flex items-center justify-center rounded-lg">
                        @if ($member->photo)
                            <img src="/storage/{{ $member->photo }}" alt="{{ $member->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>

                    <!-- Logo Section -->
                    @if ($member->logo)
                        <div class="mt-4">
                            <label class="text-xs font-medium text-gray-500 uppercase">Logo</label>
                            <div class="mt-2 w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                                <img src="/storage/{{ $member->logo }}" alt="Logo" class="max-w-[90px] h-full object-contain">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right: Info Section -->
                <div class="col-span-2 space-y-3">
                    <!-- Name -->
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Name</label>
                        <p class="text-xl font-bold text-gray-900 mt-1">{{ $member->name }}</p>
                    </div>

                    <!-- Title -->
                    @if ($member->title)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Title</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $member->title }}</p>
                        </div>
                    @endif

                    <!-- Company -->
                    @if ($member->company)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Company</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $member->company }}</p>
                        </div>
                    @endif

                    <!-- Bio -->
                    @if ($member->bio)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Biography</label>
                            <p class="text-gray-600 mt-1 text-sm whitespace-pre-wrap line-clamp-3">{{ $member->bio }}</p>
                        </div>
                    @endif

                    <!-- Back Button -->
                    <div class="pt-3 border-t border-gray-200">
                        <a href="{{ route('user.technical_committees.index') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back to Members
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection