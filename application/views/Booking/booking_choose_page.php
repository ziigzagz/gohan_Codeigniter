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
                        <div class="card">
                            <div class="card-header">
                                <div class="row mt-3">
                                    <div class="col-1"><label for="exampleFormControlInput1">Date
                                            <label class="text-danger">*</label>
                                        </label></div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="text" id="datepicker" readonly class="form-control" name="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped" id="myTable">
                                            <thead>
                                                <tr style="width:20px">
                                                    <th class="checkbox-1">#</th>
                                                    <th>MENU</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
                                                <?php foreach ($menu as $item) {
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
                                                    </tr>
                                                <?php $tmp = 0;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-success col-3 mx-auto">SAVE</button>
                                </div>
                            </div>
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
        document.getElementById("datepicker").value = today;
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 3 เดือน
                minDate: '-3m',
                onSelect: function(dateText) {
                    var formData = {
                        date: document.getElementById("datepicker").value,
                    };
                    $.post("<?= base_url() ?>Booking/get_booking_on_date", {
                            date: document.getElementById("datepicker").value,
                        },
                        function(data, textStatus, jqXHR) {
                            var row = $('#myTable tr').length;
                            console.log(typeof(data));
                            console.log(JSON.parse(data));
                            console.log(row);

                            //data: Received from server
                            var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
                            var row = table.insertRow(0);
                            var cell0 = row.insertCell(0);
                            var cell1 = row.insertCell(1);


                            cell0.innerHTML = '<td style = "width:20px" >'
                            cell0.innerHTML += '<div class="form-check">'
                            cell0.innerHTML += '<input class="form-check-input" type="checkbox" value="<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>" id="<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" name="menu[<?php print_r($item->Menu_Code) ?>-<?php print_r($item->M_Group) ?>]" <?= in_array(($item->Menu_Code) . '-' . ($item->M_Group), $booking) ? "checked" : null ?>>'
                            cell0.innerHTML += '</div>'
                            cell0.innerHTML += '</td>'
                            cell1.innerHTML = "1";
                        });
                }
            });
        });
    </script>
</body>

</html>