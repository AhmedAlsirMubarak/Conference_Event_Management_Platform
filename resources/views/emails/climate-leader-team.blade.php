<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 700px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50;">New Climate Leader Nomination Received</h2>
        
        <p>A new Climate Leader nomination has been submitted.</p>
        
        <h3 style="color: #2c3e50; margin-top: 30px;">Nominee Information:</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Submission ID:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">#{{ $climateLeader->id }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Full Name:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->fullname }}</td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->email }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Phone:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->country_code }} {{ $climateLeader->phone }}</td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Organization:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->organization }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Country of Nationality:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->Country_of_Nationality }}</td>
            </tr>
            <tr style="background-color: #f5f5f5;">
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Country of Residence:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $climateLeader->Country_of_Residence }}</td>
            </tr>
        </table>
        
        <h3 style="color: #2c3e50; margin-top: 30px;">Biography:</h3>
        <p style="padding: 15px; background-color: #f9f9f9; border-left: 4px solid #e68238;">{{ $climateLeader->bio }}</p>
        
        <h3 style="color: #2c3e50; margin-top: 20px;">LinkedIn Profile:</h3>
        <p>{{ $climateLeader->linkedin_profile ?? 'Not provided' }}</p>
        
        <h3 style="color: #2c3e50; margin-top: 20px;">Additional Notes:</h3>
        <p>{{ $climateLeader->notes ?? 'No additional notes' }}</p>
        
        <p style="margin-top: 20px; color: #777; font-size: 12px;">
            <strong>Submission Date:</strong> {{ $climateLeader->created_at->format('F j, Y \a\t g:i A') }}
        </p>
        
        <p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
            <a href="http://localhost:8000/admin/climate-leaders/{{ $climateLeader->id }}" style="display: inline-block; padding: 10px 20px; background-color: #e68238; color: white; text-decoration: none; border-radius: 4px;">View in Admin Panel</a>
        </p>
        
        <p style="margin-top: 30px; color: #555;">
            Saudi Climate Week 2026 Admin Team
        </p>
    </div>
</div>
