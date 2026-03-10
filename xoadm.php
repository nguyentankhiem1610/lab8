<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Xoá danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
?>

<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Xoá danh mục</div>
                <div class="card-body">
                    <?php $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc order by id desc"); ?>
                    <div class="list-group">
                        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                <span><?php echo htmlspecialchars($rows['ten']); ?></span>
                                <a class="btn btn-sm btn-outline-danger" href="./xulyxoadm.php?dm=<?php echo (int) $rows['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');">Xoá</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php giaiPhongBoNho($link, $result ?? null); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
