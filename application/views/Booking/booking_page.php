<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gohan 2</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once(APPPATH . 'views/Nav/Navbar.php'); ?>
        <div class="content-wrapper">
            <div class="container text-center mt-3">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                BOOKING REPORT
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>Booking/insert_booking_from_user" method="post">
                                    <div class="row">
                                        <div class="col">User : <?= $_SESSION['username'] ?></div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <input type="text" id="datepicker" readonly class="form-control" name="date" value="<?= $date ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="row">
                                        <?php
                                        foreach ($booking as $item_booking) {
                                            foreach ($menu as $item_menu) {
                                                
                                                // echo $item_booking;
                                                // die();
                                                $tmp_Menu_Code = explode("-", $item_booking)[0];
                                                $tmp_M_Group = explode("-", $item_booking)[1];
                                                // echo strval($tmp_Menu_Code) . $tmp_M_Group;
                                                if ($item_menu->Menu_Code == $tmp_Menu_Code && $item_menu->M_Group == $tmp_M_Group) { ?>
                                                    <div class="col-3">

                                                        <div class="card m_hover" onclick="addCart('<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>')" id="<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                            <div class="card-header">
                                                                <?php print_r($item_menu->Name_Th) ?>
                                                                <br>
                                                                <img class="" height="20" src="<?= base_url() ?>images/s<?php print_r($item_menu->Spicy) ?>.png">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="menu[<?php print_r($item_menu->Menu_Code) ?>-<?php print_r($item_menu->M_Group) ?>]"  type="checkbox" value="<?php print_r($item_menu->Menu_Code) ?>-<?php print_r($item_menu->M_Group) ?>" id="checkbox<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                                    <input type="text" name="M_Group" id="" value="<?php echo ($item_menu->M_Group) ?>" hidden>
                                                                    <input type="text" name="Menu_Code" id="" value="<?php echo ($item_menu->Menu_Code) ?>" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="card-body-item card-body"><img class="img-fluid" src="<?= base_url() ?>images/menu/<?php print_r($item_menu->Menu_Pic) ?>"></div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <?php print_r($item_menu->Price) ?> THB
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php }
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div class="row">
                                        <button class="btn btn-success col-3 mx-auto">จอง</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        // document.getElementById("datepicker").value = localStorage.getItem('date');
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 3 เดือน
                minDate: '-1d',
                beforeShowDay: $.datepicker.noWeekends,
                onSelect: function(dateText) {
                    console.log(dateText);
                    localStorage.setItem('date', dateText)
                    window.location.href = '<?= base_url() ?>Booking/index/' + dateText
                }
            });
        });
    </script>
    <script>
        function addCart(id) {
            document.getElementById("checkbox" + id).click();
        }
    </script>
</body>

</html>