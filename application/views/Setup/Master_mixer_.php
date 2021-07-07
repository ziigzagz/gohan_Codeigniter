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

                                <div class="mb-3 ms-1">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name (THAI)</th>
                                                <th>Name (Japan)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="images\assets\BEEF.png" alt="" height="25px"></td>
                                                <td>
                                                    เนื้อ
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="beef">


                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="chicken">
                                        <img src="images\assets\CHIC.png" alt="" height="25px">
                                        <label class="form-check-label" for="chicken">
                                            ไก่
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="eggs">
                                        <img src="images\assets\EGGS.png" alt="" height="25px">
                                        <label class="form-check-label" for="eggs">
                                            ไข่
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pork">
                                        <img src="images\assets\PORK.png" alt="" height="25px">
                                        <label class="form-check-label" for="pork">
                                            หมู
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="shrm">
                                        <img src="images\assets\SHIM.png" alt="" height="25px">
                                        <label class="form-check-label" for="shrm">
                                            กุ้ง
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="fish">
                                        <img src="images\assets\FISH.png" alt="" height="25px">
                                        <label class="form-check-label" for="fish">
                                            ปลา
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pumk">
                                        <img src="images\assets\PUMK.png" alt="" height="25px">
                                        <label class="form-check-label" for="pumk">
                                            ฟักทอง
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="shel">
                                        <img src="images\assets\SHEL.png" alt="" height="25px">
                                        <label class="form-check-label" for="shel">
                                            หอยแมลงภู่
                                        </label>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add new mixer
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>