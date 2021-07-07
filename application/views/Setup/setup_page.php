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
        <?php include_once(APPPATH.'views/Nav/Navbar.php');?>
        <div class="content-wrapper">
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
                                        <button class="btn btn-info">
                                            <i class="fas fa-plus-circle"></i>
                                            Add new menu
                                        </button>
                                    </div>
                                    
                                    <div class="col-1">
                                        <select class="form-select" aria-label="Default select example" id="level">
                                            <option value="1"><img src="images\chilli.png" alt="" height="10"></option>
                                            <option value="2">25 THB</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="1">20 THB</option>
                                            <option value="2">25 THB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php for ($i = 0; $i < 10; ++$i) { ?>
                                        <div class="col-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    header 1
                                                </div>
                                                <div class="card-body">
                                                    999
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-6">25 THB</div>
                                                        <div class="col-6 text-end">
                                                            <button class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>

                                                            </button>
                                                            <button class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt distinctio tempora commodi corrupti nulla pariatur, hic necessitatibus beatae dicta veniam consequatur ratione nam qui eligendi soluta eos accusantium sapiente!
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>