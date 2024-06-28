@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subCategorium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub-categoria.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categoria_id">{{ trans('cruds.subCategorium.fields.categoria') }}</label>
                <select class="form-control select2 {{ $errors->has('categoria') ? 'is-invalid' : '' }}" name="categoria_id" id="categoria_id">
                    @foreach($categorias as $id => $entry)
                        <option value="{{ $id }}" {{ old('categoria_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categoria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategorium.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.subCategorium.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategorium.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection