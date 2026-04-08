<x-layout2 title="Verificação de e-mail">

    <h1 class="mt-10 text-center text-lg font-semibold tracking-tight text-white">
        Foi enviado um link para verificação via e-mail. <br>
        Faça a verificação para ser redirecionado à página inicial. <br>
        Clique no botão abaixo para enviar outro link.
    </h1>

    <div class="col-span-full mt-6 flex items-center justify-center gap-x-6">
        <form action="{{ route('verification.send') }}" method="post" class="max-w-sm mx-auto">
            <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Enviar link de verificação novamente
            </button>
        </form>
    </div>

</x-layout2>
