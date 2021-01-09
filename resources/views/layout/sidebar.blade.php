<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
  <!-- Brand Logo -->
  <a href="{{url('dashboard')}}" class="brand-link">

      <span class="brand-text font-weight-bold"><img width="50px"
              src="{{url('/lte/dist/img/log-mitrait-new.png')}}"></img>&nbsp; SIM IT SUPPORT</span> </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                  <a class="nav-link active">
                      <i class="nav-icon fas fa-box-open"></i>
                      <p>
                          Master
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                 
                  <ul class="nav nav-treeview"> 
                      @can('master/its','master/pro','master/client','master/status','master/progress','master/status','auth/staff')
                      <li class="nav-item">
                          <a href="{{url('its')}}" id="formits" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master IT Support</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('pro')}}" id="formprogrammer" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master Programmer</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('client')}}" id="formclient" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master Client</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('status')}}" id="formstatus" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master Status</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('progress')}}" id="formprogress" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master Progress</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('staff')}}" id="formstaff" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Master Staff</p>
                          </a>
                      </li>
                      @else

                      @endcan
                      
                      

                  </ul>
              </li>
              <li class="nav-item has-treeview menu-open">
                  <a class="nav-link active">
                      <i class="nav-icon fas fa-clipboard-list"></i>
                      <p>
                          Troubleshooting
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                    @can('pengelola/softclient','pengelola/newsoft','pengelola/hard','pengelola/network')
                      <li class="nav-item">
                          <a href="{{url('softclient')}}" id="formsoftclient" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Software Client</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/detail_data/detail_softclients')}}" id="detailsoftclient" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Detail Data Software Client</p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="{{url('newsoft')}}" id="formnewsoft" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Software Baru</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/detail_data/detail_newsofts')}}" id="detailnewsoft" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Detail Data Software Baru</p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="{{url('hardware')}}" id="formhardware" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Hardware</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/detail_data/detail_hard')}}" id="detailhardware" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Detail Data Hardware</p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="{{url('network')}}" id="formnetwork" class="nav-link">
                              <i class="far fa-check-circle"></i>
                              <p>Network</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/detail_data/detail_network')}}" id="detailnetwork" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Detail Data Network</p>
                        </a>
                    </li>
                      @else

                      @endcan
                  </ul>
              </li>

      </nav>
      <!-- /.sidebar-menu -->
  </div>
</aside>
<!-- /.sidebar -->