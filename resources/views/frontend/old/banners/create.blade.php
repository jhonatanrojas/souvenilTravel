@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.banner.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.banners.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="imagen">{{ trans('cruds.banner.fields.imagen') }}</label>
                            <div class="needsclick dropzone" id="imagen-dropzone">
                            </div>
                            @if($errors->has('imagen'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('imagen') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.imagen_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.banner.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', '') }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="target">{{ trans('cruds.banner.fields.target') }}</label>
                            <input class="form-control" type="text" name="target" id="target" value="{{ old('target', '_blank') }}">
                            @if($errors->has('target'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('target') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.target_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="titulo">{{ trans('cruds.banner.fields.titulo') }}</label>
                            <input class="form-control" type="text" name="titulo" id="titulo" value="{{ old('titulo', '') }}">
                            @if($errors->has('titulo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('titulo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.titulo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="html">{{ trans('cruds.banner.fields.html') }}</label>
                            <textarea class="form-control ckeditor" name="html" id="html">{!! old('html') !!}</textarea>
                            @if($errors->has('html'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('html') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.html_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.banner.fields.ubicacion') }}</label>
                            <select class="form-control" name="ubicacion" id="ubicacion" required>
                                <option value disabled {{ old('ubicacion', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Banner::UBICACION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('ubicacion', 'principal') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ubicacion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ubicacion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.ubicacion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="orden">{{ trans('cruds.banner.fields.orden') }}</label>
                            <input class="form-control" type="number" name="orden" id="orden" value="{{ old('orden', '0') }}" step="1">
                            @if($errors->has('orden'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('orden') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.orden_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="estatus" value="0">
                                <input type="checkbox" name="estatus" id="estatus" value="1" {{ old('estatus', 0) == 1 || old('estatus') === null ? 'checked' : '' }}>
                                <label for="estatus">{{ trans('cruds.banner.fields.estatus') }}</label>
                            </div>
                            @if($errors->has('estatus'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('estatus') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.estatus_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imagenDropzone = {
    url: '{{ route('frontend.banners.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="imagen"]').remove()
      $('form').append('<input type="hidden" name="imagen" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="imagen"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($banner) && $banner->imagen)
      var file = {!! json_encode($banner->imagen) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="imagen" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
                xhr.open('POST', '{{ route('frontend.banners.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $banner->id ?? 0 }}');
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