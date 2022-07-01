<x-layout>

    @if($errors->any())
        {{ print_r($errors->all()) }}
    @endif

    <form action=" {{route('register')}}" class="w-3/6 h-4/6 text-center m-auto border-2 p-10 mt-28" method="POST">
        @csrf

        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="text"
                   class="absolute text-indigo-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent border-b-2 border-b-gray-400 text-center focus:border-b-indigo-600 valid:border-b-indigo-600 focus:outline-none peer"
                   required placeholder="" name="name" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-indigo-600 peer-focus:top-0 peer-valid:text-indigo-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Name</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="text"
                   class="absolute text-indigo-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent border-b-2 border-b-gray-400 text-center focus:border-b-indigo-600 valid:border-b-indigo-600 focus:outline-none peer"
                   required placeholder="" name="email" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-indigo-600 peer-focus:top-0 peer-valid:text-indigo-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Email</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="password"
                   class="absolute text-indigo-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent border-b-2 border-b-gray-400 text-center focus:border-b-indigo-600 valid:border-b-indigo-600 focus:outline-none peer"
                   required placeholder="" name="password" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-indigo-600 peer-focus:top-0 peer-valid:text-indigo-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Password</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">
            <input type="password"
                   class="absolute text-indigo-800 bottom-0 right-0 left-0 w-full h-10 text-sm bg-transparent border-b-2 border-b-gray-400 text-center focus:border-b-indigo-600 valid:border-b-indigo-600 focus:outline-none peer"
                   required placeholder="" name="password_confirmation" id=""/>
            <label id="label" for=""
                   class="absolute m-auto top-6 right-0  left-0 text-gray-500 -z-10 transform peer-focus:text-indigo-600 peer-focus:top-0 peer-valid:text-indigo-600 peer-valid:top-0 peer-valid:text-sm peer-focus:text-xs duration-300">Confirm Password</label>

        </div>

        <div class="relative h-14 z-0 mb-5 w-full">


            <select id="underline_select" name="role_id"
                    class="block border-b-gray-400  text-center py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="null" selected disabled></option>
                <option class="bg-indigo-700 hover:text-bold text-white" value="3">Seller</option>
                <option class="bg-indigo-700 hover:text-bold text-white" value="1">User</option>

            </select>
            <label class="absolute  top-2 left-0  text-gray-500 -z-10 transform peer-focus:top-0 peer-focus:text-indigo-700
          duration-300" for="underline_select">Select One</label>
        </div>

        <button type="submit" value="submit" name="submit"
                class="bg-indigo-400 mt-9 text-white p-2 w-40 hover:bg-indigo-600 rounded-md duration-300">
            Submit
        </button>
    </form>

</x-layout>
