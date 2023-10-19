<?php

declare(strict_types=1);

namespace Core\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ResponseException extends HttpException
{
    public function __construct()
    {
        parent::__construct(400, 'Unknown instance.');
    }
}
