<?php

namespace App\Factories;

use App\Interfaces\ISenderProvider;
use Illuminate\Container\Container;
use App\Enums\SenderMethods;
use App\Services\{
    EmailSenderProvider,
    SmsSenderProvider,
    TelegramSenderProvider
};
use Illuminate\Contracts\Container\BindingResolutionException;


final class SenderProviderFactory
{
    public function __construct(private readonly Container $container)
    {
    }

    /**
     * @throws BindingResolutionException
     */
    public function build(SenderMethods $senderMethods): ISenderProvider
    {
        return $this->container->make(match ($senderMethods) {
            SenderMethods::Email => EmailSenderProvider::class,
            SenderMethods::Sms => SmsSenderProvider::class,
            SenderMethods::Telegram => TelegramSenderProvider::class,
        });
    }
}
