<x-layout title="Suas categorias" :msg="$msg">

    <x-categories.table :collection="$categories"
                          :keys="['Tipo', 'Nome', 'Última atualização']"
                          edit="categories.edit"
    />

</x-layout>
