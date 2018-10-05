<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "es/admin/promotion/read",
        "en/admin/promotion/read",
        "es/admin/promotion/readMain",
        "en/admin/promotion/readMain",
        "es/admin/slider/read",
        "en/admin/slider/read",
        "es/admin/guide/read",
        "en/admin/guide/read",
        "es/guideSendEmail",
        "en/guideSendEmail",
    ];
}
