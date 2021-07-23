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
            <div class="container">
                <div class="row mt-3 mb-3">
                    <form action="<?= base_url(); ?>Booking/insert" method="post">
                        <div class="card border border-info">
                            <div class="card-header">
                                <div class="row mt-3">
                                    <div class="col-1">
                                        <label for="exampleFormControlInput1">
                                            Date
                                            <label class="text-danger">
                                                *
                                            </label>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="text" id="datepicker" readonly class="form-control" name="date" value="<?php echo $date; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="row mt-3 text-center">
                                    <div class="col ">
                                        <h3>
                                            Main dish
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="width:20px">
                                                    <th class="checkbox-1">#</th>
                                                    <th>MENU</th>
                                                    <th>Price (THB)</th>
                                                    <th>Spicy</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
                                                <?php foreach ($menu_main as $item) {
                                                ?>
                                                    <tr>
                                                        <td style="width:20px">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>" id="<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" name="menu[<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>]" <?= in_array(($item->Menu_Code) . '-' . ($item->M_Group), $booking) ? "checked" : null ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Name_Th) ?>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Price) ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url() ?>images\s<?php print_r($item->Spicy) ?>.png" alt="" height="20">
                                                            (<?php print_r($item->Spicy) ?>)
                                                        </td>
                                                    </tr>
                                                <?php $tmp = 0;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="row mt-3 text-center">
                                    <div class="col ">
                                        <h3>
                                            Side dish
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="width:20px">
                                                    <th class="checkbox-1">#</th>
                                                    <th>MENU</th>
                                                    <th>Price (THB)</th>
                                                    <th>Spicy</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
                                                <?php foreach ($menu_side as $item) {
                                                ?>
                                                    <tr>
                                                        <td style="width:20px">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>" id="<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" name="menu[<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>]" <?= in_array(($item->Menu_Code) . '-' . ($item->M_Group), $booking) ? "checked" : null ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Name_Th) ?>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Price) ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url() ?>images\s<?php print_r($item->Spicy) ?>.png" alt="" height="20">
                                                            (<?php print_r($item->Spicy) ?>)
                                                        </td>
                                                    </tr>
                                                <?php $tmp = 0;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="row mt-3 text-center">
                                    <div class="col ">
                                        <h3>
                                            Noodle
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="width:20px">
                                                    <th class="checkbox-1">#</th>
                                                    <th>MENU</th>
                                                    <th>Price (THB)</th>
                                                    <th>Spicy</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
                                                <?php foreach ($menu_noodle as $item) {
                                                ?>
                                                    <tr>
                                                        <td style="width:20px">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>" id="<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" name="menu[<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>]" <?= in_array(($item->Menu_Code) . '-' . ($item->M_Group), $booking) ? "checked" : null ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Name_Th) ?>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Price) ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url() ?>images\s<?php print_r($item->Spicy) ?>.png" alt="" height="20">
                                                            (<?php print_r($item->Spicy) ?>)
                                                        </td>
                                                    </tr>
                                                <?php $tmp = 0;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="row mt-3 text-center">
                                    <div class="col ">
                                        <h3>
                                            Dessert
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="width:20px">
                                                    <th class="checkbox-1">#</th>
                                                    <th>MENU</th>
                                                    <th>Price (THB)</th>
                                                    <th>Spicy</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
                                                <?php foreach ($menu_dessert as $item) {
                                                ?>
                                                    <tr>
                                                        <td style="width:20px">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>" id="<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" name="menu[<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>]" <?= in_array(($item->Menu_Code) . '-' . ($item->M_Group), $booking) ? "checked" : null ?>>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Name_Th) ?>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Price) ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url() ?>images\s<?php print_r($item->Spicy) ?>.png" alt="" height="20">
                                                            (<?php print_r($item->Spicy) ?>)
                                                        </td>
                                                    </tr>
                                                <?php $tmp = 0;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class=" row">
                            <button class="btn btn-success col-3 mx-auto" id="save-btn">SAVE</button>
                        </div>
                    </form>
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
        // document.getElementById("datepicker").value = today;
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 3 เดือน
                minDate: '-3m',
                beforeShowDay: $.datepicker.noWeekends,
                onSelect: function(dateText) {
                    localStorage.setItem('date', dateText)
                    window.location.href = '<?= base_url() ?>Booking/Booking_Choose/' + dateText
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;
                    var formData = {
                        date: document.getElementById("datepicker").value,
                    };
                    $.post("<?= base_url() ?>Booking/get_booking_on_date", {
                            date: document.getElementById("datepicker").value,
                        },
                        function(data, textStatus, jqXHR) {
                            var row = $('#myTable tr').length;
                            // console.log(typeof(data));
                            // console.log(JSON.parse(data));
                            // console.log(row);
                            var booking = JSON.parse(data)['query_booking']; //array booking
                            var menu = JSON.parse(data)['query_master_menu']; //array menu
                            if (booking.length != 0) {
                                document.getElementById("save-btn").innerHTML = "UPDATE";
                                document.getElementById("save-btn").classList.remove('btn-success');
                                document.getElementById("save-btn").classList.add('btn-warning');
                                menu.forEach(element => {
                                    var tmp_id = element.Menu_Code;
                                    var tmp_type = element.M_Group;
                                    document.getElementById(tmp_id + tmp_type).checked = false;
                                });
                            } else {
                                menu.forEach(element => {
                                    var tmp_id = element.Menu_Code;
                                    var tmp_type = element.M_Group;
                                    document.getElementById(tmp_id + tmp_type).checked = false;
                                });
                                document.getElementById("save-btn").innerHTML = "SAVE";
                                document.getElementById("save-btn").classList.remove('btn-warning');
                                document.getElementById("save-btn").classList.add('btn-success');
                            }
                            booking.forEach(element => {
                                var tmp_id = element.Menu_id.split("-")[0];
                                var tmp_type = element.Menu_id.split("-")[1];
                                document.getElementById(tmp_id + tmp_type).checked = true;
                                // console.log(tmp_id + tmp_type)
                            });
                            if (dateText >= today) {
                                document.getElementById('save-btn').style.visibility = 'visible'
                                menu.forEach(element => {
                                    var tmp_id = element.Menu_Code;
                                    var tmp_type = element.M_Group;
                                    document.getElementById(tmp_id + tmp_type).disabled = false;
                                });
                            } else {
                                document.getElementById('save-btn').style.visibility = 'hidden'

                                menu.forEach(element => {
                                    var tmp_id = element.Menu_Code;
                                    var tmp_type = element.M_Group;
                                    document.getElementById(tmp_id + tmp_type).disabled = true;
                                });
                            }
                        });
                }
            });
        });
    </script>
    <script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        <?php if (isset($_SESSION['status_insert'])) {
            if ($_SESSION['status_insert'] == 'fail') {
                echo "Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'ERROR!',
                showConfirmButton: false,
                timer: 1800
              })";
            } else if ($_SESSION['status_insert'] == 'success') {
                echo "Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Add Menu complete!',
                showConfirmButton: false,
                timer: 1800
              })";
            }
        }
        if (isset($_SESSION['status_update'])) {
            if ($_SESSION['status_update'] == 'success') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update mixer complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
        }
        if (isset($_SESSION['status_delete'])) {
            if ($_SESSION['status_delete'] == 'success') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'DELETE mixer complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
        } ?>
    </script>
</body>

</html>