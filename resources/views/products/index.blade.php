@extends('layouts.app')

@section('content')
<section class="text-gray-700 body-font">
        <div class="container flex flex-col px-5 py-24 mx-auto">
            @foreach($products as $product)
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full mb-4">
                    <a class="block relative h-48 rounded overflow-hidden" href= "/products/{{ $product->id}}">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full mb-4">
                    <!-- <router-link
                        class="block relative h-48 rounded overflow-hidden"
                        :to="{name: 'products.show', params: {slug: product.slug}}"
                    >
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                    </router-link> -->
                    <div class="mt-4">
                        <h2
                            class="text-gray-900 title-font text-lg font-medium"
                        >{{ $product->name }}</h2>
                        <p class="mt-1">{{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>

@auth
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-indigo-600 text-white h-24 mt-24 opacity-90 md:justify-center">
    <a href="/product/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Product</a>
</footer>
@endauth
@endsection