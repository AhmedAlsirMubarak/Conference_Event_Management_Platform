@extends('user.layouts.app')

@section('title', 'Sponsor Submissions | User Dashboard')

@section('header-title', 'Sponsor Submissions')
@section('header-subtitle', 'View your Sponsor Submissions')

@section('content')
    <div class="flex flex-col">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">My Sponsor Submissions</h3>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($submissions) }} submissions</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('user.sponsor-submissions.exportExcel') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export to Excel
                </a>
                <a href="{{ route('user.dashboard') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <form method="GET" action="{{ route('user.sponsor-submissions.search') }}"
                class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 relative">
                    <input type="text" name="q" placeholder="Search by name, email, organization, or country..."
                        value="{{ isset($searchQuery) ? $searchQuery : '' }}"
                        class="w-full px-4 py-2 sm:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-base sm:text-sm" />
                    <svg class="absolute right-3 top-2.5 sm:top-2.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="flex gap-2 flex-col sm:flex-row">
                    <button type="submit"
                        class="w-full sm:w-auto px-4 sm:px-6 py-3 sm:py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg font-medium transition-colors whitespace-nowrap">
                        Search
                    </button>
                    @if (isset($searchQuery))
                        <a href="{{ route('user.sponsor-submissions.index') }}"
                            class="w-full sm:w-auto text-center px-4 sm:px-6 py-3 sm:py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors whitespace-nowrap">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Submissions Table -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            @if ($submissions->isEmpty())
                <div class="p-8 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Sponsor Submissions yet</h3>
                    <p class="text-gray-500">Your Sponsor Submissions will appear here.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Contact Person
                                </th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Email</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Phone</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Organization</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Country</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Website</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Submitted</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-900 whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($submissions as $submission)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-semibold text-xs shrink-0">
                                                {{ strtoupper(substr($submission->contact_person, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-medium text-gray-900 truncate">{{ $submission->contact_person }}
                                                </p>
                                                @if ($submission->job_title)
                                                    <p class="text-xs text-gray-500 truncate">{{ $submission->job_title }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="mailto:{{ $submission->email_address }}"
                                            class="text-blue-600 hover:text-blue-800 text-xs break-all">{{ $submission->email_address }}</a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="tel:{{ $submission->phone_number }}"
                                            class="text-gray-700 text-xs whitespace-nowrap">{{ $submission->phone_number }}</a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-gray-700 text-xs">{{ $submission->organization_name ?? '-' }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-gray-700 text-xs">{{ $submission->country ?? '-' }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ $submission->website }}" target="_blank" rel="noopener noreferrer"
                                            class="text-blue-600 hover:text-blue-800 text-xs truncate inline-block max-w-xs">
                                            {{ $submission->website ?? '-' }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-600 whitespace-nowrap">
                                        {{ $submission->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end gap-1">
                                            <a href="{{ route('user.sponsor-submissions.show', $submission->id) }}"
                                                class="inline-flex items-center gap-1 px-2 py-1 text-blue-600 hover:bg-blue-50 rounded transition-colors text-xs font-medium whitespace-nowrap">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
