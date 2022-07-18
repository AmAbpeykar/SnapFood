

<x-layout>
    <div class="w-10/12 relative m-auto bg-gray-50 rounded mt-20 flex items-center">
    <img class="w-max h-max " src="{{ asset('images/' . $banners[0]['image_path']) }}" alt="">
        <form class="w-full absolute top-0 lef-0 right-0 bottom-0" style="" id="map-form" hidden action=" {{ route('form-test') }}">
            <button id="confirmPosition" class="absolute bottom-0 right-0 z-10 bg-white">Confirm Position</button>
            <div class="absolute top-0 left-0 right-0" id="map"></div>
            <br>

            <br>
            <p class="absolute bottom-0  z-10 bg-white">On idle position: <span  id="onIdlePositionView"></span></p>

            <input type="text"  name="map-input" hidden id="map-input">

        </form>
        <div class="mr-[50px] relative ">
            <h2 id="address" class="text-2xl text-rose-700">Select Your Address</h2>

        </div>
    </div>
        <hr>

    <div class="w-full text-center h-[400px] grid grid-cols-4 mb-10">

        @foreach($foods as $food)

            <div class="text-center w-full p-2">

                <img class="m-auto" src="{{asset('images/' . $food->image)}}"  alt="">

                    <p class="mt-5">
                        {{ $food->name }}
                    </p>
            </div>
        @endforeach

    {{ $foods->links('vendor.pagination.simple-tailwind') }}

    </div>

        <hr>
    <p>Location</p>
    <hr>
    <p>Food Party</p>


    <x-map></x-map>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
            $("#address").on('click' , function (){
               $('#map-form').fadeToggle('hidden');

            });


            $("#map").mouseup(function (){
                var html = $("#onIdlePositionView").html();
                // alert(html);
                $('#map-input').val(html);


            });



        });
    </script>



</x-layout>
