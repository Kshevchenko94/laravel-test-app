<?php

namespace App\Listeners;

use App\Enums\SenderMethods;
use App\Events\UserSettingsSaved;
use App\Factories\SenderProviderFactory;
use Illuminate\Contracts\Container\BindingResolutionException;

final class SendNotification
{

    public function __construct(private readonly SenderProviderFactory $senderProviderFactory)
    {
        //
    }

    /**
     * Handle the event.
     * @throws BindingResolutionException
     */
    public function handle(UserSettingsSaved $event): void
    {
        $method = $event->userSetting->senderMethod;
        $this->senderProviderFactory->build(SenderMethods::fromString($method))->send('Code', 'Subject');
    }
}
