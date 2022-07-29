<x-layout>

    @if($errors->any())

        {{print_r($errors)}}

    @endif

    <form action="{{route('create_food_category')}}" class="w-1/2 text-center m-auto mt-20" method="post">
        @csrf
        <div class="w-full flex gap-10 text-center justify-between">
            <input type="text" name="food_category_id" class="border-indigo-500 border-b-2 text-center w-1/2 outline-0"  placeholder="Parent ID">
            <input type="text" name="name" class="border-indigo-500 border-b-2 text-center w-1/2 outline-0" placeholder="Name">
        </div>
            <button class="mt-10 border-2 border-indigo-400 hover:border-indigo-600 duration-300 text-indigo-400 hover:text-indigo-600 h-[40px] w-[100px]">Submit</button>
    </form>

</x-layout>
