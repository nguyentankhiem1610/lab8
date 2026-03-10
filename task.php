<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
function navActive($page, $currentPage) {
    return $page === $currentPage ? " active fw-semibold" : "";
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded-3 shadow-sm mb-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="./">QLSP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link<?php echo navActive('index.php', $currentPage); ?>" href="./">Home</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('themdm.php', $currentPage); ?>" href="./themdm.php">Them Danh Muc</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('themsp.php', $currentPage); ?>" href="./themsp.php">Them San Pham</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('doidm.php', $currentPage); ?>" href="./doidm.php">Sua Danh Muc</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('doisp.php', $currentPage); ?>" href="./doisp.php">Sua San Pham</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('xoadm.php', $currentPage); ?>" href="./xoadm.php">Xoa Danh Muc</a></li>
                <li class="nav-item"><a class="nav-link<?php echo navActive('xoasp.php', $currentPage); ?>" href="./xoasp.php">Xoa San Pham</a></li>
            </ul>

            <form class="d-flex" method="get" action="timkiem.php">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Nhap ten san pham..." />
                <button class="btn btn-light" type="submit">Tim kiem</button>
            </form>
        </div>
    </div>
</nav>
