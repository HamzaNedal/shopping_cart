<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
            
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 gap-4">

    
    @foreach ($products as $product)
    
 <div class="m-auto px-4 py-8 max-w-xl">
   
     <div class="bg-white shadow-2xl" >
        <div>
            <img src="{{ $product->image }}">
        </div>
        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800">{{ $product->name }}</h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora reiciendis ad architecto at aut placeat quia, minus dolor praesentium officia maxime deserunt porro amet ab debitis deleniti modi soluta similique...
                </p>
            <div class="user flex items-center -ml-3 mt-8 mb-4">
                <small>{{ $product->price }}$</small>
                <div>
                    <a  href="{{ route('add_to_cart',['product'=>$product->id]) }}" class="h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Buy</a>
                </div>
                {{-- <div class="user-logo">
                    <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full mx-4  shadow" src="https://images.unsplash.com/photo-1607789382281-1152591ec0da?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="avatar">
                </div> --}}
                    {{-- <a href="https://twitter.com/GressierCosme1" target="_blank" class="text-gray-500">@GressierCosme1</a> --}}
            </div>
        </div>
    </div>
    
</div>
@endforeach

</div>
    {{ $products->links() }}
</x-app-layout>