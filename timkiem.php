<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tim kiem san pham</title>
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

    <div class="row g-3">
        <aside class="col-lg-3">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Danh mục</div>
                <div class="card-body p-2">
                    <ul class="list-group list-group-flush">
                        <?php include_once("menu.php"); ?>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="col-lg-9">
            <?php include_once("content_TK.php"); ?>
        </main>
    </div>
</div>

<?php
giaiPhongBoNho($link, $result ?? null);
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
