<x-layout>

@foreach($restaurants as $restaurant)
    <div class="w-full text-center">
       <span class="text-blue-600"> Restaurant Name : </span> <span class="font-bold">{{ $restaurant['name'] }}</span>
        <br>
        @if(!empty($restaurant->foods[0]))
       <span class="text-red-600"> Foods:</span>
    </div>
            <div class="m-5 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Offer
                        </th>
                        <th>
                            Spot Price
                        </th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($restaurant->foods as $food)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $food['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $food['price'] }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('images/' . $food['image']) }}" alt="">
                            </td>
                            
                            
                                @if(!empty($food->offers[0]))
                                <td class="px-6 py-4">
                                    {{ $food->offers[0]['Percent']}}
                                
                            </td>

                                <td class="px-6 py-4">
                                    {{ $food['price'] - $food['price'] * $food->offers[0]['Percent'] / 100}}
                                </td>


                                @else

                                <td class="px-6 py-4">
                                    No Offer
                                </td>
                                <td class="px-6 py-4">
                                    {{ $food['price']}}
                                </td>
                            @endif
                            <td>
                                <form action="{{route('delete-food' , ['id' => $food['id']])}}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-500">Delete</button>
                                </form>

                            </td>

                            <td>
                                <a class="text-blue-600"
                                   href=" {{route('edit-food-page' , ['id' => $food['id']])}} "> Update </a>
                            </td>

                        </tr>

                    </tbody>
                   
                    @endforeach
                    <div class="w-full text-center">
                    <a class="text-indigo-500" href="{{ route('create-food' , ['id' => $restaurant['id']]) }}">Add New Food</a>
                    <hr class="my-5">
                </div>
                </table>
            </div>
            @else
            <h1 class="text-2xl text-red-500">
                No Food
            </h1>
            <a class="text-indigo-500" href="{{ route('create-food' , ['id' => $restaurant['id']]) }}">Add New Food</a>
            <hr class="my-5">
            @endif

    @endforeach

            {{ $restaurants->links()}}

</x-layout>
