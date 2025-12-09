@extends('user.layouts.app')

@section('title', 'Technical Committee | User Dashboard')

@section('header-title', 'Technical Committee')
@section('header-subtitle', 'Browse all technical committee members')

@section('content')
    <div class="flex flex-col">
        <!-- Search Bar -->
        <div class="mb-6">
            <form action="{{ route('user.technical_committees.index') }}" method="GET" class="flex gap-2 mb-4">
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
                    <a href="{{ route('user.technical_committees.index') }}"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg font-medium transition-colors">
                        Clear
                    </a>
                @endif
            </form>

            <h3 class="text-lg font-semibold text-gray-900">All Members</h3>
            <p class="text-sm text-gray-500 mt-1">Total: {{ count($members) }} members</p>
        </div>

        <!-- Members Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($members as $member)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <!-- Photo Section -->
                    <div class="h-32 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if ($member->photo)
                            <img src="/storage/{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-contain">
                        @else
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <!-- Name -->
                        <h3 class="text-lg font-semibold text-gray-900 mb-1 text-center">{{ $member->name }}</h3>

                        <!-- Title -->
                        @if ($member->title)
                            <p class="text-sm text-gray-600 mb-2 text-center">{{ $member->title }}</p>
                        @endif

                        <!-- Company -->
                        @if ($member->company)
                            <p class="text-sm text-gray-500 mb-3 text-center">{{ $member->company }}</p>
                        @endif

                        <!-- Logo -->
                        @if ($member->logo)
                            <div class="flex justify-center mb-4">
                                <img src="/storage/{{ $member->logo }}" alt="Logo" class="h-12 w-12 object-contain">
                            </div>
                        @endif

                        <!-- View Details Button -->
                        <div class="pt-4 border-t border-gray-200">
                            <a href="{{ route('user.technical_committees.show', $member->id) }}"
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
                                d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No members yet</h3>
                        <p class="text-gray-500">Check back soon for technical committee members.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection