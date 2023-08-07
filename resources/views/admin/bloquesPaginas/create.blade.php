@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bloquesPagina.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bloques-paginas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.bloquesPagina.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bloquesPagina.fields.posicion') }}</label>
                <select class="form-control {{ $errors->has('posicion') ? 'is-invalid' : '' }}" name="posicion" id="posicion" required>
                    <option value disabled {{ old('posicion', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BloquesPagina::POSICION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('posicion', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('posicion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('posicion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.posicion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pagina">{{ trans('cruds.bloquesPagina.fields.pagina') }}</label>
                <input class="form-control {{ $errors->has('pagina') ? 'is-invalid' : '' }}" type="text" name="pagina" id="pagina" value="{{ old('pagina', '*') }}">
                @if($errors->has('pagina'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pagina') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.pagina_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.bloquesPagina.fields.tipo') }}</label>
                <select class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" name="tipo" id="tipo">
                    <option value disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BloquesPagina::TIPO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conetenido">{{ trans('cruds.bloquesPagina.fields.conetenido') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('conetenido') ? 'is-invalid' : '' }}" name="conetenido" id="conetenido">{!! old('conetenido') !!}</textarea>
                @if($errors->has('conetenido'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conetenido') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.conetenido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="orden">{{ trans('cruds.bloquesPagina.fields.orden') }}</label>
                <input class="form-control {{ $errors->has('orden') ? 'is-invalid' : '' }}" type="number" name="orden" id="orden" value="{{ old('orden', '0') }}" step="1">
                @if($errors->has('orden'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orden') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.orden_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('estatus') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="estatus" value="0">
                    <input class="form-check-input" type="checkbox" name="estatus" id="estatus" value="1" {{ old('estatus', 0) == 1 || old('estatus') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="estatus">{{ trans('cruds.bloquesPagina.fields.estatus') }}</label>
                </div>
                @if($errors->has('estatus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estatus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bloquesPagina.fields.estatus_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.bloques-paginas.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $bloquesPagina->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection