<x-layout>

    @if($errors->any())

        {{ print_r($errors) }}
    @endif

    <form class="w-8/12 m-auto mt-20" action=" {{route('create_offer' )}}" method="POST">
        @csrf
        <div class="w-full flex gap-10 justify-between">
            <input type="text" name="Percent" placeholder="Percent"
                   class="border-indigo-500 border-b-2 text-center w-1/2 outline-0" id="">

            <input type="text" name="expiredtime" placeholder="Expired Time"
                   class="border-indigo-500 border-b-2 text-center w-1/2 outline-0" id="">
        </div>

        <div class="w-full text-center">

            <button
                class="mt-10 border-2 border-indigo-400 hover:border-indigo-600 duration-300 text-indigo-400 hover:text-indigo-600 h-[40px] w-[100px] ">
                submit
            </button>
        </div>
    </form>

</x-layout>
