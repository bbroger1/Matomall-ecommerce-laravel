@extends('admin.layouts.app')
@section('titulo','Editando Loja '. $store->name)
@section('page-title','Lojas')
@section('breadcrumb-item','Painel')
@section('breadcrumb-item-active','Lojas')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" data-select2-id="15">
                <div class="card">

                    <form action="{{route('admin.store.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Dados da loja</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-left control-label col-form-label">Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}" placeholder="Digite o nome aqui">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 text-left control-label col-form-label">Descrição</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description" cols="30" rows="5"placeholder="Digite a descrição aqui">{{$store->description}}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-left control-label col-form-label">Telefone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$store->phone}}" placeholder="Digite o telefone aqui">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile_phone" class="col-sm-3 text-left control-label col-form-label">Celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{$store->mobile_phone}}" placeholder="Digite o celular aqui">
                                    @error('mobile_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-md-3 m-t-15">Logo</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" id="logo" name="logo">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                             </div>
                        </div>
                    </form>
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
@endsection
