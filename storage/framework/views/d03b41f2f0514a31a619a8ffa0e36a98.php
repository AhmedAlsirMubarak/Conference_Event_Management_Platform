

<?php $__env->startSection('title', $submission->contact_person . ' | Exhibit Submissions'); ?>

<?php $__env->startSection('header-title', 'Exhibit Submission Details'); ?>
<?php $__env->startSection('header-subtitle', 'Submitted exhibit enquiry information'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl">
        <!-- Success/Error Messages -->
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Back Button -->
        <a href="<?php echo e(route('exhibit-submissions.index')); ?>"
            class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Exhibit Submissions
        </a>

        <!-- Submission Card -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-8 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center font-bold text-2xl">
                            <?php echo e(strtoupper(substr($submission->contact_person, 0, 1))); ?>

                        </div>
                        <div>
                            <h2 class="text-3xl font-bold"><?php echo e($submission->contact_person); ?></h2>
                            <?php if($submission->job_title): ?>
                                <p class="text-orange-100 mt-1"><?php echo e($submission->job_title); ?></p>
                            <?php endif; ?>
                            <p class="text-orange-100 text-sm mt-2">Submitted <?php echo e($submission->created_at->diffForHumans()); ?>

                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" onclick="replySubmission('<?php echo e($submission->email_address); ?>')"
                            class="inline-flex items-center gap-2 px-3 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Reply
                        </button>
                        <?php if(Auth::user()->role === 'admin'): ?>
                            <form action="<?php echo e(route('exhibit-submissions.destroy', $submission->id)); ?>" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-3 py-2 bg-red-500 hover:bg-red-600 rounded-lg transition-colors text-sm font-medium text-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Exhibit Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Email</label>
                            <a href="mailto:<?php echo e($submission->email_address); ?>"
                                class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block">
                                <?php echo e($submission->email_address); ?>

                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Phone</label>
                            <a href="tel:<?php echo e($submission->phone_number); ?>"
                                class="text-lg text-gray-900 font-medium mt-2 block">
                                <?php echo e($submission->phone_number); ?>

                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Job Title</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                <?php echo e($submission->job_title ?? 'Not provided'); ?>

                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Organization</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                <?php echo e($submission->organization_name ?? 'Not provided'); ?>

                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Country</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                <?php echo e($submission->country ?? 'Not provided'); ?>

                            </p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Website</label>
                            <a href="<?php echo e($submission->website); ?>" target="_blank" rel="noopener noreferrer"
                                class="text-lg text-blue-600 hover:text-blue-800 font-medium mt-2 block break-all">
                                <?php echo e($submission->website ?? 'Not provided'); ?>

                            </a>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Submitted On</label>
                            <p class="text-lg text-gray-900 font-medium mt-2">
                                <?php echo e($submission->created_at->format('F d, Y \a\t g:i A')); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <!-- Exhibit Enquiry Comments Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Enquiry Details</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <?php if($submission->additional_comments): ?>
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                <?php echo e($submission->additional_comments); ?></p>
                        <?php else: ?>
                            <p class="text-gray-500 italic">No details provided</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Communication Notes Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">Communication Notes</h3>
                    </div>

                    <form action="<?php echo e(route('exhibit-submissions.updateNotes', $submission->id)); ?>" method="POST"
                        class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Add or update notes about communication with this exhibitor
                            </label>
                            <textarea name="admin_notes" id="admin_notes" rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="e.g., Called on Dec 8, interested in exhibiting. Follow-up scheduled for next week."><?php echo e($submission->admin_notes); ?></textarea>
                            <p class="text-xs text-gray-500 mt-2">Max 1000 characters</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save Notes
                            </button>
                            <?php if($submission->admin_notes): ?>
                                <button type="button" onclick="clearNotes()"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Clear Notes
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if($errors->any()): ?>
                            <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                                <ul class="list-disc list-inside text-sm text-red-700">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function replySubmission(email) {
            window.location.href = 'mailto:' + email;
        }

        function clearNotes() {
            document.getElementById('admin_notes').value = '';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SCW-app\resources\views/admin/exhibitsubmissions/show.blade.php ENDPATH**/ ?>