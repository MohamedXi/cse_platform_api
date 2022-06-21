<?php 
namespace App\EventListener;

use App\Exception\CSEException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();
            
        // Customize your response object to display the exception details
        $response = new Response();

        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        $message  = Response::$statusTexts[$code];

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->headers->replace($exception->getHeaders());
            $code = $exception->getStatusCode();

        }elseif($exception instanceof CSEException){
            $code = $exception->getCode();
            $message = $exception->getMessage();

        }

        $response->setStatusCode($code);
        $messageArray  = array('message' => $message, 'code' => $code);


        $response->setContent(json_encode($messageArray));
        // sends the modified response object to the event
        $event->setResponse($response);
    }
}