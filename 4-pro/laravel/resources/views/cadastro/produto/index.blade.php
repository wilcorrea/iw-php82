@extends ('layouts/site')

@section ('title', 'Lista de Produto')

@section ('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif

    Lista de Produtos
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Ativo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <th scope="row">
                    <a href="/produtos/{{ $produto->id }}/edit">{{ $produto->id }}</a>
                </th>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->valor }}</td>
                <td>{{ $produto->ativo ?? '-' }}</td>
                <td>
                    <form
                        action="/produtos/{{ $produto->id }}"
                        method="POST"
                    >
                        @method ('DELETE')
                        @csrf
                        <button>Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection