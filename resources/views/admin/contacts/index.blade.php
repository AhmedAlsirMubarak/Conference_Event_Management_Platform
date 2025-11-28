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
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Phone</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Company</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Submitted</th>
                                <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($contacts as $contact)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold text-sm shrink-0">
                                                {{ strtoupper(substr($contact->Name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $contact->Name }}</p>
                                                @if ($contact->Designation)
                                                    <p class="text-xs text-gray-500">{{ $contact->Designation }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="mailto:{{ $contact->Email }}"
                                            class="text-blue-600 hover:text-blue-800 text-sm">{{ $contact->Email }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="tel:+968{{ $contact->Phone }}" class="text-gray-700 text-sm">+968
                                            {{ $contact->Phone }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-gray-700 text-sm">{{ $contact->Company ?? '-' }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $contact->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('getcontactById', $contact->id) }}"
                                                class="inline-flex items-center gap-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors text-sm font-medium">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View
                                            </a>
                                            @if (Auth::user()->role === 'admin')
                                                <form action="{{ route('deleteContact', $contact->id) }}" method="POST" class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-2 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors text-sm font-medium">
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
            @endif
        </div>
    </div>
@endsection