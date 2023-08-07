@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.divisa.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.divisas.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="codigo">{{ trans('cruds.divisa.fields.codigo') }}</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" value="{{ old('codigo', '') }}" required>
                            @if($errors->has('codigo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codigo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.divisa.fields.codigo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="valor">{{ trans('cruds.divisa.fields.valor') }}</label>
                            <input class="form-control" type="number" name="valor" id="valor" value="{{ old('valor', '') }}" step="0.01">
                            @if($errors->has('valor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('valor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.divisa.fields.valor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection