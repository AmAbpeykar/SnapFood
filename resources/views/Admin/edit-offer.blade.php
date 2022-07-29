
<x-layout>
    <form action=" {{route('update-offer' , ['id' => $id])}}" class="w-1/2 text-center m-auto mt-20" method="post">
        @csrf
        @method('put')
        <div class="w-full flex gap-10 text-center justify-between">
            <input type="text" name="Percent" class="border-indigo-500 border-b-2 text-center w-1/2 outline-0" value="{{ old('food_category_id') ?? $offer['Percent'] }}"  placeholder="Parent ID">
            <input type="text" name="expiredtime" class="border-indigo-500 border-b-2 text-center w-1/2 outline-0" value="{{ old('name') ?? $offer['expiredtime'] }}" placeholder="Name">
        </div>
        <button class="mt-10 border-2 border-indigo-400 hover:border-indigo-600 duration-300 text-indigo-400 hover:text-indigo-600 h-[40px] w-[100px]">Submit</button>
    </form>
</x-layout>

