<x-layout >


    @if($errors->any())
        {{ print_r($errors->all()) }}
    @endif

    @if(!empty($banner))
    <div class="w-full h-full mt-0 py-28 bg-no-repeat bg-center bg-contain" style="background-image: url({{ asset('images/' . $banner['image_path']) }})">
    </div>
        @endif
    <form action=" {{route('login')}}" class="w-3/6 h-4/6 @if(empty($banner)) mt-28 @endif text-center m-auto p-10 opacity-100" method="POST">
        @csrf


        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="text"
                   class="absolute text-rose-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent text-bold border-b-2 border-b-gray-400 text-center focus:border-b-rose-600 valid:border-b-rose-600 focus:outline-none peer"
                   required placeholder="" name="email" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-rose-600 peer-focus:top-0 peer-valid:text-rose-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Email</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="password"
                   class="absolute text-rose-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent text-bold border-b-2 border-b-gray-400 text-center focus:border-b-rose-600 valid:border-b-rose-600 focus:outline-none peer"
                   required placeholder="" name="password" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-rose-600 peer-focus:top-0 peer-valid:text-rose-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Password</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">


            <select id="underline_select" name="role_id"
                    class="block border-b-gray-400  text-center py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="null" selected disabled></option>
                <option class="bg-rose-700 hover:text-bold text-white" value="1">User</option>
                <option class="bg-rose-700 hover:text-bold text-white" value="2">Admin</option>
                <option class="bg-rose-700 hover:text-bold text-white" value="3">Seller</option>

            </select>
            <label class="absolute  top-2 left-0  text-gray-500 -z-10 transform peer-focus:top-0 peer-focus:text-rose-700
          duration-300" for="underline_select">Select One</label>
        </div>

        <button type="submit" value="submit" name="submit"
                class="bg-rose-400 mt-9 text-white p-2 w-40 hover:bg-rose-600 rounded-md duration-300">
            Submit
        </button>
    </form>
</x-layout>
