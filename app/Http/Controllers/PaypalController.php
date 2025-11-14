<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{

    protected $provider;
    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    public function pago(Request $request)
    {
        // Lógica para procesar el pago con PayPal
        //return response()->json($request->all());
        $total = $request->input('total');
        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => config('paypal.currency'),
                        "value" => number_format($total, 2, '.', '')
                    ],
                    "description" => "Compra en Mi Tienda Online"
                ]
            ],
            "application_context" => [
                "return_url" => route('web.paypal.gracias'),
                "cancel_url" => route('web.paypal.cancelar'),
            ]
        ];

        $response = $this->provider->createOrder($data);

        try {
            $response = $this->provider->createOrder($data);
            if (isset($response['id']) && $response['status'] == 'CREATED') {
                // Redirigir al usuario a PayPal para completar el pago
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
                return redirect()->route('web.carrito.index')->with('mensaje', 'No se pudo redirigir a PayPal.')->with('icono', 'error');
            } else {
                return redirect()->route('web.carrito.index')->with('mensaje', 'Error al crear la orden de PayPal.')->with('icono', 'error');
            }
        } catch (\Exception $e) {
            return redirect()->route('web.carrito.index')->with('mensaje', 'Excepcion capturada: ' . $e->getMessage())->with('icono', 'error');
        }
    }

    public function gracias(Request $request)
    {
        // Lógica para mostrar la página de agradecimiento después del pago exitoso
        $token = $request->query('token');
        try {
            $response = $this->provider->capturePaymentOrder($token);
            
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Aquí puedes procesar la orden, guardar en base de datos, enviar correo, etc.
                return redirect()->route('web.carrito.index')->with('mensaje', 'Pago realizado con éxito. Gracias por su compra.')->with('icono', 'success');
            } else {
                return redirect()->route('web.carrito.index')->with('mensaje', 'El pago no se pudo completar.')->with('icono', 'error');
            }
        } catch (\Exception $e) {
            return redirect()->route('web.carrito.index')->with('mensaje', 'Excepcion capturada: ' . $e->getMessage())->with('icono', 'error');
        }
    }

    public function cancelar()
    {
        // Lógica para manejar la cancelación del pago
    }
}
