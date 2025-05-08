<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías con sus productos
        $categorias = Categoria::with(['productos' => function ($query) {
            $query->where('estado', 'activo'); // O como manejes estado
        }])->get();
        $carrito = Session::get('carrito', []);
        return view('welcome', compact('categorias'));
    }
    // Agregar producto al carrito
    public function agregarAlCarrito(Request $request)
    {
        $productoId = $request->input('producto_id');
        $cantidad = $request->input('cantidad', 1);

        $producto = Producto::findOrFail($productoId);

        $carrito = Session::get('carrito', []);

        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad'] += $cantidad;
        } else {
            $carrito[$productoId] = [
                'producto_id' => $productoId,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'imagen_url' => $producto->imagen_url
            ];
        }

        Session::put('carrito', $carrito);

        return response()->json(['success' => true, 'message' => 'Producto agregado al carrito']);
    }

    // Eliminar producto del carrito
    public function eliminarDelCarrito(Request $request)
    {
        $productoId = $request->input('producto_id');

        $carrito = Session::get('carrito', []);

        if (isset($carrito[$productoId])) {
            unset($carrito[$productoId]);
            Session::put('carrito', $carrito);
        }

        return response()->json(['success' => true, 'message' => 'Producto eliminado del carrito']);
    }

    // Vaciar todo el carrito
    public function vaciarCarrito()
    {
        Session::forget('carrito');
        return response()->json(['success' => true, 'message' => 'Carrito vaciado']);
    }

    // Procesar la compra
    public function procesarCompra(Request $request)
    {
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->back()->with('error', 'Tu carrito está vacío');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar la compra.');
        }

        $user = Auth::user();

        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);

        $venta = Venta::create([
            'user_id' => $user->id,
            'fecha' => now(),
            'total' => $total,
            'tipo_pago' => $request->input('tipo_pago', 'efectivo'),
            'numero_comprobante' => 'BOL-' . strtoupper(uniqid()),
            'estado' => 'completado',
            'observaciones' => $request->input('observaciones'),
            'forma_entrega' => $request->input('forma_entrega', 'recojo'),
        ]);

        foreach ($carrito as $item) {
            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $item['producto_id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
                'subtotal' => $item['precio'] * $item['cantidad'],
                'descripcion' => $item['nombre'],
            ]);
        }

        Session::forget('carrito');

        return redirect('/')->with('success', 'Compra realizada correctamente. ¡Gracias!');
    }
}
