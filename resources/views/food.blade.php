
<x-layout>
    <x-slot name="color">
        bg-indigo-50
    </x-slot>

    <div class="w-full text-center mt-10">
        <img class="m-auto w-[200px] h-[200px]" src="{{ asset('images/' . $food['image']) }}" alt="">
    </div>
    <div class="flex flex-col gap-10 text-center mt-10  text-xl">
        <p class="text-rose-500">
        Name: <span class="text-indigo-500"> {{ $food['name'] }}</span>
        </p>
        <p class="text-rose-500">
        Restaurant: <span class="text-indigo-500"> {{ $food->restaurant['name'] }}</span>
        </p>

        @if(!empty($food->offers[0]))
                <p>
                    Offers :
                    @foreach($food->offers as $offer)

                        {{ $offer['Percent'] }}

                    @endforeach
                </p>
        @else
            <p class="text-red-500">
            No Offer
            </p>
            @endif


{{--        <form action=" {{ route('order-food') }}" method="post">--}}
{{--            <input type="number" name="count" id="" placeholder="count">--}}
{{--            <input type="hidden" name="food_id" value="{{ $food['id'] }}" id="">--}}
{{--            <button>Order This Food</button>--}}
{{--        </form>--}}


    </div>
</x-layout>
