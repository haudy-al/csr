<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/member"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                @if (getDataMember()->level == 'cp')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/member/data-usulan/pemerintah" aria-expanded="false"><i
                                class="mdi mdi-newspaper"></i><span class="hide-menu">Data Usulan Pemerintah</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/member/data-usulan" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span
                                class="hide-menu">Data Usulan Perusahaan</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/member/data-usulan-peminatan" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span
                                class="hide-menu">Data Usulan Peminatan
                                <span class="badge badge-pill bg-danger badge-info ms-3 {{ (getJmlTransaksiProsesByMember() < 1) ? 'd-none' : '' }} ">{{ getJmlTransaksiProsesByMember() }}</span>    
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/member/laporan" aria-expanded="false"><i class="mdi mdi-tab"></i><span
                                class="hide-menu">Data Laporan
                            </span></a>
                    </li>
                @endif

                @if (getDataMember()->level == 'pd')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/member/data-usulan" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span
                                class="hide-menu">Data Usulan Pemerintah</span></a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
