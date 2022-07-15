<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark <?= ($side == 'home') ? "active" : ""; ?> sidebar-link" href="<?= base_url('/'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                </li>

                <li class="sidebar-item <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang') ? 'selected' : ''; ?>">
                    <a class="sidebar-link has-arrow waves-effect waves-dark <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang') ? 'active' : ''; ?>" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Mastering </span></a>
                    <ul aria-expanded="false" class="collapse first-level <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang') ? 'in' : ''; ?>">
                        <li class="sidebar-item">
                            <a href="<?= base_url('/muser/l_user'); ?>" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> User </span></a>
                        </li>
                        <li class="sidebar-item <?= ($side == 'c_pegawai' or $side == 'e_pegawai') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/mpegawai/l_pegawai'); ?>" class="sidebar-link"><i class="mdi mdi-account-box"></i><span class="hide-menu"> Pegawai </span></a>
                        </li>
                        <li class="sidebar-item <?= ($side == 'c_barang' or $side == 'e_barang') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/mbarang/l_barang'); ?>" class="sidebar-link"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu"> Barang </span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= ($side == 't_lokasi' or $side == 'c_lokasi') ? 'selected' : ''; ?>">
                    <a class="sidebar-link has-arrow waves-effect waves-dark <?= ($side == 't_lokasi' or $side == 'c_lokasi') ? 'active' : ''; ?>" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-book"></i><span class="hide-menu">Transaksi </span></a>
                    <ul aria-expanded="false" class="collapse first-level <?= ($side == 't_lokasi' or $side == 'c_lokasi') ? 'in' : ''; ?>">
                        <li class="sidebar-item <?= ($side == 'c_lokasi' or $side == 'e_lokasi') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/mtrans/t_lokasi'); ?>" class="sidebar-link"><i class="fas fa-map-marker-alt"></i><span class="hide-menu"> Lokasi </span></a>
                        </li>
                        <li class="sidebar-item <?= ($side == 'c_pegawai' or $side == 'e_pegawai') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/mpegawai/l_pegawai'); ?>" class="sidebar-link"><i class="mdi mdi-account-box"></i><span class="hide-menu"> Pegawai </span></a>
                        </li>
                        <li class="sidebar-item <?= ($side == 'c_barang' or $side == 'e_barang') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/mbarang/l_barang'); ?>" class="sidebar-link"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu"> Barang </span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>