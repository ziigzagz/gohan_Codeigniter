<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gohan 2</title>

</head>

<body>
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
                                        <form action="MasterMixer/AddMixer" method="POST" enctype="multipart/form-data" id="file_upload">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new mixer</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Mixer_code</label>
                                                        <input type="text" class="form-control" name="mixer_code" id="mixer_code" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Meat/Vegetable (Thai)</label>
                                                        <input type="text" class="form-control" name="meat_th" id="meat_th" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Meet/Vegetable (Japan)</label>
                                                        <input type="text" class="form-control" name="meat_jp" id="meat_jp">
                                                    </div>
                                                    <input type="file" class="text-center form-control mt-2" name='img' id="img" accept="image/png,image/jpg,image/jpeg" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
                                                    <td><img src="images\assets\<?= $item->Pic ?>" alt="" height="25px"></td>
                                                    <td>
                                                        <?php print_r($item->Name); ?>
                                                    </td>
                                                    <td><?php print_r($item->Name_JP); ?></td>
                                                    <td class="text-center">

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?= $item->Mixer_Code ?>">
                                                            <i class="fas fa-trash-alt"></i>
                                                            Delete
                                                        </button>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="del<?= $item->Mixer_Code ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form action="MasterMixer/DeleteMixer" method="POST" enctype="multipart/form-data" id="file_upload<?= $item->Mixer_Code ?>">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Mixer</h5>

                                                                        </div>
                                                                        <?= $item->Name ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
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
    

</body>

</html>