<x-layout>
    Orders :

    @forelse($orders as $order)

        <div class="m-5 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
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


                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $order->user['name'] }}
                        </th>
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





    @empty

        {{ 'there is no orders' }}

    @endforelse

</x-layout>
