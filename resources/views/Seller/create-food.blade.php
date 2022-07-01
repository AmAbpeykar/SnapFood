<x-layout>
    <form action=" {{route('food-store')}} " enctype="multipart/form-data">
        @csrf
        <input type="text" name="" id="" placeholder="Name">
        <input type="text" name="" id="" placeholder="Price">
        <input type="text" name="" id="" placeholder="Food Party">
        <input type="text" name="" id="" placeholder="Offer">
        <input type="file" name="image" id="">
        <button>Submit</button>
    </form>
</x-layout>
