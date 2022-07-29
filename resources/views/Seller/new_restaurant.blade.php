<x-layout>
    <form action="{{ route('store-restaurant') }}" method="POST" class="w-1/3 m-auto text-center flex flex-col mt-24">
        @csrf
        <div>
            <label class="block text-violet-600">Name</label>
            <input name="name" type="text" class="border-b-violet-400 w-full my-4 border-b-2 outline-0 text-center text-bold text-indigo-600">
        </div>
        <div>
            <label class="block text-violet-600">Address</label>
            <input name="address" type="text" class="border-b-violet-400 w-full my-4 border-b-2 outline-0 text-center text-bold text-indigo-600">
        </div>
        <div>
            <label class="block text-violet-600">Type</label>
            <input name="type" type="text" class="border-b-violet-400 w-full my-4 border-b-2 outline-0 text-center text-bold text-indigo-600">
        </div>
        <div>
            <label class="block text-violet-600" for="">Lat</label>
            <input name="latitude" type="text" class="border-b-violet-400 w-full my-4 border-b-2 outline-0 text-center text-bold text-indigo-600">
        </div>
        <div>
            <label class="block text-violet-600" for="">Lng</label>
            <input name="longitude" type="text" class="border-b-violet-400 w-full my-4 border-b-2 outline-0 text-center text-bold text-indigo-600">
        </div>
        <div>
            <label for="" class="text-indigo-600">Working Hours</label>
            <div class="flex w-full gap-1 justify-between">
            <input name="open" type="text" class="border-b-violet-400 w-5/12 my-4 border-b-2 outline-0 text-center text-bold text-indigo-600" placeholder="Open">
            <input name="close" type="text" class="border-b-violet-400 w-5/12 my-4 border-b-2 outline-0 text-center text-bold text-indigo-600" placeholder="Close">
            </div>
        </div>

        <button class="text-white bg-violet-500 hover:bg-violet-700 rounded w-[100px] h-[50px] m-auto duration-300">Submit</button>
    </form>
</x-layout>
