<?php

use Illuminate\Support\Facades\Schedule;

Schedule::call('app:set-currency-command')->daily();
