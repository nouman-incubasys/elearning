<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'api/users/register',
        'api/users/all',
        'api/users/login',
        'api/dailyprayer/search{date}',
        'api/comment/store',
        'api/bible/booksearch'
    ];
}
