<x-layout title="Suas categorias">

    <x-categories.table :collection="$categories"
                          :keys="['Tipo', 'Nome', 'Última atualização']"
                          edit="categories.edit"
                          action="categories.destroy"
    />

</x-layout>
