<?php


namespace App\Exception;


class MaximumRentalDurationException extends CSEException
{
    protected $defaultCode = 403;
    protected $defaultMessage = 'Maximum rental duration exceeded';
}