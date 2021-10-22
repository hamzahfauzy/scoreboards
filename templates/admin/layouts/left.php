<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?r=<?=session()->get('user')->level?>">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <?php if(session()->get('user')->level == 'admin'): ?>
                <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/kategori">
                    <span data-feather="file"></span>
                    Data Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/nama-peserta">
                    <span data-feather="file"></span>
                    Data Nama Peserta
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/juri">
                    <span data-feather="file"></span>
                    Data Operator
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/peserta">
                    <span data-feather="user"></span>
                    Data Peserta Lomba
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/scoreboards">
                    <span data-feather="file"></span>
                    Scoreboards
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=admin/setting">
                    <span data-feather="file"></span>
                    Setting
                </a>
            </li>
            <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="index.php?r=juri/peserta">
                    <span data-feather="user"></span>
                    Data Peserta Lomba
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?r=juri/scoreboards">
                    <span data-feather="file"></span>
                    Scoreboards
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>