<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Them danh muc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container py-4">
    <?php include_once("task.php"); ?>

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Thêm danh mục</div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] === "done") {
                            echo "<div class='alert alert-success'>Thêm danh mục thành công.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Thêm danh mục không thành công.</div>";
                        }
                    }
                    ?>

                    <form method="post" action="xulydm.php" class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="tendm">Tên danh mục</label>
                            <input class="form-control" type="text" name="tendm" id="tendm" required />
                        </div>
                        <div class="col-12 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Thêm danh mục</button>
                            <button class="btn btn-outline-secondary" type="reset">Làm rỗng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
