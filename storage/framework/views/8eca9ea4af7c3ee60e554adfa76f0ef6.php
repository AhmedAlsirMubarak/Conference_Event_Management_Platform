<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50;">Dear <?php echo e($climateLeader->fullname); ?>,</h2>

        <p>Thank you for submitting your nomination to become a Climate Leader at Saudi Climate Week 2026!</p>

        <p>We have successfully received your submission. Our selection committee will review your application and get
            back to you shortly.</p>

        <h3 style="color: #2c3e50; margin-top: 30px;">Your Submission Summary:</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Name:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->fullname); ?></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->email); ?></td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Phone:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->country_code); ?>

                    <?php echo e($climateLeader->phone); ?></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Organization:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->organization); ?></td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Country of Nationality:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->Country_of_Nationality); ?></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Country of Residence:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($climateLeader->Country_of_Residence); ?></td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>LinkedIn Profile:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <?php echo e($climateLeader->linkedin_profile ?? 'Not provided'); ?></td>
            </tr>
        </table>

        <p style="margin-top: 30px;">Thank you for your commitment to climate leadership and sustainability!</p>

        <p style="margin-top: 30px; color: #555;">
            Best regards,<br>
            <strong>Saudi Climate Week 2026 Team</strong>
        </p>
    </div>
</div><?php /**PATH C:\laragon\www\SCW-app\resources\views/emails/climate-leader-submission.blade.php ENDPATH**/ ?>