<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <!-- <p class="app-sidebar__user-designation">{{ implode(', ', auth()->user()->roles->pluck('name')->toArray()) }}</p> -->
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.artworks.index')}}"><i class="app-menu__icon fa fa-paint-brush"></i><span class="app-menu__label">Artworks</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.leads.index')}}"><i class="app-menu__icon fa fa-sticky-note"></i><span class="app-menu__label">Leads</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.leads.index')}}"><i class="app-menu__icon fa fa-envelope-square"></i><span class="app-menu__label">Messages</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.leads.index')}}"><i class="app-menu__icon fa fa-inbox"></i><span class="app-menu__label">Applications</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.users.index')}}"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.artists.index')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Artists</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.profiles.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Customers</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.leads.index')}}"><i class="app-menu__icon fa fa-chart-line"></i><span class="app-menu__label">Analytics<i class="fas fa-chart-bar"></i></span></a></li>

        <li><a class="app-menu__item" href="{{ route('admin.categories.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.styles.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Styles</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.techniques.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Techniques</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.techniques.index')}}"><i class="app-menu__icon fa fa-blog"></i><span class="app-menu__label">Blogs</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.techniques.index')}}"><i class="app-menu__icon fa fa-newspaper"></i><span class="app-menu__label">News</span></a></li>
        <i class="fas fa-newspaper"></i>
      </ul>
    </aside>