<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests as Middleware;

class ThrottleRequests extends Middleware
{
    /**
     * The maximum number of requests that a user can make within a given time period.
     *
     * @var array<int, int>
     */
    protected $maxAttempts = 60;  // Maksimum jumlah permintaan
    protected $decayMinutes = 1;  // Waktu reset permintaan dalam menit
}
