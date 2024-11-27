<div class="bg-gray-100 py-10">
    <div class="container mx-auto px-4 lg:px-20">
        <!-- Título de la Categoría -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold uppercase text-gray-800">Detalle de Categoría: {{ $categoria->name }}</h1>
        </div>

        <!-- Título de Productos Similares -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold uppercase text-gray-700 text-left">Productos Similares por Categoría</h2>
        </div>

        <!-- Productos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if($productos->isEmpty())
                <div class="col-span-full text-center text-gray-500">
                    <p>No hay productos para esta categoría.</p>
                </div>
            @else
                @foreach($productos as $item)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-4">
                        <!-- Categoría -->
                        <div class="absolute top-4 right-4 bg-blue-500 text-white text-sm rounded-full px-3 py-1">
                            {{ $item->category->name }}
                        </div>

                        <!-- Imagen del Producto -->
                        <div class="relative overflow-hidden rounded-lg h-40 mb-4">
                            <img src="{{ $item->images->isNotEmpty() ? Storage::url($item->images->first()->url) : '/img/default.png' }}"
                                alt="{{ $item->nombre }}"
                                class="object-cover object-center w-full h-full">
                        </div>

                        <!-- Detalles del Producto -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 truncate">{{ $item->nombre }}</h3>
                            <div class="flex items-center text-yellow-500 text-sm mt-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                <span class="ml-2 text-gray-500 font-medium">330 vendido(s)</span>
                            </div>
                            <div class="mt-3 text-gray-800">
                                <span class="text-xl font-extrabold">S/.{{$item->precio}}</span>
                                <span class="text-sm font-medium text-gray-500">PEN</span>
                            </div>
                        </div>

                        <!-- Botón "Ver Más" -->
                        <div class="mt-4">
                            <a href="{{ route('producto.detalle', $item->id) }}"
                                class="block w-full text-center bg-black text-white py-2 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">
                                Ver Más
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
