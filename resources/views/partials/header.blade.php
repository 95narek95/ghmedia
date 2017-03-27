<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/en/">
                <img id="logo" src="/images/logo.png" alt="">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/{{App::getlocale()}}/">{{trans('home.Home')}}</a></li>
              <li><a href="/{{App::getlocale()}}/services">{{trans('home.Services')}}</a></li>
              <li><a id="about_us_a" href="/{{App::getlocale()}}/about">{{trans('home.AboutUs')}}</a></li>
              <li><a href="/{{App::getlocale()}}/clients">{{trans('home.Clients')}}</a></li>
              <li><a href="/{{App::getlocale()}}/contacts">{{trans('home.Contacts')}}</a></li>
              <li>
                   <a id='main_lang' class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul id="choose_lang" class="dropdown-menu">
                        <li><a href="#"><img src="{{URL::to('images/am.png')}} " alt=""> Arm</a>

                        </li>
                        <li><a href="#"><img src="{{URL::to('images/ru.png')}} " alt=""> Rus</a>

                        </li>
                        <li><a href="#"><img src="{{URL::to('images/us.png')}} " alt=""> Eng</a>

                        </li>
                    </ul>
                <div id="Menu"></div>
              </li>
            </ul>
        </div>
    </div>
</div>
    