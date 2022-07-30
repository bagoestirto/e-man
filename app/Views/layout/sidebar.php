<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark <?= ($side == 'home') ? "active" : ""; ?> sidebar-link" href="<?= base_url('/'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                </li>

                <?php if (session()->get('jabatan') == "Admin") { ?>
                    <li class="sidebar-item <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang' or $side == 'c_user') ? 'selected' : ''; ?>">
                        <a class="sidebar-link has-arrow waves-effect waves-dark <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang' or $side == 'c_user') ? 'active' : ''; ?>" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Mastering </span></a>
                        <ul aria-expanded="false" class="collapse first-level <?= ($side == 'c_pegawai' or $side == 'e_pegawai' or $side == 'c_barang' or $side == 'e_barang' or $side == 'c_user') ? 'in' : ''; ?>">
                            <li class="sidebar-item <?= ($side == 'c_user') ? 'active' : ''; ?>">
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
                <?php } ?>
                <?php if ((session()->get('jabatan') == "Admin") or (session()->get('jabatan') == "Sarpras")) { ?>

                    <li class="sidebar-item <?= ($side == 't_lokasi' or $side == 'c_lokasi' or $side == 'c_perawatan' or $side == 'c_pinjam' or $side == 'c_kembali') ? 'selected' : ''; ?>">
                        <a class="sidebar-link has-arrow waves-effect waves-dark <?= ($side == 't_lokasi' or $side == 'c_lokasi' or $side == 'c_perawatan' or $side == 'c_pinjam' or $side == 'c_kembali') ? 'active' : ''; ?>" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-book"></i><span class="hide-menu">Transaksi </span></a>
                        <ul aria-expanded="false" class="collapse first-level <?= ($side == 't_lokasi' or $side == 'c_lokasi' or $side == 'c_perawatan' or $side == 'c_pinjam' or $side == 'c_kembali') ? 'in' : ''; ?>">
                            <li class="sidebar-item <?= ($side == 'c_lokasi' or $side == 'e_lokasi') ? 'active' : ''; ?>">
                                <a href="<?= base_url('/mtrans/t_lokasi'); ?>" class="sidebar-link"><i class="fas fa-map-marker-alt"></i><span class="hide-menu"> Lokasi </span></a>
                            </li>
                            <li class="sidebar-item <?= ($side == 'c_perawatan') ? 'active' : ''; ?>">
                                <a href="<?= base_url('/mperawatan/l_perawatan'); ?>" class="sidebar-link"><i class="mdi mdi-settings"></i><span class="hide-menu"> Perawatan </span></a>
                            </li>
                            <li class="sidebar-item <?= ($side == 'c_pinjam') ? 'active' : ''; ?>">
                                <a href="<?= base_url('/mpinjam/l_pinjam'); ?>" class="sidebar-link"><i class="fas fa-arrow-alt-circle-up"></i><span class="hide-menu"> Peminjaman </span></a>
                            </li>
                            <li class="sidebar-item <?= ($side == 'c_kembali') ? 'active' : ''; ?>">
                                <a href="<?= base_url('/mpinjam/l_kembali'); ?>" class="sidebar-link"><i class="fas fa-arrow-alt-circle-down"></i><span class="hide-menu"> Pengembalian </span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>