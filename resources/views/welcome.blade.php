<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white grid-cols-3 h-screen flex flex-col gap-20 max-w-screen-xl mx-auto my-4">
    <header class="col-span-3 flex flex-col gap-3 row-span-1 items-center justify-center">
        <h1 class="font-bold text-lg transition-all duration-200 hover:text-xl cursor-pointer">Bem vindo a sua agenda de
            contatos!!</h1>
        <h2>Clique em "Cadastrar" para adicionar um novo contato na sua agenda</h2>
    </header>
    <main class="col-span-3 flex flex-col items-end gap-3 pb-10">
        <button class="py-4 px-7 bg-green-700 rounded-2xl w-fit hover:bg-green-900"
            onclick="exibirModal('modalCadastro')">Cadastrar</button>
        <!--Teste para saber se existe contatos cadastrados, se existir, mostrar tabela, se não mostrar mensagem informando-->
        @if (count($contatos) > 0)
            <table
                class="border-collapse border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm w-full">
                <thead class="bg-slate-50 dark:bg-slate-700">
                    <tr>
                        <th
                            class="w-1/4 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Nome</th>
                        <th
                            class="w-1/4 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Sobrenome</th>
                        <th
                            class="w-1/4 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                            Telefone</th>
                        <th
                            class="w-1/4 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!--loop para exibir contatos cadastrados, váriavel $contatos vindo do controller -->
                    @foreach ($contatos as $contato)
                        <tr>
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                <!--Exibindo conteúdo do input-->
                                {{ $contato->nome }}
                            </td>
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ $contato->sobrenome }}</td>
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ $contato->telefone }}</td>
                            <td
                                class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 flex gap-4">
                                <button class="" onclick="exibirModal('modalEditar{{ $contato->id }}')">
                                    <img class="w-6 hover:brightness-50" src="{{ asset('img/edit.svg') }}"
                                        alt="editar">
                                </button>
                                <button onclick="exibirModal('modalDeletar{{ $contato->id }}')">
                                    <img class="w-5 hover:brightness-50" src="{{ asset('img/delete.svg') }}"
                                        alt="deletar">
                                </button>
                            </td>
                        </tr>
                        <!--passando função com id para abrir os modais de acordo com seus respectivos ids-->
                        <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                            id="modalDeletar{{ $contato->id }}">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                <div
                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div
                                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div
                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                    <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                        id="modal-title">
                                                        Apagar Contato?</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Se você apertar em "deletar" o
                                                            contato irá sumir
                                                            para sempre, deseja realmente deletar seu contato?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <!--Botão com link para rota excluir passando como parametro o id do registro-->
                                            <button type="button"
                                                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                <a href="{{ route('excluir', ['id' => $contato->id]) }}">Deletar</a>
                                            </button>
                                            <button type="button"
                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                                onclick="exibirModal('modalDeletar{{ $contato->id }}')">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                            id="modalEditar{{ $contato->id }}">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                <div
                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div
                                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div
                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <img class="w-6 hover:brightness-50"
                                                        src="{{ asset('img/edit.svg') }}" alt="adicionar">
                                                </div>
                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                    <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                        id="modal-title">Editar
                                                        Contato</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Edite os campos com as novas
                                                            informações do seu
                                                            contato!</p>
                                                    </div>
                                                    <!--form com action para rota editar passando o parametro id para identificar o registro, alem do metodo post-->
                                                    <form class="mt-5 flex flex-col gap-3"
                                                        action="{{ route('editar', ['id' => $contato->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="flex flex-col gap-2">
                                                            <label for="nome" class="text-base text-gray-900">Nome
                                                            </label>
                                                            <input
                                                                class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                                                type="text" name="nome" id="nome"
                                                                placeholder="Digite seu nome"
                                                                value="{{ $contato->nome }}">
                                                        </div>
                                                        <div class="flex flex-col gap-2">
                                                            <label for="sobrenome"
                                                                class="text-base text-gray-900">Sobrenome
                                                            </label>
                                                            <input
                                                                class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                                                type="text" name="sobrenome" id="sobrenome"
                                                                placeholder="Digite seu sobrenome"
                                                                value="{{ $contato->sobrenome }}">
                                                        </div>
                                                        <div class="flex flex-col gap-2">
                                                            <label for="telefone"
                                                                class="text-base text-gray-900">Telefone
                                                            </label>
                                                            <input
                                                                class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                                                type="text" name="telefone" id="telefone"
                                                                placeholder="Digite seu telefone"
                                                                value="{{ $contato->telefone }}"
                                                                onkeyup="handlePhone(event)">
                                                        </div>
                                                        <div
                                                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <button type="submit"
                                                                class="inline-flex w-full justify-center rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto">Editar</button>
                                                            <button type="button"
                                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                                                onclick="exibirModal('modalEditar{{ $contato->id }}')">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="w-full text-center my-10 py-10 border"><strong>Não há contatos cadastrados</strong></div>
        @endif
    </main>
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        id="modalCadastro">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <img class="w-6 hover:brightness-50" src="{{ asset('img/plus.svg') }}"
                                    alt="adicionar">
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Adicionar
                                    Novo Contato</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Preencha os campos com as informações do seu novo
                                        contato!</p>
                                </div>
                                <!--form com action para rota index e metodo post para cadastrar novos registros-->
                                <form class="mt-5 flex flex-col gap-3" action="{{ route('index') }}" method="post">
                                    @csrf
                                    <div class="flex flex-col gap-2">
                                        <label for="nome" class="text-base text-gray-900">Nome </label>
                                        <input
                                            class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                            value="{{ old('nome') }}" type="text" name="nome"
                                            id="nome" placeholder="Digite seu nome">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="sobrenome" class="text-base text-gray-900">Sobrenome </label>
                                        <input
                                            class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                            value="{{ old('sobrenome') }}" type="text" name="sobrenome"
                                            id="sobrenome" placeholder="Digite seu sobrenome">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="telefone" class="text-base text-gray-900">Telefone </label>
                                        <input
                                            class="bg-gray-100 border-gray-700 rounded-md px-4 py-2 focus:border-gray-100 text-black"
                                            value="{{ old('telefone') }}" type="text" name="telefone"
                                            id="telefone" placeholder="Digite seu telefone"
                                            onkeyup="handlePhone(event)">
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit"
                                            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Cadastrar</button>
                                        <button type="button"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                            onclick="exibirModal('modalCadastro')">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Teste para verificar se existe erros na validação, se existe mostrar quais erros são-->
    @if ($errors->any())
        <div class="absolute flex flex-col gap-2 top-5 left-3">
            @foreach ($errors->all() as $erro)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded opacity-75"
                    role="alert">
                    <strong class="font-bold">Tente Novamente!</strong>
                    <span class="block sm:inline">
                        {{ $erro }}
                    </span>
                </div>
            @endforeach
        </div>

    @endif

    <!--Teste para verificar se existe mensagens de sucesso, se sim, mostrar na pagina-->
    @if (session('msg'))
        <div class="absolute flex flex-col gap-2 top-5 left-3">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded opacity-75"
                role="alert">
                <strong class="font-bold">Contato </strong>
                <span class="block sm:inline">
                    {{ session('msg') }}
                </span>
            </div>
        </div>
    @endif


    <script>
        //função javascript para exibir modais
        function exibirModal(idModal) {
            var modal = document.getElementById(idModal);
            modal.classList.toggle("hidden");
        }

        //função javascript para mascara do input telefone
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>
</body>

</html>
