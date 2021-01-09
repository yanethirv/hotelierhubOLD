<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Cashier\Exceptions\IncompletePayment;

class ServiceRecurringController extends Controller
{
    public function index() {

        return view("services-recurring.index");
    }
}
