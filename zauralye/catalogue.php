<?php
include('pageBase.php');

if (isset($_POST)){
    print_r($_POST);
}

?>
<div class="content">
    <form action="#" method='post'>
        <?php
        $res = $con->query("SELECT * FROM tour_types");
        while ($tour_types = mysqli_fetch_assoc($res)) {
        ?>
            <div class="filter-point"><label for="<?= $tour_types['code_type'] ?>"><?= $tour_types['name_type'] ?><input type="checkbox" name="<?= $tour_types['code_type'] ?>" id="<?= $tour_types['code_type'] ?>" value="true" checked></label></div>
        <?php
        }
        ?>
        <button type="submit">Применить</button>
    </form>
    <?php
    $query = "SELECT * FROM `tours` LEFT JOIN `tour_types` ON `tours`.`type` = `tour_types`.`id_type`";
    $res = $con->query($query);

    while ($tour = mysqli_fetch_assoc($res)) {
    ?>
        <p><a href="tour.php?id=<?= $tour['id'] ?>"><?= $tour['name'] ?> <?= $tour['name_type'] ?></a></p>
    <?php
    }

    ?>
</div>