<x-layout>
    <form  action="{{ route('update-food-category' , ['id' => $id]) }} " method="POST">
        @csrf
        @method('put')
    <input placeholder="   Parent ID " value="{{old('food_category_id') ?? null }}" type="text" name="food_category_id" id="">
    <input placeholder="  Name " value="{{old('name') ?? null}}" type="text" name="name" id="">

    <button>Submit</button>
    </form>
</x-layout>
