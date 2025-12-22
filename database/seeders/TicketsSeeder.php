<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Ticket, Vessel, Organization, ServiceLine, Category, User, TicketCCEmail};

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resVessel = Vessel::select('id')->where('status', 'active')->whereNull('deleted_at')->get();
        $resOrganization = Organization::select('id')->where('status', 'active')->whereNull('deleted_at')->get();
        $resServiceLine = ServiceLine::select('id')->where('status', 'active')->whereNull('deleted_at')->get();
        $resCategory = Category::select('id')->where('status', 'active')->whereNull('deleted_at')->get();
        $resUser = User::select('id')->where('role', 'staff')->whereNull('deleted_at')->get();


        for ($i = 1; $i <= 5; $i++) {
            $indexVessel = array_rand($resVessel->toArray());
            $indexOrganization = array_rand($resOrganization->toArray());
            $indexServiceLine = array_rand($resServiceLine->toArray());
            $indexCategory = array_rand($resCategory->toArray());
            $indexUser = array_rand($resUser->toArray());

            $ticket = Ticket::firstOrCreate([
                'title' => "Sample Ticket Title $i",
            ], [
                'description' => "This is a sample description for ticket $i.",
                'contact_email' => "contact$i@example.com",
                'priority' => ['low', 'medium', 'high'][array_rand(['low', 'medium', 'high'])],
                'category_id' => $resCategory[$indexCategory]->id,
                'organization_id' => $resOrganization[$indexOrganization]->id,
                'vessel_id' => $resVessel[$indexVessel]->id,
                'service_line_id' => $resServiceLine[$indexServiceLine]->id,
                'assigned_to_user_id' => $resUser[$indexUser]->id,
                'status' => ['open', 'in_progress', 'resolved', 'closed'][array_rand(['open', 'in_progress', 'resolved', 'closed'])],
                'created_by' => 1,
            ]);

            // Add CC Emails
            $ccEmails = ["cc1@example.com", "cc2@example.com", "cc3@example.com"];  
            foreach ($ccEmails as $ccEmail) {
                TicketCCEmail::firstOrCreate([
                    'ticket_id' => $ticket->id,
                    'cc_email' => $ccEmail,
                ], [
                    'created_by' => 1,
                ]);
            }
        }
    }
}
