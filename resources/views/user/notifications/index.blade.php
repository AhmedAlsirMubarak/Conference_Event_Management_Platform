@extends('user.layouts.app')

@section('title', 'Notifications')
@section('header-title', 'Notifications')
@section('header-subtitle', 'View all your contact submission notifications')

@section('content')
    <div class="p-4 sm:p-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Notifications</h1>
                    <p class="text-gray-500 mt-1">View all your contact submission notifications</p>
                </div>
                <button id="mark-all-read-btn"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Mark all as read
                </button>
            </div>

            <!-- Notifications List -->
            <div id="notifications-container" class="space-y-3">
                <!-- Loading State -->
                <div class="p-8 text-center">
                    <svg class="w-8 h-8 animate-spin mx-auto text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                    </svg>
                    <p class="mt-2 text-gray-500">Loading notifications...</p>
                </div>
            </div>

            <!-- Pagination -->
            <div id="pagination" class="mt-6 flex justify-center gap-2"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('notifications-container');
            const paginationDiv = document.getElementById('pagination');
            const markAllBtn = document.getElementById('mark-all-read-btn');
            let currentPage = 1;

            // User notification routes
            const allNotificationsUrl = '{{ route("user.notifications.all") }}';
            const markAllUrl = '{{ route("user.notifications.markAllRead") }}';
            const deleteUrlPrefix = '/user/api/notifications';

            function loadNotifications(page = 1) {
                fetch(`${allNotificationsUrl}?page=${page}`)
                    .then(response => {
                        if (!response.ok) throw new Error('Failed to load notifications');
                        return response.json();
                    })
                    .then(data => {
                        renderNotifications(data);
                        renderPagination(data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        container.innerHTML = '<div class="p-4 text-center text-gray-500">Error loading notifications</div>';
                    });
            }

            function renderNotifications(data) {
                const notifications = data.notifications || [];

                if (notifications.length === 0) {
                    container.innerHTML = '<div class="p-8 text-center text-gray-500"><p>No notifications</p></div>';
                    return;
                }

                container.innerHTML = notifications.map(notif => {
                    const isRead = notif.read_at !== null;
                    const readClass = isRead ? 'bg-white' : 'bg-blue-50 border-l-4 border-blue-500';

                    return `
                    <div class="p-4 border border-gray-200 rounded-lg ${readClass} hover:shadow-md transition-shadow flex justify-between items-start gap-4">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">New contact submission from ${escapeHtml(notif.contact_name || 'Unknown')}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                ${notif.contact_email ? `<strong>${escapeHtml(notif.contact_email)}</strong> • ` : ''}
                                ${notif.contact_company ? `<strong>${escapeHtml(notif.contact_company)}</strong> • ` : ''}
                                ${new Date(notif.created_at).toLocaleDateString()} ${new Date(notif.created_at).toLocaleTimeString()}
                            </p>
                            <div class="mt-3 flex gap-2">
                                <a href="/user/contacts/${notif.contact_id}" class="text-xs text-blue-600 hover:text-blue-800 font-medium">
                                    View Contact
                                </a>
                                ${!isRead ? `<span class="text-xs text-blue-600">• Unread</span>` : ''}
                            </div>
                        </div>
                        <button onclick="deleteNotification('${notif.id}')" class="text-gray-400 hover:text-red-600 transition flex-shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                `;
                }).join('');
            }

            function renderPagination(data) {
                const pages = [];
                const total = data.last_page || 1;
                const current = data.current_page || 1;

                if (total <= 1) {
                    paginationDiv.innerHTML = '';
                    return;
                }

                // Previous button
                if (current > 1) {
                    pages.push(`<button onclick="goToPage(${current - 1})" class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50">← Previous</button>`);
                }

                // Page numbers
                for (let i = 1; i <= total; i++) {
                    if (i === current) {
                        pages.push(`<span class="px-3 py-1 bg-blue-600 text-white rounded">${i}</span>`);
                    } else {
                        pages.push(`<button onclick="goToPage(${i})" class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50">${i}</button>`);
                    }
                }

                // Next button
                if (current < total) {
                    pages.push(`<button onclick="goToPage(${current + 1})" class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-50">Next →</button>`);
                }

                paginationDiv.innerHTML = pages.join('');
            }

            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            window.goToPage = function (page) {
                currentPage = page;
                loadNotifications(page);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };

            window.deleteNotification = function (id) {
                if (!confirm('Delete this notification?')) return;

                fetch(`${deleteUrlPrefix}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                })
                    .then(() => loadNotifications(currentPage))
                    .catch(error => console.error('Error:', error));
            };

            // Mark all as read
            markAllBtn.addEventListener('click', function () {
                fetch(markAllUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                })
                    .then(() => loadNotifications(currentPage))
                    .catch(error => console.error('Error:', error));
            });

            // Load initial notifications
            loadNotifications();
        });
    </script>

    <style>
        #pagination button:hover {
            background-color: #f3f4f6;
        }
    </style>
@endsection