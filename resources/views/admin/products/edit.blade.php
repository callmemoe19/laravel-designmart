<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.75rem;">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 48rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: white; overflow: hidden; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); padding: 2.5rem; border-radius: 0.5rem;">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="padding: 1.25rem; background-color: #f56565; color: white; font-weight: bold;">
                                    {{$error}}
                                </li>
                            @endforeach    
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1 style="color: #3c366b; font-size: 1.875rem; font-weight: bold;">Edit Product</h1>

                    <div style="margin-top: 1rem;">
                        <x-input-label for="cover" :value="__('existing cover')" />
                        <img src="{{Storage::url($product->cover)}}" style="height: 100px; width: auto;" alt="">
                        <x-text-input id="cover" style="display: block; margin-top: 0.25rem; width: 100%;" type="file" name="cover" />
                        <x-input-error :messages="$errors->get('cover')" style="margin-top: 0.5rem;" />
                    </div>

                    <div style="margin-top: 1rem;">
                        <x-input-label for="path_file" :value="__('path_file')" />
                        <p>
                            {{Storage::url($product->path_file)}}
                        </p>
                        <x-text-input id="path_file" style="display: block; margin-top: 0.25rem; width: 100%;" type="file" name="path_file" />
                        <x-input-error :messages="$errors->get('path_file')" style="margin-top: 0.5rem;" />
                    </div>
            
                    <!-- Name -->
                    <div style="margin-top: 1rem;">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input value="{{$product->name}}" id="name" style="display: block; margin-top: 0.25rem; width: 100%;" type="text" name="name" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" style="margin-top: 0.5rem;" />
                    </div>

                    <div style="margin-top: 1rem;">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input value="{{$product->price}}" id="price" style="display: block; margin-top: 0.25rem; width: 100%;" type="number" name="price" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" style="margin-top: 0.5rem;" />
                    </div>
                    
                    <div style="margin-top: 1rem;">
                        <x-input-label for="category" :value="__('category')" />
                        <select name="category_id" id="category" style="width: 100%; padding: 0.75rem 1.25rem; border: 1px solid #e2e8f0;">
                            <option value="{{$product->category->id}}" selected>{{$product->category->name}}</option>
                            // perulangan data category dari database
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('category')" style="margin-top: 0.5rem;" />
                    </div>

                    <div style="margin-top: 1rem;">
                        <x-input-label for="about" :value="__('about')" />
                        <textarea name="about" id="about" style="width: 100%; padding: 0.75rem 1.25rem; border: 1px solid #e2e8f0;">{{$product->about}}</textarea>
                        <x-input-error :messages="$errors->get('category')" style="margin-top: 0.5rem;" />
                    </div>
            
                    <div style="display: flex; align-items: center; justify-content: flex-end; margin-top: 1rem;">
            
                        <x-primary-button style="margin-left: 1rem;">
                            {{ __('Update Product') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
