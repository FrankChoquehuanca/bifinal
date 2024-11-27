<div>

    <div class="bg-white pt-5 pb-10">

        <div class="px-2 xl:px-20 lg:px-20 md:px-15 sm:px-5">
            <div class="flex flex-col gap-8">
                <div class="bg-white pt-8 pb-16">

                    <div class="px-6 xl:px-20 lg:px-20 md:px-15 sm:px-5">
                        <div class="flex flex-col gap-12">

                            <!-- Mensaje de éxito (si existe) -->
                            @if ($mensaje)
                                <div class="alert alert-success mb-6">
                                    {{ $mensaje }}
                                </div>
                            @endif

                            <samp class="font-mono italic  text-2xl text-gray-800 uppercase mb-8">Detalle de
                                Producto</samp>

                            <div class="flex flex-col lg:flex-row gap-10">

                                <!-- Imagen del Producto -->
                                <div class="w-full lg:w-1/2 flex justify-center items-center">
                                    <div class="relative group w-full h-96 rounded-xl overflow-hidden">
                                        <img src="{{ $producto->images->isNotEmpty() ? Storage::url($producto->images->first()->url) : '/img/default.png' }}"
                                            class="object-cover w-full h-full transition-transform duration-500 ease-in-out transform group-hover:scale-105"
                                            alt="{{ $producto->nombre }}">
                                        <div
                                            class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </div>
                                </div>

                                <!-- Detalles del Producto -->
                                <div class="w-full lg:w-1/2 flex flex-col gap-6">
                                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $producto->nombre }}</h1>
                                    <p class="text-lg text-gray-700">{{ $producto->descripcion }}</p>

                                    <!-- Precio y Stock -->
                                    <div class="flex items-center space-x-6 text-lg text-gray-800">
                                        <p class="font-semibold">Precio:</p>
                                        <p class="text-3xl font-extrabold text-red-600">S/.{{ $producto->precio }}</p>
                                    </div>
                                    <div class="flex items-center space-x-6 text-lg text-gray-800">
                                        <p class="font-semibold">Stock disponible:</p>
                                        <p class="text-xl">{{ $producto->stock }}</p>
                                    </div>

                                    <!-- Categoría del Producto -->
                                    <div class="mt-4">
                                        <span class="text-white bg-red-700 px-6 py-2 rounded-full font-bold">
                                            {{ $producto->category->name }}
                                        </span>
                                    </div>

                                    <!-- Botón de Agregar al Carrito -->
                                    {{-- <div class="mt-6">
                                        <button class="w-full py-3 bg-black text-white text-xl font-bold rounded-3xl hover:bg-gray-800 transition duration-300 ease-in-out">
                                            Agregar al carrito
                                        </button>
                                    </div> --}}
                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                <samp class="font-mono italic uppercase px-4">PRODUCTOS SIMILARES POR CATEGORIA</samp>
                <div class="flex flex-row flex-wrap sm:flex-grow-0 justify-center gap-6">

                    @foreach ($similares as $item)
                        <div
                            class="flex flex-shrink-0 w-full sm:w-auto flex-col items-center justify-center xl:justify-start lg:justify-start md:justify-start sm:justify-center">
                            <div
                                class="w-[15rem] relative group h-auto rounded-2xl transition-all duration-300 ease-in-out hover:border hover:border-gray-400 hover:pb-16">

                                <!-- Categoría del Producto -->
                                <div class="bg-blue-300 text-white absolute z-10 right-5 top-5 rounded-full px-5">
                                    {{ $item->category->name }}
                                </div>

                                <!-- Imagen del Producto con zoom en hover -->
                                <div class="relative overflow-hidden rounded-t-2xl">
                                    <img src="{{ $item->images->isNotEmpty() ? Storage::url($item->images->first()->url) : '/img/default.png' }}"
                                        class="rounded-t-2xl object-cover object-center h-auto w-full transition-transform transform group-hover:scale-105"
                                        alt="{{ $item->nombre }}">
                                </div>

                                <!-- Detalles del Producto -->
                                <div class="pt-1">
                                    <span class="font-bold truncate block ml-2">{{ $item->nombre }}</span>
                                    <div class="flex gap-1 justify-start items-center text-xs mt-2 ml-2">
                                        <div class="flex flex-row text-yellow-400">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <samp class="font-extrabold p-0 m-0 ml-2"> 330 vendido(s)</samp>
                                    </div>
                                    <div class="w-full text-sm font-extrabold pt-0.5 ml-2">
                                        <span class="text-2xl font-bold">
                                            <span class="text-lg">PEN</span>
                                            S/.{{ $item->precio }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Botón de Ver Más (sin cambios) -->
                                <div class="flex justify-center items-center mt-1">
                                    <a href="{{ route('producto.detalle', $item->id) }}"
                                        class="absolute w-11/12 text-center rounded-3xl bg-purple-950 text-white px-10 py-2 opacity-0 transition-opacity group-hover:opacity-100 group-hover:mt-10">
                                        VER MÁS
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <style>
        .icon-cart-cc {
            content: '';
            background-image: url('/img/cart-icon-white.webp');
            background-size: cover;
            background-position: center;
            width: 3rem;
            height: 3rem;
        }

        .icon-cart-cc:hover {
            content: '';
            background-image: url('/img/cart-icon-black.webp');
            background-size: cover;
            background-position: center;
            width: 3rem;
            height: 3rem;
        }
    </style>

</div>
