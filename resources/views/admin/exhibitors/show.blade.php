@extends('admin.layouts.app')

@section('title', $exhibitor->name . ' | Exhibitors')

@section('header-title', 'Exhibitor Details')
@section('header-subtitle', 'View exhibitor information')

@section('content')
    <div class="w-full">
        <a href="{{ route('exhibitors.index') }}"
            class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 mb-4 sm:mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-sm sm:text-base transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="hidden sm:inline">Back to Exhibitors</span>
            <span class="sm:hidden">Back</span>
        </a>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 p-4 sm:p-6">
                <!-- Left: Logo Section -->
                <div>
                    <div class="h-32 bg-gray-100 flex items-center justify-center rounded-lg">
                        @if ($exhibitor->logo)
                            <img src="{{ asset($exhibitor->logo) }}" alt="{{ $exhibitor->name }}"
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
                <div class="sm:col-span-2 space-y-4">
                    <!-- Name -->
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Name</label>
                        <p class="text-xl font-bold text-gray-900 mt-1">{{ $exhibitor->name }}</p>
                    </div>

                    <!-- Website -->
                    @if ($exhibitor->website)
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Website</label>
                            <p class="mt-1">
                                <a href="{{ $exhibitor->website }}" target="_blank"
                                    class="text-sm text-blue-600 hover:text-blue-800 break-all">
                                    {{ $exhibitor->website }}
                                </a>
                            </p>
                        </div>
                    @endif

                    <!-- Timestamps -->
                    <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-200">
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Created</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $exhibitor->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-medium text-gray-500 uppercase">Updated</label>
                            <p class="text-gray-900 mt-1 text-sm">{{ $exhibitor->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center gap-3 pt-3 border-t border-gray-200">
                        <a href="{{ route('exhibitors.edit', $exhibitor->id) }}"
                            class="w-full sm:flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('exhibitors.destroy', $exhibitor->id) }}" method="POST"
                            class="w-full sm:flex-1" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium text-sm transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    </div>
@endsection