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
                                Manage User
                            </div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus-circle"></i>
                                    Add new member
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <?php echo form_open_multipart('ManageUser/insert'); ?>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add new member</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username" id="mixer_code" aria-describedby="emailHelp" minlength="1"  required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password" id="meat_th" aria-describedby="emailHelp" required>
                                                </div>

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
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Del.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result as $item => $key) { ?>
                                                <tr>
                                                    <td><?= $item+1?></td>
                                                    <td>
                                                   <?php print_r($key->Username); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#upd<?php print_r($key->ID); ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="upd<?php print_r($key->ID); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form action="ManageUser/delete" method="POST" enctype="multipart/form-data" id="file_upload">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Mixer</h5>
                                                                        </div>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input type="text" class="form-control text-center" name="id" id="meat_jpmx" value="<?php print_r($key->ID); ?>" readonly hidden>
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
    <script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
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
                title: 'username is already!',
                showConfirmButton: false,
                timer: 1800
              })";
            } else if ($_SESSION['status_insert'] == 'success') {
                echo "Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Add new user complete!',
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
                    title: 'Update username complete!',
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
                    title: 'DELETE username complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
        } ?>
    </script>

</body>

</html>