<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Configuracion\Configuracion;
use App\Models\User;
use App\Models\Empresa\Empresa;
use App\Models\Orden\Orden_cabecera;
use App\Models\Orden\Orden_detalle;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    //

    public function generarCotizacion(Request $request)
    {
       


         // Recibir los datos enviados desde AJAX
         $cotizaciones = $request->input('cotizaciones');
         $user = Auth::user();
         $empresa = Empresa::find($request->id_cliente);
        // dd($cotizaciones);
         $data = [
            'numero_cotizacion' => '123',
            'cotizaciones'=>$cotizaciones,
            'fecha' => now()->toDateString(),
            'vendedor' => $user,
            'cliente' =>  $empresa,
            'user'=>Auth::user(),
            'empresa' => [
                'nombre' => Configuracion::where('CONF_KEY','EMP_NOMBRE')->firstOrFail()->CONF_VALUE,
                'direccion' => Configuracion::where('CONF_KEY','EMP_RUC')->firstOrFail()->CONF_VALUE,
                'ruc' => Configuracion::where('CONF_KEY','EMP_DIRECCION')->firstOrFail()->CONF_VALUE,
                'logo' => 'path/to/your/logo.png'
            ],
        ];    

        // dd($data);

        return $this->pdfOrden($data);
    }


    public function generateOrden($id){
                // Recibir los datos enviados desde AJAX
                // dd($id);
                $orden = Orden_cabecera::find($id);
                $cotizaciones = Orden_detalle::where('ORD_ID_ORDEN_CABECERA',$orden->ORD_DET_ID)->where('ORD_DET_DELETE',0)->get();
               
                $user = Auth::user();
                $empresa = Empresa::find($orden->ORD_ID_CLIENTE);
                $data = [
                   'numero_cotizacion' => '123',
                   'cotizaciones'=>$cotizaciones,
                   'fecha' => now()->toDateString(),
                   'vendedor' => $user,
                   'cliente' =>  $empresa,
                   'empresa' => [
                       'nombre' => Configuracion::where('CONF_KEY','EMP_NOMBRE')->firstOrFail()->CONF_VALUE,
                       'direccion' => Configuracion::where('CONF_KEY','EMP_RUC')->firstOrFail()->CONF_VALUE,
                       'ruc' => Configuracion::where('CONF_KEY','EMP_DIRECCION')->firstOrFail()->CONF_VALUE,
                       'logo' => 'path/to/your/logo.png'
                   ],
               ];    
       
               return $this->pdfOrden($data);
    }

    public function pdfOrden($data){


          // dd($data['vendedor']->email);
          $pdf = PDF::loadView('Pdf.Orden', $data);
        
          $pdf->setPaper('a4', 'landscape');
          $pdf->setOptions([
              'isHtml5ParserEnabled' => true,
              'isRemoteEnabled' => true,
              'margin_top' => 0,
              'margin_left' => 0,
              'margin_bottom' => 20, 
              'margin_right' => 0,
          ]);
  
          return $pdf->stream('cotizacion-' . $data['numero_cotizacion'] . '.pdf');

    }
}
