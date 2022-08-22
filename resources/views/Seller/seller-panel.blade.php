<x-layout>

    <x-slot name="color">
        bg-indigo-100
    </x-slot>

@forelse($restaurants as $restaurant)
    <div class="w-full text-center">
       <span class="text-blue-600"> Restaurant Name : </span> <span class="font-bold">{{ $restaurant['name'] }}</span>
        <br>
        @if(!empty($restaurant->foods[0]))
       <span class="text-red-600"> Foods:</span>
    </div>
            <div class="m-5 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 w-full">
                    <tr class="w-full text-center">
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
                        <th>
                            Delete
                        </th>
                        <th>
                            Update
                        </th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($restaurant->foods as $food)

                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $food['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $food['price'] }}
                            </td>
                            <td class="px-6 py-4">
                                @if($food['image'] !== null)
                                <img class="w-[100px] h-[100px] m-auto"  src="{{ asset('images/' . $food['image']) }}" alt="">
                                @else
                                No Image
                                    @endif
                            </td>


                                @if(!empty($food->offers[0]))
                                <td class="px-6 py-4">
                                    {{ $food->offers[0]['Percent']}}

                            </td>

                                <td class="px-6 py-4">
                                    {{ $food['price'] - ($food['price'] * $food->offers[0]['Percent'] / 100)}}
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

    @empty

    <div class="w-full mt-56 text-center">
        <p class="text-rose-800 mb-10 text-3xl">
            You Don't Add Any Restaurants
        </p>
        <a href=" {{ route('new-restaurant') }} " class="text-indigo-500">
            Add A Restaurant
        </a>
    </div>
    @endforelse

            {{ $restaurants->links()}}

</x-layout>
