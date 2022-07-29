<x-layout>


    <x-slot name="color">
        bg-violet-100
    </x-slot>

    <div class="w-full text-center text-pink-700 text-3xl font-bold mt-10 mb-5 ">
        Orders :
    </div>




            @foreach($orders as $order)

        <div class="m-5 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-white dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-indigo-600 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">

                    <th scope="col" class="px-6 py-3">
                        Pay
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>


                </tr>
                </thead>
                <tbody>


                <tr class="bg-indigo-400 text-white font-bold border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-indigo-500 dark:hover:bg-gray-600 text-center">

                    <td class="px-6 py-4">
                        {{ $order->payment }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $order['total_price'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $order->status }}
                    </td>


                </tr>


                </tbody>


        </table>

    </div>
    <div class="w-full grid grid-cols-3 text-center">
    @foreach($order->cartItems as $cartItem)
        <div class="m-5 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-rose-600  dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">

                <th scope="col" class="px-6 py-3">
                    Food
                </th>
                <th scope="col" class="px-6 py-3">
                    Count
                </th>

            </tr>
            </thead>

            <tbody>
            <tr class="bg-rose-100 text-rose-600 font-bold border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                <td class="px-6 py-4"> {{ $cartItem->food['name'] }}</td>
                <td class="px-6 py-4"> {{ $cartItem['count'] }}</td>
            </tr>
            </tbody>

        </table>
        </div>
    @endforeach
    </div>




    @endforeach


</x-layout>







