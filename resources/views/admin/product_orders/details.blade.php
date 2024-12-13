<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.75rem;">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 48rem; margin: 0 auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: #ffffff; overflow: hidden; padding: 2.5rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); border-radius: 0.375rem; display: flex; flex-direction: column; gap: 1.25rem;">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="padding: 1.25rem; background-color: #f56565; color: #ffffff; font-weight: 700;">
                                    {{$error}}
                                </li>
                            @endforeach    
                        </ul>
                    </div>
                @endif
                
                <div style="display: flex; flex-direction: column; gap: 2.5rem;">
                    <img src="{{Storage::url($order->product->cover)}}" style="height: auto; width: 300px;" alt="">
                    <div>
                        <h3>{{$order->product->name}}</h3>
                        <p>{{$order->product->category->name}}</p>
                    </div>
                    <hr>
                    <p style="font-size: 0.875rem; color: #718096; font-weight: 700;">{{$order->buyer->name}}</p>
                    <hr>
                    <div style="display: flex; flex-direction: row; gap: 1.25rem; align-items: center;">
                        <p style="margin-bottom: 0.5rem;">Rp {{$order->total_price}}</p>
                        @if($order->is_paid)
                            <span style="padding: 0.5rem 1.25rem; border-radius: 9999px; background-color: #48bb78; color: #ffffff; font-weight: 700; font-size: 0.875rem;">
                                PAID
                            </span>
                        @else
                            <span style="padding: 0.5rem 1.25rem; border-radius: 9999px; background-color: #ed8936; color: #ffffff; font-weight: 700; font-size: 0.875rem;">
                                PENDING
                            </span>
                        @endif    
                        
                    </div>
                    <img src="{{Storage::url($order->proof)}}" style="height: auto; width: 300px;" alt="">

                    @if($order->is_paid)
                    @else
                        <div style="display: flex; flex-direction: row; gap: 0.75rem;">
                            <form action="{{route('admin.product_orders.update', $order)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" style="padding: 0.75rem 1.25rem; background-color: #5a67d8; color: #ffffff;">
                                    Approve Now
                                </button>
                            </form>
                            
                        </div>
                    @endif
                </div>
                    
            </div>
        </div>
    </div>
</x-app-layout>
