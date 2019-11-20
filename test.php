<?php
require_once 'api/include/common.php';
$obj = new Common();
$thirukkural = $obj->selectAll('*', 'thirukkural', 'thirukkural_id');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thirukkural</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset=utf-8" />
    </head>
    <body>
        <div class="section">
            <div class="">
                <?php foreach ($thirukkural as $row) { ?>
                    <p><?php echo nl2br($row['thirukkural']); ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>