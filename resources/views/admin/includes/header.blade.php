<nav class="top-nav">
    <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="logo">
            <a href="#!" >IMMS SYSTEM</a>
        </div>
        <!-- for nav -->
        <ul class="right hide-on-med-and-down top-position">
             
            <li><a href="{{ url('admin/users/view/'.Auth::user()->id) }}">{{ auth()->user()->userName }}</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">arrow_drop_down</i></a></li>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
            </ul>
        </ul>
    </div>
</nav>
