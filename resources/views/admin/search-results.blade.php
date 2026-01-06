@extends('admin.layouts.app')

@section('title', 'Search Results | Admin Dashboard')

@section('header-title', 'Search Results')
@section('header-subtitle', 'Results for: ' . $query)

@section('content')
    <!-- Back Link -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Dashboard
        </a>
    </div>

    @if ($searchResults->count() > 0)
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                <h3 class="text-lg font-semibold text-gray-900">Results</h3>
                <p class="text-sm text-gray-600 mt-1">Found {{ $searchResults->count() }} results for
                    "<strong>{{ $query }}</strong>"</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Type</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Details</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Date</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($searchResults as $result)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $result->Name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-medium">
                                        {{ $result->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $result->detail ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ isset($result->created_at) ? $result->created_at->format('M d, Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ $result->route }}"
                                        class="inline-flex items-center gap-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No results found</h3>
            <p class="text-gray-500 mb-6">No contacts, sponsors, speakers, or committees match your search.</p>
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Dashboard
            </a>
        </div>
    @endif
@endsection
