<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
            
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 gap-4">
        <table class="table-fixed">
            <thead>
              <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
              
            </thead>
            <tbody>
               
                @foreach ($orders as $order)
                    
                    @foreach ($order->items as $product)
              
                    <tr>
                        <td>{{ $product['title'] }}</td>
                        <td>{{ $product['price'] }}$</td>
                        <td>{{ $product['qty'] }}</td>
                    </tr>
                    @endforeach
                   
                    <tr class="bg-blue-200">
                        <td></td>
                        <td>{{ $order->totalPrice }}$</td>
                        <td> {{ $order->totalQTY }}</td>
                        
                    </tr>
                 
                @endforeach
             
              
            </tbody>
          </table>
        
    </div>
</x-app-layout>