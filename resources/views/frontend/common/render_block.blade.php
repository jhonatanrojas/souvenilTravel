<!--Render block-->
@php
  $positionBlock = $positionBlock ?? '';

  $sc_blocksContent =listBloques();
  $sc_templatePath ='frontend';

@endphp
@isset($sc_blocksContent[$positionBlock])


    @foreach ($sc_blocksContent[$positionBlock] as $layout)
        @php
    $arrPage = explode(',', $layout->pagina);
     
        @endphp


        @if ($layout->pagina == '*' || (isset($layout_page) && in_array($layout_page, $arrPage)))
 
          
            @if ($layout->tipo== 'html')
                {!! $layout->conetenido !!}
            @elseif($layout->tipo== 'view')

                @includeIf($sc_templatePath . '.block.' . $layout->conetenido)
            @elseif($layout->tipo== 'pagina')
                <section class="section section-xxl bg-default">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                {!! sc_html_render(
                                    $modelPage->start()->getDetail($layout->conetenido, $type = 'alias', $checkActive = 0)->content ?? '',
                                ) !!}
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
    @endforeach
   
@endisset
@php
    unset($positionBlock);
@endphp
<!--//Render block-->
