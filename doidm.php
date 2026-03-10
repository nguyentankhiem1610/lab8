<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sua danh muc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
$editingId = isset($_GET['dm']) ? (int) $_GET['dm'] : 0;
?>

<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Sửa danh mục</div>
                <div class="card-body">
                    <?php if ($editingId <= 0) { ?>
                        <?php
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc order by id desc");
                        ?>
                        <div class="list-group">
                            <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                    <span><?php echo htmlspecialchars($rows['ten']); ?></span>
                                    <a class="btn btn-sm btn-outline-primary" href="./doidm.php?dm=<?php echo (int) $rows['id']; ?>">Sua</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <?php
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc where id=" . $editingId);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <?php if ($row) { ?>
                            <form method="post" action="xulydoidm.php" class="row g-3">
                                <div class="col-12">
                                    <label class="form-label" for="tendm">Tên danh mục</label>
                                    <input class="form-control" type="text" id="tendm" name="tendm" value="<?php echo htmlspecialchars($row['ten']); ?>" required />
                                    <input type="hidden" value="<?php echo (int) $row['id']; ?>" name="iddm" />
                                </div>
                                <div class="col-12 d-flex gap-2">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a class="btn btn-outline-secondary" href="./doidm.php">Quay lại</a>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-warning mb-0">Danh mục không tồn tại.</div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php giaiPhongBoNho($link, $result ?? null); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
