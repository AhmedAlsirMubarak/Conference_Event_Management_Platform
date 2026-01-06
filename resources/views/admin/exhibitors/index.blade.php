@extends('admin.layouts.app')

@section('title', 'Exhibitors | Admin Dashboard')

@section('header-title', 'Exhibitors')
@section('header-subtitle', 'Manage all exhibitors')

@section('content')
    <div class="flex flex-col">
        <!-- Header with Add Button -->
        <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">All Exhibitors</h3>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($exhibitors) }} exhibitors</p>
            </div>
            <a href="{{ route('exhibitors.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Exhibitor
            </a>
        </div>

        <!-- Search Form -->
        <div class="mb-6">
            <form action="{{ route('exhibitors.search') }}" method="GET"
                class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                <input type="text" name="q" placeholder="Search exhibitors by name or website..."
                    value="{{ request('q', '') }}"
                    class="flex-1 w-full sm:w-auto pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit"
                    class="w-full sm:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                    Search
                </button>
                @if(request('q'))
                    <a href="{{ route('exhibitors.index') }}"
                        class="w-full sm:w-auto text-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Exhibitors Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($exhibitors as $exhibitor)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <!-- Logo Section -->
                    <div class="h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if ($exhibitor->logo)
                            <img src="{{ asset('storage/' . $exhibitor->logo) }}" alt="{{ $exhibitor->name }}"
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
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $exhibitor->name }}</h3>

                        @if ($exhibitor->website)
                            <p class="text-sm text-gray-600 mb-4">
                                <a href="{{ $exhibitor->website }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800 break-all">
                                    {{ $exhibitor->website }}
                                </a>
                            </p>
                        @endif

                        <!-- Actions -->
                        <div class="flex items-center gap-2 pt-4 border-t border-gray-200">
                            <a href="{{ route('exhibitors.show', $exhibitor->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                            <a href="{{ route('exhibitors.edit', $exhibitor->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors text-sm font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('exhibitors.destroy', $exhibitor->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Are you sure you want to delete this exhibitor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors text-sm font-medium">
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
            @empty
                <div class="col-span-full bg-white rounded-lg border border-gray-200 p-8 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No exhibitors yet</h3>
                    <p class="text-gray-500 mb-4">Start by adding your first exhibitor.</p>
                    <a href="{{ route('exhibitors.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Exhibitor
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection