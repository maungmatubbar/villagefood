<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index()
    {
        $invoices = Invoice::with('address','user','orders')->get();
    }
}
