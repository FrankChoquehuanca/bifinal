<div>
    <div class="bg-white pt-5 pb-10">

        <div class="px-4 xl:px-20 lg:px-20 md:px-15 sm:px-5">
            <div class="flex flex-col gap-8">
                <!-- Categorías -->
                <div class="flex flex-col px-4 gap-4">
                    <samp class="font-semibold text-xl text-gray-700 uppercase">Categorias</samp>
                    <div class="flex gap-4 flex-wrap">
                        @foreach ($categorias as $item)
                            <a href="{{ route('productos.categoria', $item->id) }}"
                                class="px-8 py-3 rounded-full text-black font-semibold border border-gray-300 hover:bg-black hover:text-white focus:bg-black transition duration-300 ease-in-out">
                                {{ $item->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <samp class="font-mono italic uppercase px-4 text-2xl text-gray-800">Productos Similares por
                    Categoría</samp>

                <div class="bg-white py-10">
                    <div class="px-6 xl:px-20 lg:px-20 md:px-15 sm:px-5">

                        <div class="flex flex-wrap justify-center gap-8 mt-4">
                            @foreach ($productos as $item)
                                <!-- Tarjeta de Producto -->
                                <div
                                    class="w-72 bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl hover:scale-105 transition-transform duration-300">
                                    <!-- Imagen -->
                                    <div class="relative group h-56">
                                        <img src="{{ $item->images->isNotEmpty() ? Storage::url($item->images->first()->url) : '/img/default.png' }}"
                                            class="object-cover w-full h-full rounded-t-2xl" alt="{{ $item->nombre }}">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                        <!-- Categoría -->
                                        <div
                                            class="absolute top-3 right-3 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                            {{ $item->category->name }}
                                        </div>
                                    </div>
                                    <!-- Contenido -->
                                    <div class="p-4">
                                        <h3 class="font-bold text-lg truncate">{{ $item->nombre }}</h3>
                                        <div class="flex items-center text-yellow-500 mt-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="text-gray-600 text-sm font-medium ml-2">330 vendido(s)</span>
                                        </div>
                                        <div class="text-gray-900 font-extrabold text-xl mt-4">
                                            <span class="text-sm font-medium">PEN</span> S/.{{ $item->precio }}
                                        </div>
                                        <!-- Botón -->
                                        <a href="{{ route('producto.detalle', $item->id) }}"
                                            class="block text-center bg-black text-white py-2 rounded-full mt-4 hover:bg-gray-800 transition duration-300">
                                            VER MÁS
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
