<?php

declare(strict_types=1);

namespace Core\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Response;

class NotFoundException extends HttpException
{
    public function __construct(string $message = '')
    {
        parent::__construct(Response::HTTP_NOT_FOUND, empty($message) ? 'Not found.' : $message);
    }
}
