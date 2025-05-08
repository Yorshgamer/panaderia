<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Usa Tailwind u otro si prefieres --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function agregarAlCarrito(productoId) {
            axios.post("{{ route('carrito.agregar') }}", {
                producto_id: productoId
            }).then(() => location.reload());
        }

        function eliminarDelCarrito(productoId) {
            axios.post("{{ route('carrito.eliminar') }}", {
                producto_id: productoId
            }).then(() => location.reload());
        }

        function vaciarCarrito() {
            axios.post("{{ route('carrito.vaciar') }}").then(() => location.reload());
        }

        function pagar() {
            document.getElementById('formPagar').submit();
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- HEADER --}}
    <header class="flex justify-between items-center p-4 bg-white shadow">
        <h1 class="text-xl font-bold">Tienda Online</h1>
        <div>
            @auth
                <span class="mr-3">Hola, {{ auth()->user()->name }}</span>
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="mr-3 text-blue-600 hover:underline">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                @endif
            @endauth
        </div>
    </header>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex">
        {{-- CATALOGO DE PRODUCTOS --}}
        <section class="w-3/4 p-6">
            @foreach ($categorias as $categoria)
                <h2 class="text-2xl font-semibold mb-3">{{ $categoria->nombre }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                    @foreach ($categoria->productos as $producto)
                        <div class="bg-white p-4 rounded shadow">
                            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-32 object-cover rounded mb-2">
                            <h3 class="text-lg font-medium">{{ $producto->nombre }}</h3>
                            <p class="text-sm text-gray-600">{{ $producto->descripcion }}</p>
                            <p class="text-gray-800 font-bold mt-2">S/ {{ number_format($producto->precio, 2) }}</p>
                            <button onclick="agregarAlCarrito({{ $producto->id }})" class="mt-2 w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Agregar
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>

        {{-- CARRITO LATERAL --}}
        <aside class="w-1/4 p-6 bg-white shadow-lg border-l h-screen overflow-y-auto sticky top-0">
            <h2 class="text-xl font-semibold mb-4">🛒 Carrito</h2>

            @forelse ($carrito as $item)
                <div class="mb-4 border-b pb-2">
                    <p class="font-medium">{{ $item['nombre'] }}</p>
                    <p class="text-sm">Cantidad: {{ $item['cantidad'] }}</p>
                    <p class="text-sm">Subtotal: S/ {{ number_format($item['subtotal'], 2) }}</p>
                    <button onclick="eliminarDelCarrito({{ $item['id'] }})" class="text-red-500 text-xs hover:underline">
                        Eliminar
                    </button>
                </div>
            @empty
                <p class="text-sm text-gray-500">Tu carrito está vacío</p>
            @endforelse

            @if (count($carrito))
                <p class="font-bold mt-4">Total: S/ {{ number_format($total, 2) }}</p>

                @auth
                    <form id="formPagar" method="POST" action="{{ route('carrito.pagar') }}">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">
                        <button type="button" onclick="pagar()" class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Pagar
                        </button>
                    </form>
                    <button onclick="vaciarCarrito()" class="w-full mt-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Vaciar carrito
                    </button>
                @else
                    <p class="mt-4 text-sm text-red-500">Inicia sesión para continuar con la compra.</p>
                @endauth
            @endif
        </aside>
    </main>
</body>
</html>
