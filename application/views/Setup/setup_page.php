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
        <div class="content-wrapper" style="min-height: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col  mt-3">
                        <div class="card">
                            <div class="card-header bg-info text-center">
                                MENU
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-plus-circle"></i>
                                            Add new menu
                                        </button>

                                        <!-- Modal -->
                                        <?php echo form_open_multipart('Setup/insert'); ?>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput" class="form-label">Type</label>
                                                                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                                                                        <option value="maincourse" selected>Main courses</option>
                                                                        <option value="sidedish">Side dish</option>
                                                                        <option value="noodle">Noodle </option>
                                                                        <option value="dessert">Dessert</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput" class="form-label">Menu (Thai)</label>
                                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ข้าวไก่กรอบ" name="name_th" value="th" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput2" class="form-label">Menu (Japan)</label>
                                                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ガイトートライス" name="name_jp" value="jp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail">dt</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputPassword1" class="form-label">Spicy Level</label>
                                                                    <select class="form-select" aria-label="Default select example" name="spicy">
                                                                        <option value="0">0</option>
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2 </option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 ms-1 ">
                                                                    <?php
                                                                    foreach ($mixer as $item) { ?>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="mixer[<?php print_r($item->Mixer_Code) ?>]" id="<?php print_r($item->Mixer_Code) ?>">
                                                                            <label class="form-check-label" for="<?php print_r($item->Mixer_Code) ?>">
                                                                                <?php print_r($item->Name) ?> (<?php print_r($item->Name_JP) ?>)
                                                                            </label>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput2" class="form-label">ราคา (THB)</label>
                                                                    <input type="number" min="0" class="form-control text-end" max="100" id="price" placeholder="" name="price" value="20" required>
                                                                </div>
                                                                <div class="input-group">
                                                                    <input type="file" name="userfile" class="form-control" size="20000000" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-success">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="maincourse">Main courses</option>
                                            <option value="sidedish">Side dish</option>
                                            <option value="noodle">Noodle</option>
                                            <option value="dessert">Dessert</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php
                                    foreach ($menu as $item) { ?>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <?php print_r($item->Name_Th); ?> <br>(<?php print_r($item->Name_Jp); ?>)
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <img src="images\menu\<?php print_r($item->Menu_Pic); ?>" class="img-fluid mx-auto" alt="" srcset=>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-6"> <?php print_r($item->Price); ?> THB</div>
                                                        <div class="col-6 text-end">

                                                            <!-- UPDATE BTN-->
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updt<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>">
                                                                <i class="fas fa-wrench"></i>
                                                            </button>
                                                            <!-- UPDATE Modal -->
                                                            <div class="modal fade" id="updt<?php print_r($item->Menu_Code) ?><?php print_r($item->M_Group) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <form action="./setup/update" method="POST" enctype="multipart/form-data">
                                                              
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <input type="text" value="<?php print_r($item->Menu_Code); ?>" name="Menu_Code" hidden>
                                                                                <input type="text" value="<?php print_r($item->M_Group); ?>" name="M_Group" hidden>
                                                                                <h5 class="modal-title" id="exampleModalLabel">Update Menu</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="mb-3">
                                                                                            <label for="formGroupExampleInput" class="form-label">Type</label>
                                                                                            <select class="form-select" aria-label="Default select example" name="type" id="type<?php print_r($item->Menu_Code); ?><?php print_r($item->M_Group); ?>">
                                                                                                <option value="maincourse" <?php echo $item->M_Group == "A" ? 'selected' : null ?>>Main courses</option>
                                                                                                <option value="sidedish" <?php echo $item->M_Group == "B" ? 'selected' : null ?>>Side dish</option>
                                                                                                <option value="noodle" <?php echo $item->M_Group == "C" ? 'selected' : null ?>>Noodle </option>
                                                                                                <option value="dessert" <?php echo $item->M_Group == "D" ? 'selected' : null ?>>Dessert</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="formGroupExampleInput" class="form-label">Menu (Thai)</label>
                                                                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ข้าวไก่กรอบ" name="name_th" value="<?php print_r($item->Name_Th); ?>" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="formGroupExampleInput2" class="form-label">Menu (Japan)</label>
                                                                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ガイトートライス" name="name_jp" value="<?php print_r($item->Name_Jp); ?>" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"><?php print_r($item->Detail_Jp); ?></textarea>
                                                                                        </div>
                                                                                        <div class="mb-3 text-start">
                                                                                            <label for="exampleInputPassword1" class="form-label">Spicy Level</label>
                                                                                            <select class="form-select" aria-label="Default select example" name="spicy">
                                                                                                <option value="0" <?php echo $item->Spicy == 0 ? 'selected' : null ?>>0</option>
                                                                                                <option value="1" <?php echo $item->Spicy == 1 ? 'selected' : null ?>>1</option>
                                                                                                <option value="2" <?php echo $item->Spicy == 2 ? 'selected' : null ?>>2 </option>
                                                                                                <option value="3" <?php echo $item->Spicy == 3 ? 'selected' : null ?>>3</option>
                                                                                                <option value="4" <?php echo $item->Spicy == 4 ? 'selected' : null ?>>4</option>
                                                                                                <option value="5" <?php echo $item->Spicy == 5 ? 'selected' : null ?>>5</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-3 ms-1 ">
                                                                                            <?php
                                                                                            // $arr_mixer_menu = explode(",", $item);
                                                                                            foreach ($mixer as $item_mixer) { ?>
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" type="checkbox" name="mixer[<?php print_r($item_mixer->Mixer_Code) ?>]" id="<?php print_r($item_mixer->Mixer_Code) ?> <?php ?>"
                                                                                                    <?php 
                                                                                                    // strpos($mystring, $findme);
                                                                                                    // $item_mixer->Mixer_Code
                                                                                                    if(strpos($item->Mixer.',', $item_mixer->Mixer_Code)){
                                                                                                        echo $item_mixer->Mixer_Code;
                                                                                                    }
                                                                                                    ?>
                                                                                                    >
                                                                                                    <label class="form-check-label" for="<?php print_r($item_mixer->Mixer_Code) ?>">
                                                                                                        <?php print_r($item_mixer->Name) ?> (<?php print_r($item_mixer->Name_JP) ?>)
                                                                                                    </label>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="formGroupExampleInput2" class="form-label">ราคา (THB)</label>
                                                                                            <input type="number" min="0" class="form-control text-end" max="100" id="price" placeholder="" name="price" value="<?php echo $item->Price?>" required>
                                                                                        </div>
                                                                                        <div class="input-group">
                                                                                            <input type="file" name="userfile" class="form-control" size="20000000"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-warning">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- DELETE BTN-->
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?php print_r($item->Menu_Code) ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <!-- DELETE Modal -->
                                                            <div class="modal fade" id="del<?php print_r($item->Menu_Code) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <form action="./setup/delete" method="POST">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <input type="text" value="<?php print_r($item->Menu_Code); ?>" name="Menu_Code" hidden>
                                                                                <input type="text" value="<?php print_r($item->M_Group); ?>" name="M_Group" hidden>
                                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                You won't be able to revert this!
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- <form action="MenuSet/insert" method="post">
                                    <button class="btn btn-info">insert</button>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getMenu() {
            $.ajax({
                type: "POST",
                url: 'script.php',
                data: {
                    name: 'John'
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }
    </script>
    <script>
        // ==========================
        //     CHECK STATUS INSERT
        // ==========================
        <?php if (isset($_SESSION['status_insert'])) {
            if ($_SESSION['status_insert'] == 'fail') {
                echo "Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Menu code is already!',
                showConfirmButton: false,
                timer: 1800
              })";
            } else if ($_SESSION['status_insert'] == 'success') {
                echo "Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Add new menu complete!',
                showConfirmButton: false,
                timer: 1800
              })";
            }
        }
        // ==========================
        //     CHECK STATUS UPDATE
        // ==========================
        if (isset($_SESSION['status_update'])) {
            if ($_SESSION['status_update'] == 'success') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update menu complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
            if ($_SESSION['status_update'] == 'fail') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update menu complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
        }

        // ==========================
        //     CHECK STATUS DELETE
        // ==========================
        if (isset($_SESSION['status_delete'])) {
            if ($_SESSION['status_delete'] == 'success') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'DELETE menu complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
            if ($_SESSION['status_delete'] == 'fail') {
                echo "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'DELETE menu complete!',
                    showConfirmButton: false,
                    timer: 1800
                  })";
            }
        } ?>
    </script>
</body>

</html>