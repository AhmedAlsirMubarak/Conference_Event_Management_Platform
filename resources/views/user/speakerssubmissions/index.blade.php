@extends('user.layouts.app')

@section('title', 'Speaker Submissions | User Dashboard')

@section('header-title', 'Speaker Submissions')
@section('header-subtitle', 'View your speaker submissions')

@section('content')
    <div class="flex flex-col">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">My Speaker Submissions</h3>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($submissions) }} submissions</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('user.speaker-submissions.exportExcel') }}"
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
            <form method="GET" action="{{ route('user.speaker-submissions.search') }}"
                class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 relative">
                    <input type="text" name="q" placeholder="Search by name, email, organization, or country..."
                        value="{{ isset($searchQuery) ? $searchQuery : '' }}"
                        class="w-full px-4 py-2 sm:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-base sm:text-sm" />
                    <svg class="absolute right-3 top-2.5 sm:top-2.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="flex gap-2 flex-col sm:flex-row">
                    <button type="submit"
                        class="w-full sm:w-auto px-4 sm:px-6 py-3 sm:py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors whitespace-nowrap">
                        Search
                    </button>
                    @if (isset($searchQuery))
                        <a href="{{ route('user.speaker-submissions.index') }}"
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
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No speaker submissions yet</h3>
                    <p class="text-gray-500">Your speaker submissions will appear here.</p>
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
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Notes</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap"></th>Submitted
                                </th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-900 whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($submissions as $submission)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-xs shrink-0">
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
                                        <span class="text-gray-700 text-xs whitespace-nowrap">{{ $submission->phone_number }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-gray-700 text-xs">{{ $submission->organization_name ?? '-' }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-gray-700 text-xs">{{ $submission->country ?? '-' }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="max-w-xs">
                                            @if($submission->notes)
                                                <p class="text-xs text-gray-700 truncate" title="{{ $submission->notes }}">
                                                    {{ Str::limit($submission->notes, 50) }}
                                                </p>
                                            @else
                                                <span class="text-xs text-gray-400 italic">No notes</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-600 whitespace-nowrap">
                                        {{ $submission->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end gap-1">
                                            <button
                                                onclick="openNoteModal({{ $submission->id }}, '{{ addslashes($submission->notes ?? '') }}')"
                                                class="inline-flex items-center gap-1 px-2 py-1 text-purple-600 hover:bg-purple-50 rounded transition-colors text-xs font-medium whitespace-nowrap">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Note
                                            </button>
                                            <a href="{{ route('user.speaker-submissions.show', $submission->id) }}"
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

    <!-- Notes Modal -->
    <div id="noteModal" class="fixed inset-0 bg-black/50 items-center justify-center z-50 p-4" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Add/Edit Note</h3>

            <form action="" id="noteForm" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="noteText" class="block text-sm font-medium text-gray-700 mb-2">Note</label>
                    <textarea id="noteText" name="notes" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="Add your notes..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">Max 1000 characters</p>
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button" onclick="closeNoteModal()"
                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-purple-600 hover:bg-purple-700 rounded-lg font-medium transition-colors">
                        Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openNoteModal(submissionId, noteText) {
            const form = document.getElementById('noteForm');
            form.action = `/user/speaker-submissions/${submissionId}/notes`;
            document.getElementById('noteText').value = noteText;
            document.getElementById('noteModal').style.display = 'flex';
        }

        function closeNoteModal() {
            document.getElementById('noteModal').style.display = 'none';
            document.getElementById('noteText').value = '';
        }

        // Close modal when clicking outside
        document.getElementById('noteModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeNoteModal();
            }
        });
    </script>
@endsection