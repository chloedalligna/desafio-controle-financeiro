<div class="mt-6 w-full flex justify-center mb-10">

    <div
        class="flex justify-center flex-col w-7x1 h-full overflow-scroll text-gray-700 bg-white dark:bg-gray-800 dark:text-white rounded-xl bg-clip-border"
    >

        <table class="text-left table-fixed min-w-ma">
            <thead class="bg-gray-700">
                <tr>
                    @foreach($keys as $key)
                        <th scope="col" class="px-6 py-4">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-300 opacity-70">
                            {{ $key }}
                            </p>
                        </th>
                    @endforeach
                    <th scope="col" class="text-center px-6 py-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-300 opacity-70">
                        Ações
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($collection as $attributes)
                    <tr class="bg-neutral-primary border-b-3 border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap {{ $textColor[$attributes->category->type_id] }}">
                                {{ $attributes->category->type->name }}
                            </th>
                        @foreach($attributes->except(['id', 'user_id','_token', 'deleted_at', 'created_at', 'updated_at']) as $key => $value)
                            @switch($key)
                                @case('category_id')
                                    <td class="px-6 py-4">
                                        {{ $attributes->category->name }}
                                    </td>
                                    @break
                                @case('description')
                                    <td class="px-6 py-4 lg:max-w-[550px] md:max-w-[250px] sm:max-w-[100px] overflow-hidden">
                                        {{ $value  }}
                                    </td>
                                    @break
                                @case('value')
                                    <td class="px-6 py-4 font-semibold {{ $textColor[$attributes->category->type_id] }}">
                                        @if($attributes->category->type_id === 1) - @endif R$ {{ Number::format($value, 2, null, 'pt_BR') }}
                                    </td>
                                    @break
                                @case('date')
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($value)->format('d/m/Y') }}
                                    </td>
                                    @break
                            @endswitch
                        @endforeach
                        <td class="flex flex-row px-6 py-4">
                            <a href="{{ route($edit, $attributes->id) }}" class="w-fit justify-center bg-transparent flex items-center rounded-lg px-4 py-2 text-sm hover:bg-yellow-500" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 512 512" class="size-5"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/></svg>
                            </a>

                            <form id="destroy"
                                  action="{{ route('transactions.destroy', $attributes->id) }}"
                                  method="POST"
                                  class="w-fit justify-center ml-3"
                                  >
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        form="destroy"
                                        onclick="return confirm('Você deseja excluir esta transação permanentemente?')"
                                        class="bg-transparent flex items-center rounded-lg px-4 py-2 text-sm hover:bg-red-500" role="menuitem"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 384 512" class="size-5"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M55.1 73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L147.2 256 9.9 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192.5 301.3 329.9 438.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.8 256 375.1 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192.5 210.7 55.1 73.4z"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

<script>

</script>
