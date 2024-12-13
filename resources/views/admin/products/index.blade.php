<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.75rem;">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 112rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: white; overflow: hidden; padding: 2.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border-radius: 0.5rem; display: flex; flex-direction: column; gap: 1.25rem;">

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
                    <h3 style="color: #2c5282; font-weight: 700; font-size: 1.5rem;">My Products</h3>
                    <a href="{{route('admin.products.create')}}" style="border-radius: 9999px; padding: 0.75rem 1.25rem; background-color: #2c5282; color: white;">
                        Add New Product
                    </a>
                </div>
                @forelse($products as $product)
                    <div class="item-product" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                        <div style="display: flex; flex-direction: row; align-items: center; gap: 1.25rem;">
                            <img src="{{Storage::url($product->cover)}}" style="border-radius: 1rem; height: 100px; width: auto;" alt="">
                            <div>
                                <h3 style="color: #2c5282; font-weight: 700; font-size: 1.25rem;">{{$product->name}}</h3>
                                <p style="color: #718096; font-size: 0.875rem;">{{$product->category->name}}</p>
                            </div>
                        </div>
                        <div>
                            <p style="color: #2c5282; font-weight: 700; font-size: 1.25rem;">Rp {{number_format($product->price)}}</p>
                        </div>
                        <div style="display: flex; flex-direction: row; gap: 0.75rem;">
                            <a href="{{route('admin.products.edit', $product)}}" style="border-radius: 9999px; font-weight: 700; padding: 0.75rem 1.25rem; background-color: #667eea; color: white;">
                                Edit
                            </a>

                            <form action="{{route('admin.products.destroy', $product)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border-radius: 9999px; padding: 0.75rem 1.25rem; background-color: #f56565; color: white;">
                                    Delete
                                </button>
                            </form>
                            
                        </div>
                    </div>
                @empty
                    <p>Belum ada produk tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
