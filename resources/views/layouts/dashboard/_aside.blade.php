<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <!-- <p class="app-sidebar__user-designation">{{ implode(', ', auth()->user()->roles->pluck('name')->toArray()) }}</p> -->
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href=""><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.categories.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>



      </ul>
    </aside>