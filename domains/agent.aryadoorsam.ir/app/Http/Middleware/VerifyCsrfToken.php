<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        
	'http://agent.aryadoorsam.ir/clients/get_info',
	'http://agent.aryadoorsam.ir/address/getProvince_setCity',
	'http://agent.aryadoorsam.ir/order/set/support_serial'	,
	'http://agent.aryadoorsam.ir/ticket/gettype_id'
    ];
}
