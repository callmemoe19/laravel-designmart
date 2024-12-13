<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.75rem;">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 112rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: white; overflow: hidden; padding: 2.5rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); border-radius: 0.5rem; display: flex; flex-direction: column; gap: 1.25rem;">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="padding: 1.25rem; background-color: #f56565; color: white; font-weight: 700;">
                                    {{$error}}
                                </li>
                            @endforeach    
                        </ul>
                    </div>
                @endif

                <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
                    <h3 style="color: #1a202c; font-weight: 700; font-size: 1.5rem;">My Transactions</h3>
                </div>
                @forelse($my_transactions as $transaction)
                    <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                        <div style="display: flex; flex-direction: row; align-items: center; gap: 1.25rem;">
                            <img src="{{Storage::url($transaction->product->cover)}}" style="border-radius: 1rem; height: 100px; width: auto;" alt="">
                            <div>
                                <h3 style="color: #1a202c; font-weight: 700; font-size: 1.25rem;">{{$transaction->product->name}}</h3>
                                <p style="color: #718096; font-size: 0.875rem;">{{$transaction->product->category->name}}</p>
                            </div>
                        </div>
                        <div>
                            <p style="color: #718096; font-size: 0.875rem;">Total Price:</p>
                            <p style="color: #1a202c; font-weight: 700; font-size: 1.25rem;">Rp {{$transaction->product->price}}</p>
                        </div>
                        <div>
                            <p style="color: #718096; font-size: 0.875rem;">Status:</p>
                            @if($transaction->is_paid)
                                <span style="padding: 0.25rem 0.75rem; border-radius: 9999px; background-color: #48bb78; color: white; font-weight: 700; font-size: 0.875rem;">
                                    SUCCESS
                                </span>
                            @else
                                <span style="padding: 0.25rem 0.75rem; border-radius: 9999px; background-color: #ed8936; color: white; font-weight: 700; font-size: 0.875rem;">
                                    PENDING
                                </span>
                            @endif 
                        </div>
                        <div style="display: flex; flex-direction: row; gap: 0.75rem;">

                            <a href="{{route('admin.product_orders.transactions.details', $transaction)}}" style="border-radius: 9999px; font-weight: 700; padding: 0.75rem 1.25rem; background-color: #5a67d8; color: white;">
                                View Details
                            </a>
                            <a href="{{ route('product-orders.cetak', $transaction->id) }}" target="_blank" style="border-radius: 9999px; font-weight: 700; padding: 0.75rem 1.25rem; background-color: #5a67d8; color: white;">
                                Print
                            </a>
                            
                        </div>
                    </div>
                @empty
                 <p>Belum ada transaksi Anda tersedia</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
