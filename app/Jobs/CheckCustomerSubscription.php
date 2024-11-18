<?php

namespace App\Jobs;
use App\Models\Customersubscription;
use App\Models\CustomerPlansTrack;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckCustomerSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Retrieve subscriptions where the `to_date` is earlier than today's date
        $expiredSubscriptions = CustomerPlansTrack::where('end_date', '<', Carbon::today()->format('Y-m-d'))
            ->get();
    
        foreach ($expiredSubscriptions as $subscription) {
            // Update status or add remarks to mark it as expired
            $subscription->update(['remarks' => 'expired']);
        }
    
        \Log::info('Checked subscriptions and updated expired ones.');
    }
    
}
