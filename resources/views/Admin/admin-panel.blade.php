<x-layout>

    <x-slot name="color">
        bg-rose-100
    </x-slot>

    <div class="w-full  bg-blue-500 text-white flex items-center justify-center h-[100px]">
        <h1> Welcome To your Panel <span class="font-bold"> {{ \Illuminate\Support\Facades\Auth::user()->name }} </span>
        </h1>
    </div>
    <div>
        <div class="text-center w-full m-6">
            <h1 class=" text-blue-600">Management</h1>
        </div>
        <div class="w-full flex justify-evenly">
            <div class="w-2/5 text-center">
                <h1 class="text-indigo-500">All Restaurant Categories</h1>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="">

                            <th scope="col" class="px-6 py-3">
                                Name
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

                        @foreach($rest_cat as $rest)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4">
                                    {{ $rest['name'] }}
                                </td>
                                <td>
                                    <form action="{{route('delete_restaurant_category' , ['id' => $rest['id']])}}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500">Delete</button>
                                    </form>
                                </td>

                                <td>
                                    <a class="text-blue-600"
                                       href=" {{route('edit-restaurant-category' , ['id' => $rest['id']])}} "> Update </a>
                                </td>

                            </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>
                <a href=" {{ route('new_restaurant_category') }}" class="text-rose-500">Add New Restaurant Category</a>

            </div>
            <div class="w-2/5 text-center">
                <h1 class="text-indigo-500">All Food Categories</h1>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Parent ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
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

                        @foreach($food_cat as $food)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $food['food_category_id'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $food['name'] }}
                                </td>
                                <td>
                                    <form action="{{route('delete_food_category' , ['id' => $food['id']])}}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500">Delete</button>
                                    </form>
                                </td>

                                <td>
                                    <a class="text-blue-600"
                                       href=" {{route('edit-food-category' , ['id' => $food['id']])}} "> Update </a>
                                </td>

                            </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>
                <a href=" {{ route('new_food_category') }}" class="text-rose-500">Add New Food Category</a>

            </div>
        </div>


    </div>

    <div>
    <div class="w-full flex justify-evenly  mt-10">
        <div class="w-2/5 text-center">
            <h1 class="text-indigo-500">All Offers</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Percent
                        </th>
                        <th>
                            Expired Time
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

                    @foreach($offers as $offer)

                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $offer['Percent'] }}
                            </th>

                            <td class="px-6 py-4">
                                {{ $offer['expiredtime'] }}
                            </td>
                            <td>
                                <form action="{{route('delete_offer' , ['id' => $offer['id']])}}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-500">Delete</button>
                                </form>
                            </td>

                            <td>
                                <a class="text-blue-600"
                                   href=" {{route('edit-offer' , ['id' => $offer['id']])}} "> Update </a>
                            </td>

                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
            <a href=" {{ route('new-offer') }}" class="text-rose-500">Add New Offer</a>

        </div>



        <div class="w-2/5 text-center">
            <h1 class="text-indigo-500">All Banners</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Place
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
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

                    @foreach($banners as $banner)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $banner['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                <img class="w-[100px] h-[100px]" src="{{ asset('images/' . $banner['image_path']) }}" alt="">
                            </td>

                            <td>
                                <form action="{{route('delete-banner' , ['id' => $banner['id']])}}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-500">Delete</button>
                                </form>
                            </td>

                            <td>
                                <a class="text-blue-600"
                                   href=" {{route('edit-banner' , ['id' => $banner['id']])}} "> Update </a>
                            </td>

                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
            <a href=" {{ route('create-banner') }}" class="text-rose-500">Add New Banner</a>

        </div>


    </div>
    </div>
    </div>



</x-layout>
