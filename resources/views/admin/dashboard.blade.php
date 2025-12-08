@extends('admin.layouts.app')

@section('title', 'Dashboard | Admin')

@section('header-title', 'Dashboard')
@section('header-subtitle', 'Welcome to your admin panel')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Contacts Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Contacts</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalContacts ?? 0 }}</p>
                    <p class="text-xs text-gray-500 mt-2">All submissions</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- This Week Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">This Week</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $thisWeekContacts ?? 0 }}</p>
                    <p class="text-xs text-gray-500 mt-2">New contacts</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Today Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Today</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $todayContacts ?? 0 }}</p>
                    <p class="text-xs text-gray-500 mt-2">Today's submissions</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Quick Action</p>
                    <p class="text-sm text-gray-600 mt-2">Manage contacts</p>
                    <a href="{{ route('getAllContacts') }}"
                        class="inline-flex items-center gap-2 mt-3 px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs font-medium transition-colors">
                        View All
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Recent Contacts</h3>
            <a href="{{ route('getAllContacts') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View
                All →</a>
        </div>

        @if (isset($recentContacts) && $recentContacts->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Phone</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Submitted</th>
                            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($recentContacts as $contact)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-gray-900">{{ $contact->Name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="mailto:{{ $contact->Email }}"
                                        class="text-blue-600 hover:text-blue-800 text-sm">{{ $contact->Email }}</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600"> {{ $contact->Phone }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $contact->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('getcontactById', $contact->id) }}"
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium">View →</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-8 text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No contacts yet</h3>
                <p class="text-gray-500">Contact submissions will appear here.</p>
            </div>
        @endif
    </div>
@endsection