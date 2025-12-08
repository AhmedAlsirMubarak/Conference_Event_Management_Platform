@extends('admin.layouts.app')

@section('title', $sponsor->name . ' | Sponsors')

@section('header-title', 'Sponsor Details')
@section('header-subtitle', 'View sponsor information')

@section('content')
    <div class="max-w-sm">
        <a href="{{ route('sponsors.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Sponsors
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Logo Section -->
            <div class="h-35 bg-gray-100 flex items-center justify-center">
                @if ($sponsor->logo)
                    <img src="/storage/{{ $sponsor->logo }}" alt="{{ $sponsor->name }}"
                        class="w-full h-10 object-contain">
                @else
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                @endif
            </div>

            <!-- Content Section -->
            <div class="p-8 space-y-6">
                <!-- Name -->
                <div>
                    <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Sponsor Name</label>
                    <p class="text-2xl font-bold text-gray-900 mt-2">{{ $sponsor->name }}</p>
                </div>

                <!-- Category -->
                @if ($sponsor->category)
                    <div>
                        <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Category</label>
                        <p class="mt-2">
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                {{ $sponsor->category }}
                            </span>
                        </p>
                    </div>
                @endif

                <!-- Website -->
                @if ($sponsor->website)
                    <div>
                        <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Website</label>
                        <p class="mt-2">
                            <a href="{{ $sponsor->website }}" target="_blank"
                                class="text-lg text-blue-600 hover:text-blue-800 break-all">
                                {{ $sponsor->website }}
                            </a>
                        </p>
                    </div>
                @endif

                <!-- Timestamps -->
                <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-200">
                    <div>
                        <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Created</label>
                        <p class="text-gray-900 mt-2">{{ $sponsor->created_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Updated</label>
                        <p class="text-gray-900 mt-2">{{ $sponsor->updated_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('sponsors.edit', $sponsor->id) }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('sponsors.destroy', $sponsor->id) }}" method="POST" class="flex-1"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection