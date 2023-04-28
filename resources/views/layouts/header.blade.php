<header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
        @php $words = explode(' ', $setting->nama_perusahaan); $word = ''; foreach
        ($words as $w) { $word .= $w[0]; } @endphp
        <span class="logo-mini">{{ $word }}</span>
        <span class="logo-lg">
            <b>{{ $setting->nama_perusahaan }}</b>
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <p>
                                {{ auth()->user()->name }}
                            </p>
                            <p>
                                {{ auth()->user()->email }}
                            </p>
                        </li>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('user.profil') }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a
                                href="#"
                                class="btn btn-default btn-flat"
                                onclick="$('#logout-form').submit()">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</header>
<form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
@csrf
</form>