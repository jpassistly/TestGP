<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DeliveryLineMapping;
use App\Models\RouteAssign;
use App\Models\Customersubscription;
use App\Models\Order;
use Carbon\Carbon;
use log;
class UpdateDeliveryLines extends Command
{
    // The name and signature of the console command.
    protected $signature = 'delivery-lines:update';

    // The console command description.
    protected $description = 'Update delivery lines based on delivery staff and date conditions';

    // Execute the console command.
    public function handle()
    {
        try {
            // Fetch all records with the given conditions
            $ch = DeliveryLineMapping::where('date', '>=', today())
                // Uncomment this if you want to filter by updated_at
                // ->where('updated_at', '<', Carbon::now()->subMinutes(30))
                ->get();

            if ($ch->isEmpty()) {
                $this->info('No records found to update.');
                return;
            }

            // Loop through the records
            foreach ($ch as $d) {
                // Get area_ids from RouteAssign where delivery_line_id matches
                $area_id_all = RouteAssign::where('delivery_line_id', $d->delivery_line_id)
                    ->where('del', '0')
                    ->get();

                if ($d->delivery_staff_id > 0) {
                    // Pluck the area IDs
                    $area_ids = $area_id_all->pluck('area_id');

                    // Update Customersubscription for the areas found
                    Customersubscription::whereIn('area', $area_ids)
                        ->where('date', $d->date)
                        ->update([
                            'deliveryperson_id' => $d->delivery_staff_id,
                            'delivery_line_id' => $d->delivery_line_id
                        ]);

                    // Update Order for the areas found
                    Order::whereIn('area', $area_ids)
                        ->where('delivery_date', $d->date)
                        ->update([
                            'delivered_by' => $d->delivery_staff_id,
                            'delivery_line_id' => $d->delivery_line_id
                        ]);

                    // Update the updated_at field in DeliveryLineMapping
                    DeliveryLineMapping::where('id', $d->id)
                        ->update(['updated_at' => now()]);
                }
            }

            $this->info('Records updated successfully.');
        } catch (\Exception $e) {
            // Log the error message to the Laravel log file
            \Log::error('Error occurred in UpdateDeliveryLines command: ' . $e->getMessage());
            $this->error('Error occurred: ' . $e->getMessage());
        }
    }
}
