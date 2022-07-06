@extends('layouts.app')


@section('content')
  <div class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Add a Product</h2>
      <p class="mb-4">Create a new product</p>
    </header>

    <form method="POST" action="/products" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">Product Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
          value="{{old('name')}}" />

        @error('name')
        <p class="text-indigo-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="price" class="inline-block text-lg mb-2">Price</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
          value="{{old('price')}}" />

        @error('price')
        <p class="text-indigo-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <!-- <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Comma Separated)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> -->

      <div class="mb-6">
        <label for="image" class="inline-block text-lg mb-2">
          Product Image
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

        @error('image')
        <p class="text-indigo-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Product Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Include usage, specifications, size etc.">{{old('description')}}</textarea>

        @error('description')
        <p class="text-indigo-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-indigo-500 text-white rounded py-2 px-4 hover:bg-black">
          Create Product
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
</div>
@endsection
