<?php
namespace App\Listeners;

use App\Events\CommandeUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogCommandeUpdate
{
    public function __construct()
    {
        //
    }

    public function handle(CommandeUpdated $event)
    {
        Log::info('Commande modifiée ID: '.$event->commande->id);
    }
}