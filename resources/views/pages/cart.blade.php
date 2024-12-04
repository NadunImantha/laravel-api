@extends('layouts.app')

@section('content')
    <div>
        <div class="w-2/3 mx-auto">
            <div class="bg-white shadow-md rounded my-6">
                @if (count($cart) > 0)
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Name</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Price</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Quantity</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Subtotal</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $id => $item)
                                <tr class="hover:bg-grey-lighter" data-id="{{ $id }}">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $item['product']->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">$ {{ $item['product']->price }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $item['quantity'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        $ {{ $item['product']->price * $item['quantity'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <form action="{{ route('remove.from.cart') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit"
                                                class="text-green-600 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark cursor-pointer remove_from_cart">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right w-full p-6">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Checkout
                        </button>
                    </div>
                @else
                    <div class="text-center w-full border-collapse p-6">
                        <span class="text-lg">Your cart is empty!</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
