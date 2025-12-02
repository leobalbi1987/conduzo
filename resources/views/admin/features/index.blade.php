<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Funcionalidades</h2>
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600 dark:text-green-400">{{ session('status') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-4 text-sm text-red-600 dark:text-red-400">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('admin.features.store') }}" class="grid grid-cols-1 md:grid-cols-6 gap-3 mb-6">
                    @csrf
                    <input type="text" name="label" placeholder="Nome" class="border rounded p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
                    <input type="text" name="href" placeholder="Link (ex.: /auditorias)" class="border rounded p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <input type="text" name="group" placeholder="Grupo (ex.: Cadastros, Personalizados)" class="border rounded p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <input type="number" name="position" placeholder="Ordem" class="border rounded p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" value="0">
                    <label class="inline-flex items-center gap-2 text-gray-700 dark:text-gray-200"><input type="checkbox" name="visible" checked> Visível</label>
                    <select name="parent_id" class="border rounded p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <option value="">Sem pai</option>
                        @foreach ($features as $opt)
                            <option value="{{ $opt->id }}">{{ $opt->label }}</option>
                        @endforeach
                    </select>
                    <div class="md:col-span-6">
                        <button class="px-4 py-2 rounded bg-indigo-600 text-white">Adicionar</button>
                    </div>
                </form>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left border-b border-gray-200 dark:border-gray-700">
                                <th class="py-2">Nome</th>
                                <th class="py-2">Link</th>
                                <th class="py-2">Grupo</th>
                                <th class="py-2">Ordem</th>
                                <th class="py-2">Pai</th>
                                <th class="py-2">Visível</th>
                                <th class="py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($features as $f)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <form method="POST" action="{{ route('admin.features.update', $f) }}">
                                    @csrf
                                    @method('PATCH')
                                    <td class="py-2"><input class="border rounded p-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 w-full" type="text" name="label" value="{{ $f->label }}"></td>
                                    <td class="py-2"><input class="border rounded p-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 w-full" type="text" name="href" value="{{ $f->href }}"></td>
                                    <td class="py-2"><input class="border rounded p-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 w-full" type="text" name="group" value="{{ $f->group }}"></td>
                                    <td class="py-2"><input class="border rounded p-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 w-24" type="number" name="position" value="{{ $f->position }}"></td>
                                    <td class="py-2">
                                        <select name="parent_id" class="border rounded p-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                                            <option value="">Sem pai</option>
                                            @foreach ($features as $opt)
                                                <option value="{{ $opt->id }}" {{ $f->parent_id === $opt->id ? 'selected' : '' }}>{{ $opt->label }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="py-2"><input type="checkbox" name="visible" {{ $f->visible ? 'checked' : '' }}></td>
                                    <td class="py-2 flex gap-2">
                                        <button class="px-3 py-1 rounded bg-indigo-600 text-white">Salvar</button>
                                </form>
                                        <form method="POST" action="{{ route('admin.features.destroy', $f) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 rounded bg-red-600 text-white">Remover</button>
                                        </form>
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>