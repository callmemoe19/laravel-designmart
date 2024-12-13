<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #2d3748; line-height: 1.5;">
            {{ __('Creator Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding-top: 3rem; padding-bottom: 3rem;">
        <div style="max-width: 48rem; margin: 0 auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            <div style="background-color: white; overflow: hidden; padding: 2.5rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); border-radius: 0.375rem; display: flex; flex-direction: column; gap: 1.25rem;">

                @if($errors->any())
                    <div style="color: #e3342f; background-color: #f8d7da; border-color: #f5c6cb; padding: 1rem; border-radius: 0.375rem;">
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
                    <h3 style="color: #3c366b; font-weight: 700; font-size: 1.5rem;">Overview</h3>
                </div>

                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <div>
                        <p style="color: #718096; font-size: 0.875rem;">Total Product:</p>
                        <p style="color: #3c366b; font-weight: 700; font-size: 1.25rem;">{{count($my_products)}}</p>
                    </div>
    
                    <div>
                        <p style="color: #718096; font-size: 0.875rem;">Total Order:</p>
                        <p style="color: #3c366b; font-weight: 700; font-size: 1.25rem;">{{count($total_order_success)}}</p>
                    </div>
    
                    <div>
                        <p style="color: #718096; font-size: 0.875rem;">Total Revenue:</p>
                        <p style="color: #3c366b; font-weight: 700; font-size: 1.25rem;">Rp {{number_format($my_revenue)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
