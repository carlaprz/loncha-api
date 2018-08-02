<?php

namespace ApiBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $code = 500;
        $data = ['error' => 'Server Error'];
        $exception = $event->getException();

        if ($exception instanceof NotFoundHttpException) {
            $code = 404;
            $data = ['error' => $exception->getMessage()];
        }

        // sends the modified response object to the event
        $event->setResponse(new JsonResponse($data, $code));
    }
}