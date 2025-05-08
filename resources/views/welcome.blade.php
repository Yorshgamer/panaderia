<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function agregarAlCarrito(productoId) {
            axios.post("{{ route('carrito.agregar') }}", {
                producto_id: productoId
            }).then(() => location.reload());
        }

        function actualizarCantidad(productoId, accion) {
            axios.post('{{ route('carrito.actualizar') }}', {
                producto_id: productoId,
                accion: accion
            }).then(() => location.reload());
        }

        function eliminarDelCarrito(productoId) {
            axios.post('{{ route('carrito.eliminar') }}', {
                producto_id: productoId
            }).then(() => {
                location.reload();
            });
        }

        function vaciarCarrito() {
            axios.post("{{ route('carrito.vaciar') }}").then(() => location.reload());
        }

        function pagar() {
            document.getElementById('formPagar').submit();
        }
    </script>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        header a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Contenido principal */
        main {
            display: flex;
            padding: 20px;
        }

        /* Catálogo */
        section {
            width: 75%;
            padding: 20px;
        }

        section h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 15px;
        }

        .producto {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .producto:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(139, 94, 60, 0.15);
        }

        .producto img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .producto h3 {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #6b4226;
        }

        .producto p {
            font-size: 0.875rem;
            color: #8b7563;
            margin-bottom: 10px;
        }

        .producto .precio {
            background: #ffd8a8;
            color: #6b4226;
            padding: 8px;
            font-size: 1.2rem;
            margin: 0;
            text-align: center;
            font-weight: bold;
        }

        .producto button {
            width: 100%;
            padding: 10px;
            background-color: #8b5e3c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .producto button:hover {
            background: #6b4226;
        }

        /* Carrito lateral */


        aside h2 {
            font-family: 'Georgia', serif;
            color: #6b4226;
            font-size: 1.8rem;
            margin-bottom: 25px;
        }

        aside .item-carrito {
            margin-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 10px;
        }

        aside .item-carrito p {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 5px;
        }

        aside .item-carrito button {
            background-color: #e63946;
            border: none;
            color: white;
            padding: 5px 10px;
            font-size: 0.875rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        aside .item-carrito button:hover {
            background-color: #d62828;
        }

        aside .total {
            font-size: 1.125rem;
            font-weight: bold;
            margin-top: 20px;
        }

        aside .form-pago button {
            background-color: #2a9d8f;
            border: none;
            color: white;
            padding: 12px 20px;
            width: 100%;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        aside .form-pago button:hover {
            background-color: #21867a;
        }

        aside .vaciar-carrito {
            background-color: #e63946;
            border: none;
            color: white;
            padding: 10px 20px;
            width: 100%;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        aside .vaciar-carrito:hover {
            background-color: #d62828;
        }

        /* Texto de "carrito vacío" */
        aside .vacío {
            font-size: 1rem;
            color: #888;
            margin-top: 20px;
        }

        .item-carrito {
            background: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #e0c9b1;
        }

        .item-carrito p {
            color: #6b4226;
            font-weight: 600;
            margin: 5px 0;
        }

        .item-carrito button {
            background: #d4a373;
            border-radius: 5px;
            padding: 6px 12px;
            margin-top: 8px;
        }

        .total {
            color: #6b4226;
            font-size: 1.4rem;
            padding: 15px;
            background: #ffd8a8;
            border-radius: 10px;
        }

        .form-pago button {
            background: #6b4226;
            border-radius: 25px;
            font-size: 1.2rem;
            padding: 15px;
            transition: transform 0.3s;
        }

        .form-pago button:hover {
            background: #5c3d2e;
            transform: scale(1.02);
        }

        .vaciar-carrito {
            background: #c44536;
            border-radius: 25px;
        }

        .vacío {
            color: #8b7563;
            font-style: italic;
            text-align: center;
            padding: 20px;
        }

        /* Botones de cantidad */
        .item-carrito button[onclick*="actualizar"] {
            background: #e0c9b1;
            color: #6b4226;
            font-weight: bold;
        }

        .item-carrito button[onclick*="actualizar"]:hover {
            background: #d4a373;
        }

        .hero-banner {
            background-image: url('https://images.unsplash.com/photo-1517686469429-8bdb88b9f907?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 1px 1px 5px #000;
            padding: 80px 20px;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .nosotros {
            background: #fffdf7;
            padding: 40px 20px;
            text-align: center;
            color: #6b4226;
        }

        .nosotros h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .categorias-tabs {
            padding: 20px;
            text-align: center;
        }

        .tab-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .tab-buttons button {
            background: #ffd8a8;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            color: #6b4226;
            transition: 0.3s;
        }

        .tab-buttons button:hover {
            background: #f4b860;
        }

        .boton-carrito {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .carrito-desplegable {
            position: fixed;
            top: 0;
            right: -100%;
            width: 350px;
            height: 100vh;
            background: #f8f1e6;
            border-left: 3px solid #e0c9b1;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 999;
            transition: right 0.3s ease-in-out;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .carrito-desplegable h2 {
            font-family: 'Georgia', serif;
            color: #6b4226;
            font-size: 1.8rem;
            margin-bottom: 25px;
        }

        .carrito-desplegable.abierto {
            right: 0;
        }

        .cerrar-carrito {
            background: none;
            border: none;
            font-size: 1.5rem;
            float: right;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    {{-- HEADER --}}
    <header>
        <h1>Tienda Online</h1>
        <div>
            @auth
                <span>Hola, {{ auth()->user()->name }}</span>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
            <button id="toggleCarrito" class="boton-carrito">🛒</button>
        </div>
    </header>

    <section class="hero-banner">
        <div class="hero-content">
            <h1>Bienvenido a Panadería Dulce Hogar 🍞</h1>
            <p>Tu lugar favorito para los antojos más ricos y artesanales.</p>
        </div>
    </section>

    <section class="nosotros">
        <h2>Sobre Nosotros</h2>
        <p>Somos una panadería artesanal con amor por lo tradicional. Usamos ingredientes frescos y recetas caseras.</p>
    </section>

    <section class="categorias-tabs">
        <h2>Explora por Categoría</h2>
        <div class="tab-buttons">
            @foreach ($categorias as $categoria)
                <button onclick="filtrarCategoria('{{ $categoria->id }}')">{{ $categoria->nombre }}</button>
            @endforeach
        </div>
    </section>

    {{-- CONTENIDO PRINCIPAL --}}
    <main>
        {{-- CATALOGO DE PRODUCTOS --}}
        <section>
            @foreach ($categorias as $categoria)
                <div class="categoria-productos" id="cat-{{ $categoria->id }}">
                    <h2>{{ $categoria->nombre }}</h2>
                    <div class="grid">
                        @foreach ($categoria->productos as $producto)
                            <div class="producto">
                                <img src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}">
                                <h3>{{ $producto->nombre }}</h3>
                                <p>{{ $producto->descripcion }}</p>
                                <p class="precio">S/ {{ number_format($producto->precio, 2) }}</p>
                                <button onclick="agregarAlCarrito({{ $producto->id }})">Agregar</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>

        {{-- CARRITO LATERAL --}}
        <div id="carritoPanel" class="carrito-desplegable">
            <button onclick="cerrarCarrito()" class="cerrar-carrito">✖</button>
            <aside>
                <h2>🛒 Carrito</h2>
                @forelse ($carrito as $item)
                    <div class="item-carrito">
                        <p>{{ $item['nombre'] }}</p>
                        <div class="flex items-center gap-2 text-sm">
                            <button onclick="actualizarCantidad({{ $item['producto_id'] }}, 'restar')"
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">−</button>
                            <span>{{ $item['cantidad'] }}</span>
                            <button onclick="actualizarCantidad({{ $item['producto_id'] }}, 'sumar')"
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                        </div>
                        <p>Subtotal: S/ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</p>
                        <button onclick="eliminarDelCarrito({{ $item['producto_id'] }})">Eliminar</button>
                    </div>
                @empty
                    <p class="vacío">Tu carrito está vacío</p>
                @endforelse

                @if (count($carrito))
                    <div class="total">Total: S/ {{ number_format($total, 2) }}</div>

                    @auth
                        <form id="formPagar" method="POST" action="{{ route('carrito.checkout') }}" class="form-pago">
                            @csrf
                            <button type="button" onclick="mostrarBoleta()"
                                class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Pagar
                            </button>

                        </form>
                        <button onclick="vaciarCarrito()" class="vaciar-carrito">Vaciar carrito</button>
                    @else
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                @endif
            </aside>
        </div>

    </main>

    <script>
        function mostrarBoleta() {

            @auth
            const user = {
                nombre: "{{ auth()->user()->name }}",
                correo: "{{ auth()->user()->email }}",
                direccion: "{{ auth()->user()->direccion ?? 'No proporcionada' }}"
            };
        @else
            const user = null;
        @endauth


        // Si no hay usuario logueado, no seguir con la operación
        if (!user) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, inicia sesión para continuar con la compra.',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            });
            return; // No hacer nada más si no hay usuario
        }


        const carrito = @json($carrito);

        let itemsHTML = '';
        Object.values(carrito).forEach(item => {
            itemsHTML += `
                <tr>
                    <td>${item.nombre}</td>
                    <td>${item.cantidad}</td>
                    <td>S/ ${parseFloat(item.precio).toFixed(2)}</td>
                    <td>S/ ${(parseFloat(item.precio) * item.cantidad).toFixed(2)}</td>
                </tr>
            `;
        });

        const total = {{ number_format($total, 2, '.', '') }};

        Swal.fire({
            title: 'Boleta de Compra',
            html: `
                <div style="text-align: left; font-family: monospace;">
                    <p><strong>Cliente:</strong> ${user.nombre}</p>
                    <p><strong>Correo:</strong> ${user.correo}</p>
                    <p><strong>Dirección:</strong> ${user.direccion}</p>
                    <hr>
                    <table style="width:100%; text-align: left; font-size: 14px;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${itemsHTML}
                        </tbody>
                    </table>
                    <hr>
                    <p style="text-align: right;"><strong>Total:</strong> S/ ${total.toFixed(2)}</p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Confirmar Compra',
            cancelButtonText: 'Cancelar',
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formPagar').submit();
            }
        });
        }

        function filtrarCategoria(catId) {
            document.querySelectorAll('.categoria-productos').forEach(el => el.style.display = 'none');
            document.getElementById('cat-' + catId).style.display = 'grid';
        }

        // Mostrar la primera categoría por defecto al cargar
        document.addEventListener('DOMContentLoaded', () => {
            const primera = document.querySelector('.categoria-productos');
            if (primera) primera.style.display = 'grid';

            //caarrito
            const toggleBtn = document.getElementById('toggleCarrito');
            const carritoPanel = document.getElementById('carritoPanel');

            if (toggleBtn && carritoPanel) {
                toggleBtn.addEventListener('click', () => {
                    carritoPanel.classList.toggle('abierto');
                });

                function cerrarCarrito() {
                    carritoPanel.classList.remove('abierto');
                }

                window.cerrarCarrito = cerrarCarrito; // <-- Necesario si llamas cerrarCarrito desde onclick en HTML

                window.addEventListener('click', function(e) {
                    if (
                        carritoPanel.classList.contains('abierto') &&
                        !carritoPanel.contains(e.target) &&
                        e.target !== toggleBtn
                    ) {
                        cerrarCarrito();
                    }
                });
            }
        });
    </script>
</body>

</html>
