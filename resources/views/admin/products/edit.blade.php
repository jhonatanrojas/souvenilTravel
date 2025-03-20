@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="prestador_servicios">{{ trans('cruds.product.fields.prestador_servicio') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('prestador_servicios') ? 'is-invalid' : '' }}" name="prestador_servicios[]" id="prestador_servicios" multiple>
                    @foreach($prestador_servicios as $id => $prestador_servicio)
                        <option value="{{ $id }}" {{ (in_array($id, old('prestador_servicios', [])) || $product->prestador_servicios->contains($id)) ? 'selected' : '' }}>{{ $prestador_servicio }}</option>
                    @endforeach
                </select>
                @if($errors->has('prestador_servicios'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prestador_servicios') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.prestador_servicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>


            <div class="form-group">
                <label class="required" for="resumen">{{ trans('Resumen') }}</label>
                <input class="form-control {{ $errors->has('resumen') ? 'is-invalid' : '' }}" type="text" name="resumen" id="resumen" value="{{ old('resumen', $product->resumen) }}" >
                @if($errors->has('resumen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('resumen') }}
                    </div>
                @endif

            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $product->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado_id">{{ trans('cruds.product.fields.estado') }}</label>
                <select class="form-control select2 {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado_id" id="estado_id">
                    @foreach($estados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('estado_id') ? old('estado_id') : $product->estado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nro_adultos">{{ trans('cruds.product.fields.nro_adultos') }}</label>
                <input class="form-control {{ $errors->has('nro_adultos') ? 'is-invalid' : '' }}" type="number" name="nro_adultos" id="nro_adultos" value="{{ old('nro_adultos', $product->nro_adultos) }}" step="1" required>
                @if($errors->has('nro_adultos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nro_adultos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.nro_adultos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nro_ninos">{{ trans('cruds.product.fields.nro_ninos') }}</label>
                <input class="form-control {{ $errors->has('nro_ninos') ? 'is-invalid' : '' }}" type="number" name="nro_ninos" id="nro_ninos" value="{{ old('nro_ninos', $product->nro_ninos) }}" step="1">
                @if($errors->has('nro_ninos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nro_ninos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.nro_ninos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destino_id">{{ trans('cruds.product.fields.destino') }}</label>
                <select class="form-control select2 {{ $errors->has('destino') ? 'is-invalid' : '' }}" name="destino_id" id="destino_id">
                    @foreach($destinos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('destino_id') ? old('destino_id') : $product->destino->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('destino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destino') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.destino_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direccion">{{ trans('cruds.product.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', $product->direccion) }}">
                @if($errors->has('direccion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direccion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.direccion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diponible_desde">{{ trans('cruds.product.fields.diponible_desde') }}</label>
                <input class="form-control date {{ $errors->has('diponible_desde') ? 'is-invalid' : '' }}" type="text" name="diponible_desde" id="diponible_desde" value="{{ old('diponible_desde', $product->diponible_desde) }}">
                @if($errors->has('diponible_desde'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diponible_desde') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.diponible_desde_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disponible_hasta">{{ trans('cruds.product.fields.disponible_hasta') }}</label>
                <input class="form-control date {{ $errors->has('disponible_hasta') ? 'is-invalid' : '' }}" type="text" name="disponible_hasta" id="disponible_hasta" value="{{ old('disponible_hasta', $product->disponible_hasta) }}">
                @if($errors->has('disponible_hasta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disponible_hasta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.disponible_hasta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('estatus') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="estatus" value="0">
                    <input class="form-check-input" type="checkbox" name="estatus" id="estatus" value="1" {{ $product->estatus || old('estatus', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="estatus">{{ trans('cruds.product.fields.estatus') }}</label>
                </div>
                @if($errors->has('estatus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estatus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.estatus_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.product.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $product->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitud">{{ trans('cruds.product.fields.latitud') }}</label>
                <input class="form-control {{ $errors->has('latitud') ? 'is-invalid' : '' }}" type="text" name="latitud" id="latitud" value="{{ old('latitud', $product->latitud) }}">
                @if($errors->has('latitud'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitud') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.latitud_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logitud">{{ trans('cruds.product.fields.logitud') }}</label>
                <input class="form-control {{ $errors->has('logitud') ? 'is-invalid' : '' }}" type="text" name="logitud" id="logitud" value="{{ old('logitud', $product->logitud) }}">
                @if($errors->has('logitud'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logitud') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.logitud_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" onchange="loadSubCategories(this.value)">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $product->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_categoria_id">{{ trans('cruds.product.fields.sub_categoria') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_categoria') ? 'is-invalid' : '' }}" name="sub_categoria_id" id="sub_categoria_id">
                    @foreach($sub_categorias as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sub_categoria_id') ? old('sub_categoria_id') : $product->sub_categoria->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_categoria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_categoria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sub_categoria_helper') }}</span>
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


function loadSubCategories(categoryId) {
        $.ajax({
            type: 'GET',
            url: '/admin/subcategorias/' + categoryId,
            success: function(data) {
                $('#sub_categoria_id').empty();
                $.each(data, function(index, value) {
                    $('#sub_categoria_id').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                });
            }
        });
    }

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
                xhr.open('POST', '{{ route('admin.products.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $product->id ?? 0 }}');
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

<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->photo)
      var files = {!! json_encode($product->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
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
