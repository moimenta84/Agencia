<!-- SIDEBAR para CRUD (offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="adminSidebarLabel">Menú</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">

      <!-- CRUD GUÍAS -->
      <li class="fw-bold mt-3 text-dark"><i class="fas fa-book me-2"></i>Guías</li>
      <li><a class="nav-link" href="admin.php?vista=guias/listar"><i class="fas fa-list me-2"></i>Listar</a></li>
      <li><a class="nav-link" href="admin.php?vista=guias/crear"><i class="fas fa-plus me-2"></i>Crear</a></li>

      <!-- CRUD USUARIOS -->
      <li class="fw-bold mt-3 text-dark"><i class="fas fa-users me-2"></i>Usuarios</li>
      <li><a class="nav-link" href="admin.php?vista=usuarios/listar"><i class="fas fa-list me-2"></i>Listar</a></li>
      <li><a class="nav-link" href="admin.php?vista=usuarios/crear"><i class="fas fa-plus me-2"></i>Crear</a></li>

      <!-- CRUD DESTINOS -->
      <li class="fw-bold mt-3 text-dark"><i class="fas fa-map-marker-alt me-2"></i>Destinos</li>
      <li><a class="nav-link" href="admin.php?vista=destinos/lista"><i class="fas fa-list me-2"></i>Listar</a></li>
      <li><a class="nav-link" href="admin.php?vista=destinos/crear"><i class="fas fa-plus me-2"></i>Crear</a></li>

    </ul>
  </div>
</div>
