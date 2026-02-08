@extends('admin.layouts.app')

@section('title', 'Sponsor Submissions | Admin Dashboard')

@section('header-title', 'Sponsor Submissions')
@section('header-subtitle', 'Manage all Sponsor Submissions')

@section('content')
    <div class="flex flex-col">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Header with Add Button -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">All Sponsor Submissions</h3>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($submissions) }} submissions</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('sponsor-submissions.exportExcel') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export to Excel
                </a>
                <a href="{{ route('dashboard') }}"
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
            <form method="GET" action="{{ route('sponsor-submissions.search') }}" class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 relative">
                    <input type="text" name="q" placeholder="Search by name, email, organization, or country..."
                        value="{{ isset($searchQuery) ? $searchQuery : '' }}"
                        class="w-full px-4 py-2 sm:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base sm:text-sm" />
                    <svg class="absolute right-3 top-2.5 sm:top-2.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="flex gap-2 flex-col sm:flex-row">
                    <button type="submit"
                        class="w-full sm:w-auto px-4 sm:px-6 py-3 sm:py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors whitespace-nowrap">
                        Search
                    </button>
                    @if (isset($searchQuery))
                        <a href="{{ route('sponsor-submissions.index') }}"
                            class="w-full sm:w-auto text-center px-4 sm:px-6 py-3 sm:py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors whitespace-nowrap">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Bulk Actions Bar -->
        <div id="bulkActionsBar"
            class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg flex items-center justify-between"
            style="display: none;">
            <div class="flex items-center gap-3">
                <input type="checkbox" id="selectAllCheckbox" class="w-5 h-5 border border-gray-300 rounded cursor-pointer"
                    onchange="toggleSelectAll(this)">
                <span class="text-sm font-medium text-gray-700">
                    <span id="selectedCount">0</span> submission(s) selected
                </span>
            </div>
            <button onclick="bulkDelete()"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete Selected
            </button>
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
                    <p class="text-gray-500">Sponsor Submissions will appear here.</p>
                </div>
            @else
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-50">
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">
                                        <input type="checkbox" id="headerCheckbox"
                                            class="w-4 h-4 border border-gray-300 rounded cursor-pointer"
                                            onchange="toggleSelectAll(this)">
                                    </th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Contact Person
                                    </th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Email</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Phone</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Organization
                                    </th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Country</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Website</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Notes</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Submitted</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-900 whitespace-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="submissionsTableBody">
                                @foreach ($submissions as $submission)
                                    <tr class="hover:bg-gray-50 transition-colors submission-row"
                                        data-submission-id="{{ $submission->id }}">
                                        <td class="px-4 py-3">
                                            <input type="checkbox"
                                                class="submission-checkbox w-4 h-4 border border-gray-300 rounded cursor-pointer"
                                                onchange="updateBulkActionsBar()" data-id="{{ $submission->id }}">
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-2">
                                                <div
                                                    class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-semibold text-xs shrink-0">
                                                    {{ strtoupper(substr($submission->contact_person, 0, 1)) }}
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="font-medium text-gray-900 truncate">
                                                        {{ $submission->contact_person }}
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
                                                class="text-gray-700 text-xs whitespace-nowrap">
                                                {{ $submission->phone_number }}</a>
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
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-1">
                                                @if ($submission->admin_notes)
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-xs text-gray-700 line-clamp-1"
                                                            title="{{ $submission->admin_notes }}">
                                                            {{ Str::limit($submission->admin_notes, 30) }}
                                                        </p>
                                                    </div>
                                                    <button type="button"
                                                        onclick="openNoteModal({{ $submission->id }}, '{{ addslashes($submission->admin_notes) }}')"
                                                        class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded text-xs font-medium transition-colors whitespace-nowrap">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        Edit
                                                    </button>
                                                @else
                                                    <button type="button" onclick="openNoteModal({{ $submission->id }}, '')"
                                                        class="inline-flex items-center gap-1 px-3 py-1 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded text-sm font-medium transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        Add Note
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs text-gray-600 whitespace-nowrap">
                                            {{ $submission->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-end gap-1">
                                                <a href="{{ route('sponsor-submissions.show', $submission->id) }}"
                                                    class="inline-flex items-center gap-1 px-2 py-1 text-blue-600 hover:bg-blue-50 rounded transition-colors text-xs font-medium whitespace-nowrap">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View
                                                </a>
                                                @if (Auth::check())
                                                    <form action="{{ route('sponsor-submissions.destroy', $submission->id) }}"
                                                        method="POST" class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center gap-1 px-2 py-1 text-red-600 hover:bg-red-50 rounded transition-colors text-xs font-medium whitespace-nowrap">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Bulk Delete Modal -->
    <div id="bulkDeleteModal" class="fixed inset-0 bg-black/50 items-center justify-center z-50 p-4" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Confirm Bulk Delete</h3>
            <p class="text-gray-600 text-sm mb-6">
                Are you sure you want to delete <span id="deleteCountDisplay">0</span> submission(s)? This action cannot be
                undone.
            </p>

            <div class="flex gap-3 justify-end">
                <button type="button" onclick="closeBulkDeleteModal()"
                    class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">
                    Cancel
                </button>
                <button type="button" onclick="confirmBulkDelete()"
                    class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg font-medium transition-colors">
                    Delete
                </button>
            </div>
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
                    <textarea id="noteText" name="admin_notes" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Add communication notes..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">Max 1000 characters</p>
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button" onclick="closeNoteModal()"
                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-colors">
                        Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openNoteModal(submissionId, noteText) {
            const form = document.getElementById('noteForm');
            form.action = `/admin/sponsor-submissions/${submissionId}/notes`;
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

        // Bulk selection functions
        function updateBulkActionsBar() {
            const checkboxes = document.querySelectorAll('.submission-checkbox:checked');
            const selectedCount = checkboxes.length;
            const bulkActionsBar = document.getElementById('bulkActionsBar');
            const selectedCountSpan = document.getElementById('selectedCount');
            const headerCheckbox = document.getElementById('headerCheckbox');
            const allCheckboxes = document.querySelectorAll('.submission-checkbox');
            const totalCheckboxes = allCheckboxes.length;

            selectedCountSpan.textContent = selectedCount;

            if (selectedCount > 0) {
                bulkActionsBar.style.display = 'flex';
            } else {
                bulkActionsBar.style.display = 'none';
            }

            // Update header checkbox state
            if (selectedCount === totalCheckboxes && totalCheckboxes > 0) {
                headerCheckbox.checked = true;
                headerCheckbox.indeterminate = false;
            } else if (selectedCount > 0) {
                headerCheckbox.indeterminate = true;
            } else {
                headerCheckbox.checked = false;
                headerCheckbox.indeterminate = false;
            }
        }

        function toggleSelectAll(checkbox) {
            const allCheckboxes = document.querySelectorAll('.submission-checkbox');
            allCheckboxes.forEach(cb => cb.checked = checkbox.checked);
            updateBulkActionsBar();
        }

        function bulkDelete() {
            const checkboxes = document.querySelectorAll('.submission-checkbox:checked');
            const selectedCount = checkboxes.length;

            if (selectedCount === 0) {
                alert('Please select at least one submission to delete.');
                return;
            }

            document.getElementById('deleteCountDisplay').textContent = selectedCount;
            document.getElementById('bulkDeleteModal').style.display = 'flex';
        }

        function closeBulkDeleteModal() {
            document.getElementById('bulkDeleteModal').style.display = 'none';
        }

        function confirmBulkDelete() {
            const checkboxes = document.querySelectorAll('.submission-checkbox:checked');
            const submissionIds = Array.from(checkboxes).map(cb => cb.dataset.id);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (submissionIds.length === 0) {
                alert('No submissions selected');
                return;
            }

            // Close modal immediately
            closeBulkDeleteModal();

            // Delete each submission individually
            let deleteCount = 0;
            let successCount = 0;

            submissionIds.forEach(id => {
                fetch(`/admin/sponsor-submissions/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        deleteCount++;
                        if (response.ok) {
                            successCount++;
                            const row = document.querySelector(`tr[data-submission-id="${id}"]`);
                            if (row) {
                                row.remove();
                            }
                        } else {
                            console.error(`Failed to delete submission ${id}: ${response.statusText}`);
                        }

                        // After all requests complete, reload page
                        if (deleteCount === submissionIds.length) {
                            setTimeout(() => {
                                // Show success message before reload
                                if (successCount > 0) {
                                    alert(`${successCount} submission(s) deleted successfully!`);
                                }
                                location.reload();
                            }, 500);
                        }
                    })
                    .catch(error => {
                        deleteCount++;
                        console.error(`Error deleting submission ${id}:`, error);
                        if (deleteCount === submissionIds.length) {
                            setTimeout(() => {
                                location.reload();
                            }, 500);
                        }
                    });
            });
        }

        // Close modal when clicking outside
        document.getElementById('bulkDeleteModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeBulkDeleteModal();
            }
        });
    </script>
@endsection
