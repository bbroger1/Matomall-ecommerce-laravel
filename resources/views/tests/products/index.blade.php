@extends('admin.layouts.app')
@section('titulo', 'Produtos')
@section('page-title', 'Produtos')
@section('breadcrumb-item', 'Painel')
@section('breadcrumb-item-active', 'Produtos')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Produtos</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Categorias</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @if (count($products) > 0)
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ \App\Helpers\ptBRHelper::real($product->price) }}</td>
                                            <td>
                                                @if (count($product->categories) > 0)
                                                    <p>{{ implode(', ', $product->categories->pluck('name')->toArray()) }}
                                                    </p>
                                                @else
                                                    Sem categoria associada
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">Editar</a>
                                                <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Nenhum produto encontrado.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div style="text-align: right;">
                            <div class="text-center">
                                @if ($products)
                                    {{ $products->links() }}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (Session::has('message'))
        <script>
            setTimeout(function() {
                toastr.options.progressBar = true;
                toastr.success("{{ Session::get('message') }}");
            }, 100);
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            setTimeout(function() {
                toastr.options.progressBar = true;
                toastr.warning("{{ Session::get('warning') }}");
            }, 100);
        </script>
    @endif
@endsection
