<style>
    /* Style untuk list item pada side bar */
    .side ul li {
        border-bottom: 1px solid black;
        padding: 10px; /* Atur jarak antara icon dan tulisan */
        list-style: none; /* Hilangkan bullet list */
    }

    /* Style untuk tautan pada list item side bar */
    .side ul li a {
        color: black;
        text-decoration: none;
        display: flex;
        align-items: center; /* Mengatur ikon dan teks agar berada pada garis vertikal yang sama */
    }

    /* Style untuk ikon pada list item side bar */
    .side ul li a i {
        margin-right: 10px;
    }
</style>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow mb-4">
    <div class="container">
    <a class="offcanvas-title fs-3 fw-bold" style="text-decoration:none; color:black;" id="offcanvasExampleLabel">Toko Albinda</a>
        <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bx bx-menu fs-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cek.php">Keranjang</a>
            </li>
            <li class="nav-item dropdown">
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <a class="nav-link active" href="logout.php" id="navbarDropdown">
                Logout
            </a>
            <?php else: ?>
            <a class="nav-link active" href="login.php" id="navbarDropdown">
                Login
            </a>
            <?php endif?>
            </li>
            <li class="nav-item dropdown">
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <a class="nav-link active" href="akun.php" id="navbarDropdown">
                Dashboard
            </a>
            <?php else: ?>
            <a class="nav-link active" href="register.php" id="navbarDropdown">
                Register
            </a>
            <?php endif?>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cek2.php">Checkout</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-warning shadow">
            <a class="offcanvas-title fs-3 fw-bold" style="text-decoration:none; color:black;" id="offcanvasExampleLabel">Toko Albinda</a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="side offcanvas-body mt-2">
            <ul class="nav flex-column fs-4">
            <li class="nav-item ">
            <a class="nav-link active" href="index.php" style="text-decoration:none" aria-current="page"><i class='bx bx-store'></i> Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cek.php"> <i class='bx bx-basket'></i> Keranjang</a>
            </li>
            <li class="nav-item dropdown">
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <a class="nav-link active" href="logout.php" id="navbarDropdown">
                <i class='bx bxs-log-out'></i> Logout
            </a>
                    <?php else: ?>
                    <a class="nav-link active" href="login.php" id="navbarDropdown">
                    <i class='bx bxs-log-in'></i>  Login
                    </a>
                    <?php endif?>
            </li>
            <li class="nav-item dropdown">
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <a class="nav-link active" href="akun.php" id="navbarDropdown">
                <i class='bx bxs-dashboard'></i> Dashboard
            </a>
                <?php else: ?>
                <a class="nav-link active" href="register.php" id="navbarDropdown">
                <i class='bx bx-log-in-circle'></i> Register
                </a>
                <?php endif?>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cek2.php"><i class='bx bx-shopping-bag'></i> Checkout</a>
            </li>
            </ul>
        </div>
        <div class="offcanvas-footer">
            <div class="fw-4 text-center">created: Rafi pranata</div>
        </div>
</div>