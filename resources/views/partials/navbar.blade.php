<?php $class = isset($inHome) ? "" : "scrolled"; ?>

<div class="nav-bar {{$class}}">  
  <div class="container" style="position: relative;">
    <div class="brand-ct">
      <div class="brand-img">
        <img src="/images/borroto.png">
      </div>
      <div class="brand-subimg">
        <img src="/images/colfax.png">
      </div>
    </div>
    <div class="menu-ct pc">
      <ul>
        <li class="lang-{{App::getLocale()}}" style="margin-right: 50px;">
          <a class="lang-en hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
          <a class="lang-es hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
        </li>
        <li class="hvr-underline-from-center">
          <a href="{{Route("home")}}">@lang('app.home')</a>
        </li>
        <li class="hvr-underline-from-center">
          <a href="">@lang('app.neighborhoods')</a>
        </li>
        <li class="hvr-underline-from-center">
          <a href="">@lang('app.guides')</a>
        </li>
        <li class="hvr-underline-from-center">
          <a href="">@lang('app.aboutMe')</a>
        </li>
        <li class="hvr-underline-from-center">
          <a href="{{Route("contacts")}}">@lang('app.contact')</a>
        </li>
      </ul>
    </div>
    <div class="menu-ct mobile">
      <ul>
        <div class="phone-lang-buttons">   
          <div class="brand-subimg">
            <img src="/images/colfax.png">
          </div>       
          <li class="lang-{{App::getLocale()}}">
            <a class="lang-en hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
            <a class="lang-es hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
          </li>
        </div>
        <div>
          <li class="hvr-underline-from-center">
            <a href="{{Route("home")}}">@lang('app.home')</a>
          </li>
        </div>
        <div>
          <li class="hvr-underline-from-center">
            <a href="">@lang('app.neighborhoods')</a>
          </li>
        </div>
        <div>
          <li class="hvr-underline-from-center">
            <a href="">@lang('app.guides')</a>
          </li>
        </div>
        <div>
          <li class="hvr-underline-from-center">
            <a href="">@lang('app.aboutMe')</a>
          </li>
        </div>
        <div>
          <li class="hvr-underline-from-center">
            <a href="{{Route("contacts")}}">@lang('app.contact')</a>
          </li>
        </div>
      </ul>
    </div>
    <div class="mobile-buttons float-right">      
        <div class="tablet-lang-buttons lang-{{App::getLocale()}} float-left" style="margin:2px 40px 0 0;">
          <a class="lang-en hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
          <a class="lang-es hvr-underline-from-center" style="font-size: 9px; font-family: 'SinkinSans-500Medium';" href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
        </div>
        <a class="button-toggle">
          <span class="button-toggle-line"></span>
        </a>
    </div>
  </div>
</div>

<script type="text/javascript">

@if(!isset($inHome))
  var navbar = document.querySelector(".nav-bar");
  navbar.classList.add("scrolled");

  document.addEventListener("scroll",function () {
   
    if(window.prevScrollY < window.scrollY ){//bajando && window.scrollY > 100    
       navbar.classList.add("scroll-down");
       navbar.classList.remove("open");
     }
    else //subiendo
      navbar.classList.remove("scroll-down");

    window.prevScrollY = window.scrollY;

  });
@endif 

document.querySelector('.mobile-buttons .button-toggle').addEventListener("click", function(){
  var navbar = document.querySelector(".nav-bar");
  var menuMobile = document.querySelector(".menu-ct.mobile");
  if(navbar.classList.contains("open")){
    navbar.classList.remove("open");
  }
  else{ 
    navbar.classList.add("open");
  }
});

</script>