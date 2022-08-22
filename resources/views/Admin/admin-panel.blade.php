<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

</body>
</html>

<nav class="flex justify-between w-full bg-rose-600 h-[70px] items-center text-white font-bold">

    <div class="flex justify-evenly w-full" id="navv">
        <p id="show-restaurant-categories">Restaurant Categories</p>
        <p id="show-food-categories">Food Categories</p>
        <p id="show-offers">Offers</p>
        <p id="show-banners">Banners</p>
        <p id="show-comments">Comments</p>
        <p id="show-orders">Orders</p>
    </div>


</nav>


<div>


    <div id="tables" class="w-2/3 m-auto text-center mt-20">

    </div>


    <div class="w-3/6 text-center" id="orders" hidden>
        <h1 class="text-indigo-500">All Carts</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs bg-indigo-200 uppercase text-indigo-600 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">

                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                        Paid
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Cart Items
                    </th>

                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)

                    <tr class="bg-indigo-600 text-white border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 text-center">

                        <td class="px-6 py-4">
                            {{ $order['user']['id']}}
                        </td>

                        <td>
                            {{ $order->total() }}
                        </td>
                        <td>
                            {{ $order->payment }}
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>



                        <td>
                            <div class="grid grid-cols-2 gap-4 ">
                                @foreach($order->cartItems as $cartItem)

                                    <table class="w-full mt-5">
                                        <thead class="w-full text-center bg-rose-200 text-rose-600">
                                        <tr class="w-full text-center">
                                            <th>Food ID</th>
                                            <th>Count</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>
                                        <tbody class="w-full text-center bg-rose-600 text-white">
                                        <tr class="w-full text-center">
                                            <td> {{ $cartItem['food_id'] }} </td>
                                            <td> {{$cartItem['count']}} </td>
                                            <td>{{ $cartItem->total() }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endforeach
                            </div>
                        </td>

                    </tr>




                </tbody>







                @endforeach
            </table>


        </div>
    </div>


    <div class="w-4/5 text-center" hidden id="comments">
        <h1 class="text-indigo-500">All Comments</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">

                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th>
                        For Food
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Score
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Delete
                    </th>
                    <th>
                        Confirm
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($comments as $comment)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">

                        <td class="px-6 py-4">
                            {{ $comment['user']}}
                        </td>
                        <td class="px-6 py-4">
                            Name : <span class="text-indigo-600 ">{{ $comment->food['name'] }}</span> With ID : <span
                                class="text-indigo-600 ">{{$comment->food['id']}}</span>
                        </td>
                        <td>
                            {{ $comment['title'] }}
                        </td>
                        <td>
                            {{ $comment['content'] }}
                        </td>
                        <td>
                            {{ $comment['score'] }}
                        </td>
                        <td>
                            {{ $comment->status }}
                        </td>
                        <td>
                            <form action="{{route('delete-comment' , ['id' => $comment['id']])}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <button class="text-red-500">Delete</button>
                            </form>
                        </td>

                        <td>
                            <a class="text-blue-600"
                               href=" {{route('confirm-comment' , ['id' => $comment['id']])}} "> Change Status </a>
                        </td>

                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>


    </div>


    <div class="w-full flex justify-evenly">
        <div class="w-2/5 text-center" hidden id="restaurant-categories">
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
        <div class="w-2/5 text-center " id="food-categories" hidden>
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
        <div class="w-2/5 text-center" id="offers" hidden>
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
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(function () {
                            $("#address").on('click', function () {
                                $('#map-form').fadeToggle('hidden');

                            });


                            $("#map").mouseup(function () {
                                var html = $("#onIdlePositionView").html();
                                // alert(html);
                                $('#map-input').val(html);


                            });


                        });
                    </script>

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


        <div class="w-2/5 text-center" hidden id="banners">
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
                                <img class="w-[100px] h-[100px]" src="{{ asset('images/' . $banner['image_path']) }}"
                                     alt="">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {

        $('#navv').on('click', function () {
            $('#navv:selected').addClass('border-b-2');
        })

        $('#tables').html($('#restaurant-categories').html());


        $("#show-banners").on('click', function () {

            const test = $('#banners').html();

            $('#tables').html(test);

        });

        $("#show-food-categories").on('click', function () {

            const test = $('#food-categories').html();

            $('#tables').html(test);

            // $("#show-food-categories").addClass('border-b-2')

        });

        $("#show-offers").on('click', function () {

            const test = $('#offers').html();

            $('#tables').html(test);

        });

        $("#show-restaurant-categories").on('click', function () {

            const test = $('#restaurant-categories').html();

            $('#tables').html(test);

        });

        $("#show-comments").on('click', function () {
            const test = $('#comments').html();

            $('#tables').html(test);
        })

        $("#show-orders").on('click', function () {
            const test = $('#orders').html();

            $('#tables').html(test);
        })


    });
</script>



