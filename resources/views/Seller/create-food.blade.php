<x-layout>
    <form action=" {{route('food-store')}} " class="w-full text-center" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-5">
        <input type="text" class="text-center outline-0 border-b-2 border-blue-500 text-indigo-400" name="name" id="" placeholder="Name">
        <input type="text" class="text-center outline-0 border-b-2 border-blue-500 text-indigo-400" name="price" id="" placeholder="Price">
        <input type="text" class="text-center outline-0 border-b-2 border-blue-500 text-indigo-400" name="in_food_party" id="" placeholder="Food Party">
    </div>
        <div class="m-5">
            <label class="block text-indigo-500" for="">Offer</label>
            <select class="w-1/3 outline-0 text-indigo-400 text-center m-2 border-b-2 border-blue-500 text-blue-500" name="offer_id" id="">
                <option value="">
                    nothing
                </option>
                @foreach($offers as $offer)
                    <option value="{{ $offer['id'] }}">
                        {{$offer['percent']}}
                    </option>
                @endforeach
            </select>
        </div>

            <div class="m-5">
                <label class="block text-indigo-500" for="">Category</label>
                <select class="w-1/3 outline-0 text-indigo-400 text-center m-2 border-b-2 border-blue-500 text-blue-500" name="food_category_id" id="">
                    @foreach($categories as $category)
                        <option  value="{{ $category['id'] }}">
                            {{$category['name']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-indigo-500" for="">Image</label>
                <input name="image" type="file">
            </div>
        <input type="text" name="restaurant_id" hidden value="{{ $id }}">
        <button class="mt-5 bg-blue-400  hover:bg-blue-600 rounded w-[80px] h-[40px] text-white duration-500">Submit
        </button>
    </form>
</x-layout>
