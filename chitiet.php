<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
$productId = isset($_GET['sp']) ? (int) $_GET['sp'] : 0;
?>

<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Chi tiết sản phẩm</div>
                <div class="card-body">
                    <?php
                    if ($productId > 0) {
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id = " . $productId);
                        if ($rows = mysqli_fetch_assoc($result)) {
                            echo "<h4 class='mb-3'>" . htmlspecialchars($rows['ten']) . "</h4>";
                            echo "<p class='mb-2'><strong>Mô tả:</strong> " . nl2br(htmlspecialchars($rows['mota'])) . "</p>";
                            echo "<p class='mb-0'><strong>Giá:</strong> " . number_format((float) $rows['gia'], 0, ',', '.') . " VND</p>";
                        } else {
                            echo "<div class='alert alert-warning mb-0'>Sản phẩm không tồn tại.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-info mb-0'>Không có sản phẩm nào được chọn.</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php giaiPhongBoNho($link, $result ?? null); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
