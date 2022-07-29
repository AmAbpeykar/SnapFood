<x-layout>
    @if($errors->any())

        {{print_r($errors)}}

    @endif

    <form action="{{route('create_restaurant_category')}}" class=" w-1/3 m-auto text-center mt-10" method="post">
        @csrf
        <input type="text" name="name" class="w-full mb-5 border-b-2 border-indigo-500 text-center outline-0" placeholder="Name">
        <button class="rounded block w-[100px] h-[40px] bg-indigo-400 hover:bg-indigo-600 text-white m-auto">Submit</button>
    </form>
</x-layout>
