<!-- Footer -->
<footer class="bgCFoot text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Text -->
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
        <div class="col">
          <h5><strong>Contacto</strong></h5>
          <h6><i class="fa-regular fa-envelope"></i> proyectojoran@gmail.com</h6>
          <h6><i class="fa-brands fa-whatsapp"></i> (449) - 299 - 61 - 97</h6>
          <h6>Jardines Eternos #101-A <br> Fracc. Panorama <br>Aguascalientes, Mexico </h6>
          
        </div>
        <div class="col">
          <h5><strong>Información</strong></h5>
          <a href="{{ url('terms') }}">
            <h6 class="text-white"><u>Términos y condiciones</u></h6>
          </a>
        </div>
        <div class="col">
          <h5><strong>Más</strong></h5>
          <a  href="{{ url('delivery') }}"><h6 class="text-white"><u>Envíos y devoluciones</u></h6></a>
          <a  href="{{ url('guarantee') }}"><h6 class="text-white"><u>Nuestras garantías</u></h6></a>
          <a  href="{{ url('invoice') }}"><h6 class="text-white"><u>Facturación</u></h6></a>
        </div>
        <div class="col">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/JORAN.png') }}" style="width: 100px" alt="LOGO">
          </a>
        </div>
      </div>
    </div>
    <!-- Section: Text -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright: Marcos JORAN
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->