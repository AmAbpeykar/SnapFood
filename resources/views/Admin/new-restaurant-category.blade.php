<x-layout>
    @if($errors->any())

        {{print_r($errors)}}

    @endif

    <form action="{{route('create_restaurant_category')}}" method="post">
        @csrf
        <input type="text" name="restaurant_category_id" placeholder="Parent ID">
        <input type="text" name="name" placeholder="Name">
        <button>Submit</button>
    </form>
</x-layout>
