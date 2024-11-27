      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
          <div class="sidebar-logo">
              <!-- Logo Header -->
              <div class="logo-header" data-background-color="dark">
                  <a href="index.html" class="logo">
                      <img src="/kaiadmin-lite-1.2.0/assets/img/kaiadmin/logo_light.svg" alt="navbar brand"
                          class="navbar-brand" height="20" />
                  </a>
                  <div class="nav-toggle">
                      <button class="btn btn-toggle toggle-sidebar">
                          <i class="gg-menu-right"></i>
                      </button>
                      <button class="btn btn-toggle sidenav-toggler">
                          <i class="gg-menu-left"></i>
                      </button>
                  </div>
                  <button class="topbar-toggler more">
                      <i class="gg-more-vertical-alt"></i>
                  </button>
              </div>
              <!-- End Logo Header -->
          </div>
          <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                  <ul class="nav nav-secondary">
                      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                          <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                              <i class="fas fa-home"></i>
                              <p>Dashboard</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="dashboard">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="../demo1/index.html">
                                          <span class="sub-item">Dashboard 1</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-section">
                          <span class="sidebar-mini-icon">
                              <i class="fa fa-ellipsis-h"></i>
                          </span>
                          <h4 class="text-section">Akademik</h4>
                      </li>
                      <li class="nav-item">
                          <a href="/jurusan">
                              <i class="fas fa-users"></i>
                              <p>Jurusan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/jenjang">
                              <i class="fas fa-users"></i>
                              <p>Jenjang</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/prodi">
                              <i class="fas fa-users"></i>
                              <p>Prodi</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/mahasiswa">
                              <i class="fas fa-users"></i>
                              <p>Mahasiswa</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/dosen">
                              <i class="fas fa-users"></i>
                              <p>Dosen</p>
                          </a>
                      </li>
                      <li class="nav-item ">
                          <a data-bs-toggle="collapse" href="#chartsTA">
                              <i class="far fa-id-card"></i>
                              <p>TA</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="chartsTA">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="/users">
                                          <i class="fas fa-users"></i>
                                          <p>Judul TA <span class="text-info">(Kaprodi)</span></p>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="/roles">
                                          <i class="fas fa-users"></i>
                                          <p>Ajukan Judul <span class="text-info">(Mhs)</span></p>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item ">
                          <a data-bs-toggle="collapse" href="#chartsBimbingan">
                              <i class="far fa-id-card"></i>
                              <p>Bimbingan</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="chartsBimbingan">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="/users">
                                          <i class="fas fa-users"></i>
                                          <p>Belum Sidang</p>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="/roles">
                                          <i class="fas fa-users"></i>
                                          <p>Sudah Sidang</p>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item ">
                          <a data-bs-toggle="collapse" href="#chartsSidangTA">
                              <i class="far fa-id-card"></i>
                              <p>Sidang TA</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="chartsSidangTA">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="/users">
                                          <i class="fas fa-users"></i>
                                          <p>Sidang</p>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="/roles">
                                          <i class="fas fa-users"></i>
                                          <p>Riwayat Sidang</p>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-section">
                          <span class="sidebar-mini-icon">
                              <i class="fa fa-ellipsis-h"></i>
                          </span>
                          <h4 class="text-section">Aturan</h4>
                      </li>
                      <li class="nav-item ">
                          <a data-bs-toggle="collapse" href="#chartsMg">
                              <i class="far fa-id-card"></i>
                              <p>Management <span class="text-info">(SA,A)</span></p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="chartsMg">
                              <ul class="nav nav-collapse">
                                  <li class="{{ Request::is('/users') ? 'active' : '' }}">
                                      <a href="/users">
                                          <i class="fas fa-users"></i>
                                          <p>Users</p>
                                      </a>
                                  </li>
                                  <li class="{{ Request::is('/roles') ? 'active' : '' }}">
                                      <a href="/roles">
                                          <i class="fas fa-users"></i>
                                          <p>Roles</p>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- End Sidebar -->
