<?php 
// src/EventListener/ExceptionListener.php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
//use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
//use Symfony\WebpackEncoreBundle\EventListener\ExceptionListener;

class RequestListener
{
   // return true;
    public function onKernelRequest(RequestEvent $event)
    {
        echo 'Request Listener';


    }
}