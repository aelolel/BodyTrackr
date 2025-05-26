<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\SubstituteBindings as Middleware;

class SubstituteBindings extends Middleware
{
    /**
     * The name of the route parameter to be used for substitution.
     *
     * @var string
     */
    protected $parameter = 'user'; // Ganti dengan nama parameter yang sesuai jika diperlukan
}
