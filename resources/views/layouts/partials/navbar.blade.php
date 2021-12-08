<nav class="navbar navbar-expand-lg navbar-dark bg-black ">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
      <ul class="navbar-nav">
        <li class="nav-item"> 
          <a class="nav-link {{ ($title === "Homepage") ? 'active' : ' '}}" href="/agendas/index">Agenda</a>
        </li>
      </ul>
      <form class="d-flex bg-black">
        <input name="search" class="form-control me-2 mr-sm-2" type="search" placeholder="Cari Data">
        <button class="btn btn-outline-dark bg-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
