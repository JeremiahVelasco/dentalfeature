<?php

namespace App\Http\Controllers;

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use App\Notifications\InvoiceNotification;

class EmailController extends Controller
{
    public function index()
    {
        $invoiceMailData = [
            'to_name' => "Jeremiah Velasco",
            'subject' => 'Dental Appointment Booking',
            'file_name' => '',
            'invoice_public_url' => env('BASE_URL') . ''
        ];

        Notification::route('mail', 'carolinecdaliguesdmdinc@gmail.com')->notify(new InvoiceNotification($invoiceMailData));
        return response()->json([
            'status' => true,
            'message' => 'Email Sent Successfully'
        ]);
    }
}
