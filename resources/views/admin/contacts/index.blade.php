@extends('admin.layouts.app')

@section('title', 'Contacts | Admin Dashboard')

@section('header-title', 'Contacts')
@section('header-subtitle', 'Manage all contact submissions')

@section('content')
    <div class="flex flex-col">
        <!-- Header with Add Button -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">All Contacts</h3>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($contacts) }} contacts</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('exportExcel') }}"
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
            <form method="GET" action="{{ route('searchContacts') }}" class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 relative">
                    <input type="text" name="q" placeholder="Search by name, email, phone, or company..."
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
                        <a href="{{ route('getAllContacts') }}"
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
                    <span id="selectedCount">0</span> contact(s) selected
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

        <!-- Contacts Table -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            @if ($contacts->isEmpty())
                <div class="p-8 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No contacts yet</h3>
                    <p class="text-gray-500">Contact submissions will appear here.</p>
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
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Name</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Email</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Phone</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Company</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Notes</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900 whitespace-nowrap">Submitted</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-900 whitespace-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="contactsTableBody">
                                @foreach ($contacts as $contact)
                                    <tr class="hover:bg-gray-50 transition-colors contact-row" data-contact-id="{{ $contact->id }}">
                                        <td class="px-4 py-3">
                                            <input type="checkbox"
                                                class="contact-checkbox w-4 h-4 border border-gray-300 rounded cursor-pointer"
                                                onchange="updateBulkActionsBar()" data-id="{{ $contact->id }}">
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-2">
                                                <div
                                                    class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold text-xs shrink-0">
                                                    {{ strtoupper(substr($contact->Name, 0, 1)) }}
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="font-medium text-gray-900 truncate">{{ $contact->Name }}</p>
                                                    @if ($contact->Designation)
                                                        <p class="text-xs text-gray-500 truncate">{{ $contact->Designation }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="mailto:{{ $contact->Email }}"
                                                class="text-blue-600 hover:text-blue-800 text-xs break-all">{{ $contact->Email }}</a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="tel:+968{{ $contact->Phone }}" class="text-gray-700 text-xs whitespace-nowrap">
                                                {{ $contact->Phone }}</a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-gray-700 text-xs">{{ $contact->Company ?? '-' }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-1">
                                                @if ($contact->notes)
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-xs text-gray-700 line-clamp-1" title="{{ $contact->notes }}">
                                                            {{ Str::limit($contact->notes, 30) }}
                                                        </p>
                                                    </div>
                                                    <button type="button"
                                                        onclick="openNoteModal({{ $contact->id }}, '{{ addslashes($contact->notes) }}')"
                                                        class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded text-xs font-medium transition-colors whitespace-nowrap">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        Edit
                                                    </button>
                                                @else
                                                    <button type="button" onclick="openNoteModal({{ $contact->id }}, '')"
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
                                            {{ $contact->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-end gap-1">
                                                <a href="{{ route('getcontactById', $contact->id) }}"
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
                                                    <form action="{{ route('deleteContact', $contact->id) }}" method="POST"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this contact?');">
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
                Are you sure you want to delete <span id="deleteCountDisplay">0</span> contact(s)? This action cannot be
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
                    <textarea id="noteText" name="notes" rows="4"
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
        function openNoteModal(contactId, noteText) {
            const form = document.getElementById('noteForm');
            form.action = `/contacts/${contactId}/notes`;
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
            const checkboxes = document.querySelectorAll('.contact-checkbox:checked');
            const selectedCount = checkboxes.length;
            const bulkActionsBar = document.getElementById('bulkActionsBar');
            const selectedCountSpan = document.getElementById('selectedCount');
            const headerCheckbox = document.getElementById('headerCheckbox');
            const allCheckboxes = document.querySelectorAll('.contact-checkbox');
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
            const allCheckboxes = document.querySelectorAll('.contact-checkbox');
            allCheckboxes.forEach(cb => cb.checked = checkbox.checked);
            updateBulkActionsBar();
        }

        function bulkDelete() {
            const checkboxes = document.querySelectorAll('.contact-checkbox:checked');
            const selectedCount = checkboxes.length;

            if (selectedCount === 0) {
                alert('Please select at least one contact to delete.');
                return;
            }

            document.getElementById('deleteCountDisplay').textContent = selectedCount;
            document.getElementById('bulkDeleteModal').style.display = 'flex';
        }

        function closeBulkDeleteModal() {
            document.getElementById('bulkDeleteModal').style.display = 'none';
        }

        function confirmBulkDelete() {
            const checkboxes = document.querySelectorAll('.contact-checkbox:checked');
            const contactIds = Array.from(checkboxes).map(cb => cb.dataset.id);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (contactIds.length === 0) {
                alert('No contacts selected');
                return;
            }

            // Close modal immediately
            closeBulkDeleteModal();

            // Delete each contact individually
            let deleteCount = 0;
            let successCount = 0;

            contactIds.forEach(id => {
                fetch(`/contacts/${id}`, {
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
                            const row = document.querySelector(`tr[data-contact-id="${id}"]`);
                            if (row) {
                                row.remove();
                            }
                        } else {
                            console.error(`Failed to delete contact ${id}: ${response.statusText}`);
                        }

                        // After all requests complete, reload page
                        if (deleteCount === contactIds.length) {
                            setTimeout(() => {
                                // Show success message before reload
                                if (successCount > 0) {
                                    alert(`${successCount} contact(s) deleted successfully!`);
                                }
                                location.reload();
                            }, 500);
                        }
                    })
                    .catch(error => {
                        deleteCount++;
                        console.error(`Error deleting contact ${id}:`, error);
                        if (deleteCount === contactIds.length) {
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
