<?php

namespace App\Observers;

use App\Jobs\SendMessage;
use App\Mail\Notify;
use App\Models\Talaba;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TalabaObserver
{
    /**
     * Handle the Talaba "created" event.
     */
    public function created(Talaba $talaba): void
    {
        // Log::info('Talaba qo\'shildi' . $talaba->id);
        Mail::to('xoliqulovmuhammadnabi842@gmail.com')->send(new Notify('Talaba qo\'shildi'.$talaba->id));

    }

    /**
     * Handle the Talaba "updated" event.
     */
    public function updated(Talaba $talaba): void
    {
        //
    }

    /**
     * Handle the Talaba "deleted" event.
     */
    public function deleted(Talaba $talaba): void
    {
        //
    }

    /**
     * Handle the Talaba "restored" event.
     */
    public function restored(Talaba $talaba): void
    {
        //
    }

    /**
     * Handle the Talaba "force deleted" event.
     */
    public function forceDeleted(Talaba $talaba): void
    {
        //
    }
}
