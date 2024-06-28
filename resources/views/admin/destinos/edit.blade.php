@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.destino.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.destinos.update", [$destino->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="codigo_municipio_id">{{ trans('cruds.destino.fields.codigo_municipio') }}</label>
                <select class="form-control select2 {{ $errors->has('codigo_municipio') ? 'is-invalid' : '' }}" name="codigo_municipio_id" id="codigo_municipio_id">
                    @foreach($codigo_municipios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('codigo_municipio_id') ? old('codigo_municipio_id') : $destino->codigo_municipio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('codigo_municipio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_municipio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destino.fields.codigo_municipio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codigo_estado_id">{{ trans('cruds.destino.fields.codigo_estado') }}</label>
                <select class="form-control select2 {{ $errors->has('codigo_estado') ? 'is-invalid' : '' }}" name="codigo_estado_id" id="codigo_estado_id">
                    @foreach($codigo_estados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('codigo_estado_id') ? old('codigo_estado_id') : $destino->codigo_estado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('codigo_estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destino.fields.codigo_estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre">{{ trans('cruds.destino.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $destino->nombre) }}">
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destino.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fhotos">{{ trans('cruds.destino.fields.fhotos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fhotos') ? 'is-invalid' : '' }}" id="fhotos-dropzone">
                </div>
                @if($errors->has('fhotos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fhotos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destino.fields.fhotos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nombre_eje">{{ trans('cruds.destino.fields.nombre_eje') }}</label>
                <input class="form-control {{ $errors->has('nombre_eje') ? 'is-invalid' : '' }}" type="text" name="nombre_eje" id="nombre_eje" value="{{ old('nombre_eje', $destino->nombre_eje) }}">
                @if($errors->has('nombre_eje'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_eje') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destino.fields.nombre_eje_helper') }}</span>
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
    var uploadedFhotosMap = {}
Dropzone.options.fhotosDropzone = {
    url: '{{ route('admin.destinos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="fhotos[]" value="' + response.name + '">')
      uploadedFhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFhotosMap[file.name]
      }
      $('form').find('input[name="fhotos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($destino) && $destino->fhotos)
      var files = {!! json_encode($destino->fhotos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="fhotos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection