@auth
    <div id="notification-container" class="relative">
        <!-- Notification Bell Button -->
        @php
            $isAdminRole = $notificationRole === 'admin';
            $roleForBell = $notificationRole ?? 'user';
        @endphp
        <button id="notification-bell" class="relative p-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
            aria-label="Notifications" data-user-role="{{ $roleForBell }}" data-user-id="{{ Auth::id() }}"
            data-is-admin="{{ $isAdminRole ? 'true' : 'false' }}"
            data-unread-url="{{ $isAdminRole ? route('admin.notifications.unread') : route('user.notifications.unread') }}"
            data-mark-all-url="{{ $isAdminRole ? route('admin.notifications.markAllRead') : route('user.notifications.markAllRead') }}"
            data-index-url="{{ $isAdminRole ? route('admin.notifications.index') : route('user.notifications.index') }}"
            data-delete-prefix="{{ $isAdminRole ? '/api/notifications' : '/user/api/notifications' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Unread Badge -->
            <span id="notification-badge"
                class="absolute top-1 right-1 flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full hidden">
                0
            </span>
        </button>

        <!-- Notification Dropdown Panel -->
        <div id="notification-dropdown"
            class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
            style="max-height: 400px; overflow-y-auto;">
            <!-- Header -->
            <div class="sticky top-0 bg-white border-b border-gray-200 p-4 flex items-center justify-between rounded-t-lg">
                <h3 class="font-semibold text-gray-900">Notifications</h3>
                <button id="mark-all-read" class="text-xs text-blue-600 hover:text-blue-800 font-medium">Mark all as
                    read</button>
            </div>

            <!-- Notifications List -->
            <div id="notifications-list" class="divide-y divide-gray-200">
                <!-- Loading State -->
                <div class="p-4 text-center text-gray-500">
                    <svg class="w-5 h-5 animate-spin mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                    </svg>
                </div>
            </div>

            <!-- Footer -->
            <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 p-3 rounded-b-lg">
                <button id="view-all-notifications"
                    class="block w-full text-center text-sm text-blue-600 hover:text-blue-800 font-medium py-2">
                    View All Notifications
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bell = document.getElementById('notification-bell');

            // Exit if notification bell doesn't exist (not on a page that needs it)
            if (!bell) {
                return;
            }

            const dropdown = document.getElementById('notification-dropdown');
            const notificationsList = document.getElementById('notifications-list');
            const badge = document.getElementById('notification-badge');
            const markAllRead = document.getElementById('mark-all-read');
            const userRole = bell.getAttribute('data-user-role');
            const userId = bell.getAttribute('data-user-id');
            const isAdmin = bell.getAttribute('data-is-admin') === 'true';

            // Get URLs from data attributes (set by server based on user role)
            const unreadUrl = bell.getAttribute('data-unread-url');
            const markAllUrl = bell.getAttribute('data-mark-all-url');
            const notificationsIndexUrl = bell.getAttribute('data-index-url');
            const deleteUrlPrefix = bell.getAttribute('data-delete-prefix');

            // Toggle dropdown
            bell.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
                if (!dropdown.classList.contains('hidden')) {
                    loadNotifications();
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!e.target.closest('#notification-container')) {
                    dropdown.classList.add('hidden');
                }
            });

            // Load notifications
            function loadNotifications() {
                fetch(unreadUrl + '?t=' + Date.now())
                    .then(response => {
                        if (!response.ok) throw new Error('Failed to load notifications');
                        return response.json();
                    })
                    .then(data => {
                        updateBadge(data.count || 0);
                        renderNotifications(data.notifications || []);
                    })
                    .catch(error => {
                        console.error('Error loading notifications:', error);
                        notificationsList.innerHTML = '<div class="p-4 text-center text-gray-500">Error loading notifications</div>';
                    });
            }

            // Render notifications
            function renderNotifications(notifications) {
                if (notifications.length === 0) {
                    notificationsList.innerHTML = '<div class="p-4 text-center text-gray-500">No new notifications</div>';
                    return;
                }

                notificationsList.innerHTML = notifications.map(notif => {
                    const data = notif.data || {};
                    const contactName = escapeHtml(data.contact_name || 'Unknown Contact');
                    const contactEmail = escapeHtml(data.contact_email || '');
                    const contactCompany = escapeHtml(data.contact_company || '');
                    const contactId = data.contact_id || '';

                    // Route based on user role (from data attribute)
                    const viewUrl = userRole === 'admin' ? `/contacts/${contactId}` : `/user/contacts/${contactId}`;

                    return `
                    <div class="p-4 hover:bg-gray-50 transition-colors flex justify-between items-start gap-3">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">New contact submission from ${contactName}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                ${contactEmail ? `<strong>${contactEmail}</strong> • ` : ''}
                                ${contactCompany ? `<strong>${contactCompany}</strong> • ` : ''}
                                ${notif.created_at}
                            </p>
                            <a href="${viewUrl}" class="text-xs text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                View Contact →
                            </a>
                        </div>
                        <button onclick="deleteNotification('${notif.id}')" class="text-gray-400 hover:text-red-600 transition-colors flex-shrink-0">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                `;
                }).join('');
            }

            // Escape HTML to prevent XSS
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // Update badge
            function updateBadge(count) {
                if (count > 0) {
                    badge.textContent = count > 9 ? '9+' : count;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }

            // Mark all as read
            markAllRead.addEventListener('click', function (e) {
                e.preventDefault();
                fetch(markAllUrl + '?t=' + Date.now(), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                })
                    .then(() => {
                        loadNotifications();
                    })
                    .catch(error => console.error('Error marking all as read:', error));
            });

            // View all notifications
            const viewAllBtn = document.getElementById('view-all-notifications');
            if (viewAllBtn) {
                viewAllBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    window.location.href = notificationsIndexUrl;
                });
            }

            // Delete notification
            window.deleteNotification = function (id) {
                const deleteUrl = isAdmin
                    ? `/api/notifications/${id}`
                    : `/user/api/notifications/${id}`;
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                })
                    .then(() => loadNotifications())
                    .catch(error => console.error('Error deleting notification:', error));
            };

            // Load notifications only when bell is clicked (not on interval)
            // Removed polling to prevent server overload
            // setInterval(loadNotifications, 5000);

            // Don't load on page load - only when user clicks
            // loadNotifications();
        });
    </script>
    </div>
@endauth