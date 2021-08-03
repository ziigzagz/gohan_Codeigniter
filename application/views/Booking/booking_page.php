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
                                <form action="<?= base_url() ?>Booking/insert_booking_from_user" method="post" enctype="multipart/form-data">
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
                                                $tmp_Menu_Code = explode("-", $item_booking)[0];
                                                $tmp_M_Group = explode("-", $item_booking)[1];
                                                // echo strval($tmp_Menu_Code) . $tmp_M_Group;
                                                if ($item_menu->Menu_Code == $tmp_Menu_Code && $item_menu->M_Group == $tmp_M_Group) { ?>
                                                    <div class="col-3">
                                                        <div class="card m_hover" id="<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                            <div class="card-header">
                                                                <?php print_r($item_menu->Name_Th) ?>
                                                                <br>
                                                                <?php print_r($item_menu->Name_Jp) ?>
                                                                <br>
                                                                <img class="" height="20" src="<?= base_url() ?>images/s<?php print_r($item_menu->Spicy) ?>.png">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="menu[<?php print_r($item_menu->Menu_Code) ?>-<?php print_r($item_menu->M_Group) ?>]" type="checkbox" value="<?php print_r($item_menu->Menu_Code) ?>-<?php print_r($item_menu->M_Group) ?>" id="checkbox<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                                    <input type="text" name="M_Group" id="" value="<?php echo ($item_menu->M_Group) ?>" hidden>
                                                                    <input type="text" name="Menu_Code" id="" value="<?php echo ($item_menu->Menu_Code) ?>" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="card-body-item card-body"><img class="img-fluid" src="<?= base_url() ?>images/menu/<?php print_r($item_menu->Menu_Pic) ?>"></div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <?php print_r($item_menu->Price) ?> THB
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <button class="btn btn-success" onclick="addCart('<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>')" type="button" id="btn<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                                            <i class="fas fa-cart-plus"></i>
                                                                        </button>
                                                                        <!-- btn modal -->
                                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>">
                                                                            <i class="fas fa-search"></i>
                                                                        </button>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal<?php echo ($item_menu->Menu_Code . '-' . $item_menu->M_Group) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Menu info</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row text-center">
                                                                                            <div class="col">
                                                                                                <h6>

                                                                                                    Type
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text" name="" id="" class="form-control text-center col-6 mx-auto" value="<?php
                                                                                                                                                                                        if ($item_menu->M_Group == "A") {
                                                                                                                                                                                            echo "Main Dish";
                                                                                                                                                                                        } else if ($item_menu->M_Group == "B") {
                                                                                                                                                                                            echo "Side Dish";
                                                                                                                                                                                        } else if ($item_menu->M_Group == "C") {
                                                                                                                                                                                            echo "Noodle";
                                                                                                                                                                                        } else if ($item_menu->M_Group == "D") {
                                                                                                                                                                                            echo "Dessert";
                                                                                                                                                                                        } ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Name TH
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text" name="" id="" class="form-control text-center col-6 mx-auto" value="<?php print_r($item_menu->Name_Th) ?>" readonly>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Name JP
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text" name="" id="" class="form-control text-center col-6 mx-auto" value="<?php print_r($item_menu->Name_Jp) ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Detail
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <div class="mb-3">
                                                                                                    <textarea class="form-control col-6 mx-auto" id="exampleFormControlTextarea1" rows="3" readonly><?php print_r($item_menu->Detail_Jp) ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Spicy
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <img src="<?= base_url() ?>images\s<?php print_r($item_menu->Spicy) ?>.png" alt="" height="20">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Mixer
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <?php
                                                                                                $tmp = explode(",", $item_menu->Mixer);
                                                                                                array_pop($tmp);
                                                                                                foreach ($tmp as $item_tmp) { ?>
                                                                                                    <img src="<?= base_url() ?>images\mixer\<?php print_r($item_tmp) ?>.png" alt="">
                                                                                                    <!-- <input type="text" name="" id="" class="form-control text-center col-6 mx-auto" value="<?php print_r($item_tmp) ?>" readonly> -->
                                                                                                <?php  } ?>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row text-center mt-3">
                                                                                            <div class="col">
                                                                                                <h6>
                                                                                                    Price
                                                                                                </h6>
                                                                                            </div>
                                                                                            <br>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text" name="" id="" class="form-control text-center col-6 mx-auto" value="<?php print_r($item_menu->Price) ?>" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col">
                                                                                                <img src="<?= base_url() ?>images\menu\<?php print_r($item_menu->Menu_Pic) ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            }
                                        }
                                        if (sizeof($booking) != 0) { ?>
                                            <div class="row">
                                                <button class="btn btn-success col-3 mx-auto" type="submit">จอง</button>
                                            </div>
                                        <?php
                                        }
                                        ?>

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
        $.post("<?= base_url() ?>Booking/API_Get_Booking/" + localStorage.getItem('date'), {
                date: '2021-07-20'
            },
            function(data, textStatus, jqXHR) {
                console.log(typeof(JSON.parse(data)));
                console.log((JSON.parse(data)));
                JSON.parse(data).forEach(element => {
                    document.getElementById('checkbox' + element.Menu_Code + "-" + element.M_Group).checked = true;
                    document.getElementById("btn" + element.Menu_Code + "-" + element.M_Group).innerHTML = '<i class="fas fa-minus-circle"></i>';
                    document.getElementById("btn" + element.Menu_Code + "-" + element.M_Group).classList.remove('btn-success')
                    document.getElementById("btn" + element.Menu_Code + "-" + element.M_Group).classList.add('btn-danger')
                });
            });
    </script>
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
                minDate: '0d',
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
            if (document.getElementById("checkbox" + id).checked == true) {
                document.getElementById("checkbox" + id).checked = false;
                document.getElementById("btn" + id).innerHTML = '<i class="fas fa-cart-plus"></i>';
                document.getElementById("btn" + id).classList.remove('btn-danger')
                document.getElementById("btn" + id).classList.add('btn-success')

            } else {
                document.getElementById("checkbox" + id).checked = true;
                document.getElementById("btn" + id).innerHTML = '<i class="fas fa-minus-circle"></i>';
                document.getElementById("btn" + id).classList.remove('btn-success')
                document.getElementById("btn" + id).classList.add('btn-danger')

            }
            // document.getElementById("checkbox" + id).click();
        }
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