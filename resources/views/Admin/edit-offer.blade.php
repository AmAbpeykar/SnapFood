<x-layout>

    @if($errors->any())

        {{ print_r($errors) }}
    @endif

    <form  action=" {{route('update-offer' , ['id' => $id])}}" method="POST">
        @csrf
        @method('put')
        <input type="text" name="Percent" placeholder="Percent" id="">
        <input type="text" name="food_id" placeholder="food_id" id="">
        <input type="text" name="expiredtime" placeholder="Expired Time" id="">
        <button>submit</button>
    </form>

</x-layout>
