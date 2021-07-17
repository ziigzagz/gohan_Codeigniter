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
                <div class="row">
                    <div class="col">
                        <div class="card mt-3">
                            <div class="card-header">
                                Master Mixer
                            </div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus-circle"></i>
                                    Add new mixer
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <?php echo form_open_multipart('MasterMixer/AddMixer'); ?>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add new mixer</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Mixer_code (Ex. BEEF)</label>
                                                    <input type="text" class="form-control" name="mixer_code" id="mixer_code" aria-describedby="emailHelp" oninput="this.value = this.value.toUpperCase()" maxlength="4" minlength="4" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Meat/Vegetable (Thai)</label>
                                                    <input type="text" class="form-control" name="meat_th" id="meat_th" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Meat/Vegetable (Japan)</label>
                                                    <input type="text" class="form-control" name="meat_jp" id="meat_jp" required>
                                                </div>
                                                <input type="file" name="userfile" class="form-control" size="20000000" required />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Save</button>
                                                <?php echo $error; ?>
                                                <br /><br />
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="mb-3 ms-1">
                                    <table class="table table-striped text-center" id="example1">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Image</th>
                                                <th>วัตถุดิบ (Thai)</th>
                                                <th>วัตถุดิบ (Japan)</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result as $item) { ?>
                                                <tr>
                                                    <td><img src="images\mixer\<?= $item->Pic ?>" alt="" height="25px"></td>
                                                    <td>
                                                        <?php print_r($item->Name); ?>
                                                    </td>
                                                    <td><?php print_r($item->Name_JP); ?></td>
                                                    <td class="text-center">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#del<?= $item->Mixer_Code ?>">
                                                            <i class="fas fa-wrench"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="del<?= $item->Mixer_Code ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form action="MasterMixer/update_mixer" method="POST" enctype="multipart/form-data" id="file_upload<?= $item->Mixer_Code ?>">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Mixer</h5>
                                                                        </div>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <img src="images/mixer/<?= $item->Pic ?>" alt="" class="border  m-3" height="150px">
                                                                                    <input type="text" class="form-control text-center" name="mixer_code" id="meat_jpmx<?= $item->Mixer_Code ?>" value="<?= $item->Mixer_Code ?>" readonly hidden>
                                                                                    <div class="mb-3">
                                                                                        <label for="exampleInputPassword1" class="form-label">Meat/Vegetable (Thai)</label>
                                                                                        <input type="text" class="form-control text-center" name="meat_th<?= $item->Mixer_Code ?>" id="meat_th<?= $item->Mixer_Code ?>" value="<?= $item->Name ?>">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="exampleInputPassword1" class="form-label">Meat/Vegetable (Japan)</label>
                                                                                        <input type="text" class="form-control text-center" name="meat_jp<?= $item->Mixer_Code ?>" id="meat_jp<?= $item->Mixer_Code ?>" value="<?= $item->Name_JP ?>">
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-success">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#upd<?= $item->Mixer_Code ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="upd<?= $item->Mixer_Code ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form action="MasterMixer/delete_mixer" method="POST" enctype="multipart/form-data" id="file_upload<?= $item->Mixer_Code ?>">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Mixer</h5>
                                                                        </div>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control text-center" name="mixer_code" id="meat_jpmx<?= $item->Mixer_Code ?>" value="<?= $item->Mixer_Code ?>" readonly hidden>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#example1").DataTable({
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
                title: 'Mixer code is already!',
                showConfirmButton: false,
                timer: 1800
              })";
            } else if ($_SESSION['status_insert'] == 'success') {
                echo "Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Add new mixer complete!',
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