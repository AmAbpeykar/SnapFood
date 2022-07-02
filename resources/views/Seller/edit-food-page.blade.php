<x-layout>

{{--    @if($errors->any())--}}
{{--@dd($errors)--}}
{{--    @endif--}}
    <form method="post" enctype="multipart/form-data" class="mt-16 flex flex-col gap-5 w-full text-center"
          action="{{ route('update-food' , ['id' => $id]) }}">
        @csrf
        @method('put')

        <div>
            <label class="block text-indigo-500" for="">Food</label>
            <input value="{{ old('name') ?? $food['name'] }}" type="text" name="name" class="border-b-2 border-blue-400 outline-0 text-indigo-400 text-center m-2 w-1/3 focus:border-blue-600"
                   id="">
        </div>

        <div>
            <label class="block text-indigo-500" for="">Price</label>
            <input value="{{ old('price') ?? $food['price'] }}" type="text" name="price" id=""
                   class="border-b-2 border-blue-400 outline-0 text-indigo-400 text-center m-2 w-1/3 focus:border-blue-600">
        </div>

        <div>
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

        <div>
            <label class="block text-indigo-500" for="">Image</label>
            <input name="image" type="file">
        </div>

        <div>
            <button class="bg-blue-400  hover:bg-blue-600 rounded w-[80px] h-[40px] text-white duration-500">Submit
            </button>
        </div>
    </form>

</x-layout>
