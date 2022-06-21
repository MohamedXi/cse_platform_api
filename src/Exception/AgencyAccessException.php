<?php


namespace App\Exception;


class AgencyAccessException extends CSEException
{
    protected $defaultCode = 403;
    protected $defaultMessage = 'You cannot reserve an item from another agency !';
}
