<?php

namespace ContainerACds9ro;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Service\UserService' shared autowired service.
     *
     * @return \App\Service\UserService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/UserService.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/MailerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Mailer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/TransportInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/Transports.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport.php';

        return $container->services['App\\Service\\UserService'] = new \App\Service\UserService($container, ($container->services['security.password_encoder'] ?? $container->load('getSecurity_PasswordEncoderService')), ($container->services['swiftmailer.mailer.default'] ?? $container->load('getSwiftmailer_Mailer_DefaultService')), new \Symfony\Component\Mailer\Mailer((new \Symfony\Component\Mailer\Transport(new RewindableGenerator(function () use ($container) {
            yield 0 => $container->load('getMailer_TransportFactory_GmailService');
            yield 1 => $container->load('getMailer_TransportFactory_SendgridService');
            yield 2 => $container->load('getMailer_TransportFactory_NullService');
            yield 3 => $container->load('getMailer_TransportFactory_SendmailService');
            yield 4 => $container->load('getMailer_TransportFactory_NativeService');
            yield 5 => $container->load('getMailer_TransportFactory_SmtpService');
        }, 6)))->fromStrings(['main' => $container->getEnv('MAILER_DSN')]), NULL, ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService())));
    }
}