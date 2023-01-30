<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo" style="background-color: #320000">
      <a href="{{ url('/') }}" class="simple-text logo-normal" style="color: #fff; font-weight:bold; font-size:32px">
        JORAN
      </a></div>
    <div class="sidebar-wrapper navbar-expand-lg bgCNav">
      <div class="container-fluid">
        <ul class="nav">
          <li class="nav-item {{  Request::is('dashboard') ? 'active':'';}}  ">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p class="textNav" style="font-size: 18px">Inicio</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('categories') ? 'active':'';}}">
            <a class="nav-link textNav" href="{{ url('categories') }}">
              <i class="material-icons">category</i>
              <p class="textNav" style="font-size: 18px">Categorías</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('add-category') ? 'active':'';}}">
            <a class="nav-link" href="{{ url('add-category') }}">
              <i class="material-icons">add</i>
              <p class="textNav" style="font-size: 18px">Agregar Categoría</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('products') ? 'active':'';}}">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="material-icons">inventory</i>
              <p class="textNav" style="font-size: 18px">Productos</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('add-products') ? 'active':'';}}">
            <a class="nav-link" href="{{ url('add-products') }}">
              <i class="material-icons">add</i>
              <p class="textNav" style="font-size: 18px">Agregar Productos</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('orders') ? 'active':'';}}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">reorder</i>
              <p class="textNav" style="font-size: 18px">Órdenes</p>
            </a>
          </li>
          <li class="nav-item {{  Request::is('users') ? 'active':'';}}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">person</i>
              <p class="textNav" style="font-size: 18px">Usuarios</p>
            </a>
          </li>
        </ul>
      </div>
      
    </div>
  </div>