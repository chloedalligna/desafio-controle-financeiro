<x-layout title="Adicione uma nova transação">

    <x-transactions.form
        :action="route('transactions.store')"
        :update="false"
        :categories="$categories" />

{{--    <div class="space-y-12">--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form action="{{ route('transactions.store') }}" method="post">--}}
{{--            @csrf--}}

{{--            @if($update)--}}
{{--                @method('PUT')--}}
{{--            @endif--}}

{{--            <label class="block mb-2.5 text-sm font-medium text-heading"--}}
{{--                   for="name">Nome da transação</label>--}}
{{--            <input class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"--}}
{{--                   name="name"--}}
{{--                   id="name"--}}
{{--                   type="text"--}}
{{--                   required--}}
{{--                   @isset($name)value="{{ $name }}"@endisset>--}}

{{--            <h3 class="block mb-2.5 text-sm font-medium text-heading">--}}
{{--                Tipo de transação</h3>--}}
{{--            <div class="container-radio">--}}
{{--                <ul class="items-center w-full text-sm font-medium text-heading bg-neutral-primary-soft border border-default rounded-lg sm:flex">--}}
{{--                    @foreach($types as $type)--}}
{{--                        <li class="w-full border-b border-default sm:border-b-0 sm:border-r">--}}
{{--                            <div class="flex items-center ps-3">--}}
{{--                                <input class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none"--}}
{{--                                       name="type"--}}
{{--                                       type="radio"--}}
{{--                                       id="{{ $type->name }}"--}}
{{--                                       value="{{ $type->id }}" >--}}
{{--                                       @if($update && ($transaction->$category->$type->id === $type->id))--}}
{{--                                           checked--}}
{{--                                       @endif >--}}
{{--                                <label class="formulario-label"--}}
{{--                                       for="{{ $type->name }}">--}}
{{--                                    {{ $type->name }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}


{{--            <label class="block mb-2.5 text-sm font-medium text-heading"--}}
{{--                   for="category">--}}
{{--                Categoria--}}
{{--            </label>--}}
{{--            <select id="category" name="category" size="4">--}}
{{--                @foreach($type->categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}


{{--            <label class="block mb-2.5 text-sm font-medium text-heading"--}}
{{--                   for="value">--}}
{{--                Valor monetário--}}
{{--            </label>--}}
{{--            <input class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"--}}
{{--                   name="value"--}}
{{--                   id="value"--}}
{{--                   type="number"--}}
{{--                   min="0.01"--}}
{{--                   step="0.01"--}}
{{--                   required>--}}

{{--            <label class="block mb-2.5 text-sm font-medium text-heading"--}}
{{--                   for="description">--}}
{{--                Descrição--}}
{{--            </label>--}}
{{--            <input class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"--}}
{{--                   name="description"--}}
{{--                   id="description"--}}
{{--                   type="text"--}}
{{--                   required>--}}

{{--            --}}{{--        <input class="btn" name="login-button" id="login-button" type="submit" value="Entrar">--}}

{{--            <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">--}}
{{--                Adicionar--}}
{{--            </button>--}}

{{--        </form>--}}

{{--    </div>--}}


</x-layout>

