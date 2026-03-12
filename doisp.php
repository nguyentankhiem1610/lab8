<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sua san pham</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
$editingId = isset($_GET['sp']) ? (int) $_GET['sp'] : 0;
?>

<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Sửa sản phẩm</div>
                <div class="card-body">
                    <?php if ($editingId <= 0) { ?>
                        <?php $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham order by id desc"); ?>
                        <div class="list-group">
                            <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                    <span><?php echo htmlspecialchars($rows['ten']); ?></span>
                                    <a class="btn btn-sm btn-outline-primary" href="./doisp.php?sp=<?php echo (int) $rows['id']; ?>">Sửa</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <?php
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id=" . $editingId);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <?php if ($row) { ?>
                            <form method="post" action="xulydoisp.php" class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="iddm">Chọn danh mục</label>
                                    <select class="form-select" name="iddm" id="iddm" required>
                                        <?php
                                        $result2 = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc order by id desc");
                                        while ($rows = mysqli_fetch_assoc($result2)) {
                                            $selected = ((int) $rows['id'] === (int) $row['id_dm']) ? "selected" : "";
                                            echo "<option $selected value='" . (int) $rows['id'] . "'>" . htmlspecialchars($rows['ten']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="tensp">Tên sản phẩm</label>
                                    <input class="form-control" type="text" name="tensp" id="tensp" value="<?php echo htmlspecialchars($row['ten']); ?>" required />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="mota">Mô tả</label>
                                    <textarea class="form-control" name="mota" id="mota" rows="6" required><?php echo htmlspecialchars($row['mota']); ?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="gia">Giá</label>
                                    <input class="form-control" type="number" min="0" name="gia" id="gia" value="<?php echo (float) $row['gia']; ?>" required />
                                </div>

                                <input type="hidden" value="<?php echo (int) $row['id']; ?>" name="idsp" />

                                <div class="col-12 d-flex gap-2">
                                    <button class="btn btn-primary" type="submit">Lưu sản phẩm</button>
                                    <a class="btn btn-outline-secondary" href="./doisp.php">Quay lại</a>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-warning mb-0">Sản phẩm không tồn tại.</div>
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
