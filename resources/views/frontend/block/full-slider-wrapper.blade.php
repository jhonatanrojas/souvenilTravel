  @php
      $banners = getBanner('principal');
      
      $urlImagen = asset('template/img/hero_3.jpg');
      
      $titulo = '';
      $texto = '';
  @endphp


  <!-- Slider -->

  <div id="full-slider-wrapper">
      <div id="layerslider" style="width:100%;height:400px;">
          <!-- first slide -->

          @foreach ($banners as $key => $banner)
              @if ($banner->imagen)
                  @php
                      
                      $titulo = $banner->titulo;
                      $texto = $banner->html;
                      $link = $banner->url;
                      
                      $urlImagen = $banner->imagen->getUrl();
                      
                  @endphp

                  <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                      <img src="{{ $urlImagen}}" class="ls-bg" alt="Slide background">
                      @if(!empty($titulo))
                      <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;"
                          data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                          {!! $titulo!!}</h3>
                          @endif
                  @if(!empty($texto))
                      <p class="ls-l slide_typo_2" style="top:52%; left:50%;"
                          data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">{{ $texto}} </p>
                  @endif
                  @if(!empty($link))
                  <a class="ls-l button_intro_2 outline" style="top:370px; left:50%;white-space: nowrap;"
                      data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ $link }}'>Ver
                      mas</a>
              @endif
          </div>
      @endif
  @endforeach





</div>
</div>
<!-- End layerslider -->
