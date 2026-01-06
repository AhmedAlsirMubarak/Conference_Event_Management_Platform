@extends('admin.layouts.app')

@section('title', 'Active Sessions')

@section('header-title', 'Active Sessions')
@section('header-subtitle', 'Monitor and manage all active user sessions')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Active Sessions -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Active Sessions</p>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $sessions->total() }}</p>
                </div>
                <svg class="w-12 h-12 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
        </div>

        <!-- Admin Sessions -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Admin Sessions</p>
                    <p class="text-3xl font-bold text-purple-600 mt-2">
                        {{ $sessions->count() }}
                    </p>
                </div>
                <svg class="w-12 h-12 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </div>
        </div>

        <!-- Export Sessions -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <a href="{{ route('sessions.export') }}"
                class="flex items-center justify-between h-full hover:bg-gray-50 transition-colors rounded p-2">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Export Logs</p>
                    <p class="text-sm text-gray-500 mt-2">Download session CSV</p>
                </div>
                <svg class="w-12 h-12 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Sessions Table -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">User</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Browser</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Platform</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Login Time</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Last Activity</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($sessions as $session)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $session->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $session->user->email }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $session->ip_address }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $session->browser ?? 'Unknown' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $session->platform ?? 'Unknown' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $session->login_at->format('M d, H:i') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $session->last_activity_at->diffForHumans() }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium @if ($session->is_active) bg-green-100 text-green-800 @else bg-gray-100 text-gray-800 @endif">
                                    {{ $session->is_active ? 'Active' : 'Inactive' }}
                                </span>
                                @if ($session->is_suspicious)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 ml-2">
                                        Suspicious
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('sessions.show', $session->id) }}"
                                    class="text-blue-600 hover:text-blue-900 text-sm font-medium">View</a>
                                @if ($session->is_active)
                                    <form action="{{ route('sessions.terminate', $session->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Terminate this session?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium ml-4">
                                            Terminate
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <p class="text-gray-500">No active sessions found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($sessions->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $sessions->links() }}
            </div>
        @endif
    </div>
@endsection
