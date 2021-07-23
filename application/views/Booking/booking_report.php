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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-striped" id="myTable">
                                            <thead>
                                                <tr style="width:20px">

                                                    <th>MENU</th>
                                                    <th>Price (THB)</th>
                                                    <th>Image</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">

                                                <?php
                                                $total = 0;
                                                foreach ($booking as $item) {
                                                    $total += $item->Price;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php print_r($item->Name_Th) ?>
                                                        </td>
                                                        <td>
                                                            <?php print_r($item->Price) ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url() ?>images\menu\<?php print_r($item->Menu_Pic) ?>" alt="" height="50">
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
                        <div class="row">
                            <div class="col-4 mx-start text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            Total (THB)
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <h5>
                                            <?= $total ?>.00
                                        </h5>
                                    </div>
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
        // document.getElementById("datepicker").value = today;
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 3 เดือน
                minDate: '-3m',
                beforeShowDay: $.datepicker.noWeekends,
                onSelect: function(dateText) {
                    localStorage.setItem('date', dateText)
                    window.location.href = '<?= base_url() ?>Booking/Booking_Report/' + dateText
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;
                }
            });
        });
    </script>
    <script>
        $(function() {
            $("#myTable").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
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
                title: 'Booking complete!',
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