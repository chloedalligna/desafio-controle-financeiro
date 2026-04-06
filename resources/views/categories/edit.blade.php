<x-layout title="Edite esta categoria">

    <x-categories.form
        :action="route('categories.update', $category->id)"
        :update="true"
        :types="$types"
        :category="$category"
    />

</x-layout>
