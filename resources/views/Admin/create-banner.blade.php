<x-layout>
    <form enctype="multipart/form-data"  action=" {{route('store-banner' )}}" class="w-1/2 text-center m-auto mt-20" method="post">
        @csrf

        <div class="w-full gap-10 text-center justify-between">
            <input type="text" name="name" class="border-indigo-500 border-b-2 text-center w-full outline-0"   placeholder="Name">
        </div>

        <input type="file" class="mt-5" name="image">
        <button class=" block m-auto mt-10 border-2 border-indigo-400 hover:border-indigo-600 duration-300 text-indigo-400 hover:text-indigo-600 h-[40px] w-[100px]">Submit</button>
    </form>
</x-layout>
