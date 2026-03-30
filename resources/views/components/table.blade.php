<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">            <tr>
                @foreach($attributes as $attribute)
                <th scope="col" class="px-6 py-3 font-medium">
                    {{ $attribute }}
                </th>
                @endforeach
                <th scope="col" class="px-6 py-3 font-medium">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Excluir
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $modelData)
                <tr class="bg-neutral-primary border-b border-default">
                    @foreach($modelData as $data)
                        @if($data === $modelData['name'])
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $data  }}
                            </th>
                        @endif
                        <td>
                            {{ $data  }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
