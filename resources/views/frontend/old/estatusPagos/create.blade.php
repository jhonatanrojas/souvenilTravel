@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.estatusPago.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.estatus-pagos.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="descripcion">{{ trans('cruds.estatusPago.fields.descripcion') }}</label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                            @if($errors->has('descripcion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('descripcion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.estatusPago.fields.descripcion_helper') }}</span>
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