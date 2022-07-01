{{--<div class="relative overflow-x-auto shadow-md sm:rounded-lg">--}}
{{--    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">--}}
{{--        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
{{--        <tr>--}}
{{--            <th scope="col" class="px-6 py-3">--}}
{{--                Parent ID--}}
{{--            </th>--}}
{{--            <th scope="col" class="px-6 py-3">--}}
{{--                Name--}}
{{--            </th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @foreach(  $array  as $item)--}}

{{--            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
{{--                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">--}}
{{--                    {{ $item[$key1] }}--}}
{{--                </th>--}}
{{--                <td class="px-6 py-4">--}}
{{--                    {{ $item[$key2] }}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <a class="text-red-500" href="">Delete</a>--}}
{{--                </td>--}}

{{--                <td>--}}
{{--                    <a class="text-blue-600" href=""> Update </a>--}}
{{--                </td>--}}

{{--            </tr>--}}

{{--        </tbody>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--</div>--}}
{{ $array[$name] }}

{{$array[$food_category_id]}}
