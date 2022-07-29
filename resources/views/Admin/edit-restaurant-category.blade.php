<x-layout>
    <form class="w-1/3 text-center m-auto mt-10"  action="{{ route('update-restaurant-category' , ['id' => $id]) }} " method="POST">
        @csrf
        @method('put')

            <input class="w-full outline-0 border-b-2 border-indigo-500 mb-5 text-center text-indigo-500" placeholder="  Name " value="{{old('name') ?? $category['name']}}" type="text" name="name" id="">

        <button class="block m-auto w-[100px] h-[50px] bg-indigo-400 hover:bg-indigo-600 text-white rounded duration-300">Submit</button>
    </form>
</x-layout>
