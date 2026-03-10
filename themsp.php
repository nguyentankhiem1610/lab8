<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Them san pham</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php require_once("db_module.php"); ?>
<?php
$link = null;
taoKetNoi($link);
?>

<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Thêm sản phẩm</div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] === "done") {
                            echo "<div class='alert alert-success'>Thêm thành công.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Thêm không thành công.</div>";
                        }
                    }
                    ?>

                    <form method="post" action="xulysp.php" class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="iddm">Chọn danh mục</label>
                            <select class="form-select" name="iddm" id="iddm" required>
                                <?php
                                $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc order by id desc");
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . (int) $rows['id'] . "'>" . htmlspecialchars($rows['ten']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="tensp">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="tensp" id="tensp" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="mota">Mô tả</label>
                            <textarea class="form-control" name="mota" id="mota" rows="5" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="gia">Giá</label>
                            <input class="form-control" type="number" min="0" step="1000" name="gia" id="gia" required />
                        </div>

                        <div class="col-12 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                            <button class="btn btn-outline-secondary" type="reset">Làm rỗng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php giaiPhongBoNho($link, $result ?? null); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
