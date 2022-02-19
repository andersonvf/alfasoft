<?php
 
namespace App\Http\Controllers\ExtraActions;
 
use PDF;
use \App\Models\Client;
use App\Http\Controllers\Controller;
 
class ClientPdf extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $clients = Client::get();

        $pdf = PDF::loadView('clients.list_pdf', compact('clients'));

        return $pdf->download('Lista de Clientes.pdf');
    }
}