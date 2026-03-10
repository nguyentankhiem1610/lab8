<?php
$result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc order by id desc");
while ($rows = mysqli_fetch_assoc($result)) {
    echo "<li class='list-group-item'><a class='text-decoration-none' href='?dm=" . (int) $rows['id'] . "'>" . htmlspecialchars($rows['ten']) . "</a></li>";
}
