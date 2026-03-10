<?php
$perPage = SO_SP_TREN_TRANG;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, $page);

$dm = isset($_GET['dm']) ? (int) $_GET['dm'] : 0;
$where = $dm > 0 ? " where id_dm = $dm" : "";

$countQuery = "select count(*) as total from tbl_sanpham" . $where;
$countResult = chayTruyVanTraVeDL($link, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalItems = (int) ($countRow['total'] ?? 0);
$totalPages = max(1, (int) ceil($totalItems / $perPage));

if ($page > $totalPages) {
    $page = $totalPages;
}

$offset = ($page - 1) * $perPage;
$listQuery = "select * from tbl_sanpham" . $where . " order by id desc limit $offset, $perPage";
$result = chayTruyVanTraVeDL($link, $listQuery);

$hasProduct = false;
echo "<div class='row g-3'>";
while ($rows = mysqli_fetch_assoc($result)) {
    $hasProduct = true;
    echo "
    <div class='col-sm-6 col-lg-4'>
        <div class='card h-100 shadow-sm'>
            <div class='card-body d-flex flex-column'>
                <h5 class='card-title'>" . htmlspecialchars($rows['ten']) . "</h5>
                <p class='card-text text-muted flex-grow-1'>" . nl2br(htmlspecialchars($rows['mota'])) . "</p>
                <p class='text-danger fw-bold mb-3'>Gia: " . number_format((float) $rows['gia'], 0, ',', '.') . " VND</p>
                <a href='chitiet.php?sp=" . (int) $rows['id'] . "' class='btn btn-primary mt-auto'>Xem chi tiet</a>
            </div>
        </div>
    </div>
    ";
}
echo "</div>";

if (!$hasProduct) {
    echo "<div class='alert alert-warning mt-3 mb-0'>Khong co san pham nao.</div>";
}

if ($totalPages > 1) {
    $baseQuery = $dm > 0 ? "&dm=$dm" : "";

    echo "<nav class='mt-4' aria-label='Phan trang'><ul class='pagination justify-content-center mb-0'>";

    $prevDisabled = $page <= 1 ? " disabled" : "";
    $prevLink = "./?page=" . ($page - 1) . $baseQuery;
    echo "<li class='page-item$prevDisabled'><a class='page-link' href='$prevLink'>Truoc</a></li>";

    for ($i = 1; $i <= $totalPages; $i++) {
        $active = $i === $page ? " active" : "";
        echo "<li class='page-item$active'><a class='page-link' href='./?page=$i$baseQuery'>$i</a></li>";
    }

    $nextDisabled = $page >= $totalPages ? " disabled" : "";
    $nextLink = "./?page=" . ($page + 1) . $baseQuery;
    echo "<li class='page-item$nextDisabled'><a class='page-link' href='$nextLink'>Sau</a></li>";

    echo "</ul></nav>";
}
?>
