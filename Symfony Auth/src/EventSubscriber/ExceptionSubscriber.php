<?php 
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            KernelEvents::EXCEPTION => [
                ['test1', 1],
                ['test2', 2],
                ['test3', -1],
            ],
        ];
    }

    public function test1(ExceptionEvent $event)
    {
        echo '<br> I am in Test1';
    }

    public function test2(ExceptionEvent $event)
    {
     echo '<br> I am in Test2';
    }

    public function test3(ExceptionEvent $event)
    {
        echo '<br> I am in Test3';
        die;
    }
}