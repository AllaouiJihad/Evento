<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    //
    public function generatePDF($ticket)
    {
        
        $ticket = Ticket::where('id',$ticket)->first();
       
        $data = 
            [
                'title' => $ticket->event->title,
                'prix' => $ticket->price,
                'type' => $ticket->type
            ];
        $pdf = PDF::loadView('ticket', $data);
        return $pdf->download('document.pdf');
    }
}
