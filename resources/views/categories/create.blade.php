<x-layout title="Adicione uma nova categoria">

    <x-categories.form
        :action="route('categories.store')"
        :update="false"
        :types="$types"
        :categories="null"
    />

</x-layout>
