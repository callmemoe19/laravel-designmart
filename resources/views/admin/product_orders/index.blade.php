<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.75rem;">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 112rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: white; overflow: hidden; padding: 2.5rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); border-radius: 0.375rem; display: flex; flex-direction: column; gap: 1.25rem;">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="padding: 1.25rem; background-color: #f56565; color: white; font-weight: 700;">
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @forelse ($my_orders as $order)
                <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                    <img src="{{ Storage::url($order->product->cover) }}" style="height: 100px; width: auto;" alt="">
                    <div>
                        <h3>{{ $order->product->name }}</h3>
                        <p>{{ $order->product->category->name }} </p>
                    </div>
                    <div>
                        <p style="margin-bottom: 0.5rem;">Rp {{ $order->total_price }}</p>
                        @if($order->is_paid)
                            <span style="padding: 0.5rem 1.25rem; border-radius: 9999px; background-color: #48bb78; color: white; font-weight: 700; font-size: 0.875rem;">
                                PAID 
                            </span>
                        @else()
                            <span style="padding: 0.5rem 1.25rem; border-radius: 9999px; background-color: #ed8936; color: white; font-weight: 700; font-size: 0.875rem;">
                                PENDING 
                            </span>
                        @endif
                    </div>
                    <div style="display: flex; flex-direction: row; gap: 0.75rem;">
                        <a href="{{ route('admin.product_orders.show', $order) }}" style="padding: 0.75rem 1.25rem; background-color: #5a67d8; color: white;">
                            Details
                        </a>
                        
                    </div>
                </div>
                @empty
                    <p>Belum ada Pembelian tersedia </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
