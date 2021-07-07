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
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="index3.html" class="brand-link">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Iffan H. (640048)</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="booking" class="nav-link active">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>Booking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="setup" class="nav-link">
                                        <i class="fas fa-cogs"></i>
                                        <p>Setup</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="menuset" class="nav-link">
                                        <i class="fas fa-tasks"></i>
                                        <p>Menu Set</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="fas fa-edit"></i>
                                        <p>Master Mixer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="login" class="nav-link">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <p>Log In</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link text-danger">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <p>Log out</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
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
                                                                    <label for="formGroupExampleInput" class="form-label">Menu (Thai)</label>
                                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ข้าวไก่กรอบ">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput2" class="form-label">ชื่ออาหาร (ภาษาญี่ปุ่น)</label>
                                                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ガイトートライス">
                                                                </div>
                                                                <div class="mb-3 ms-1">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="chicken">
                                                                        <label class="form-check-label" for="chicken">
                                                                            ไก่
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="pig">
                                                                        <label class="form-check-label" for="pig">
                                                                            หมู
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="beef">
                                                                        <label class="form-check-label" for="beef">
                                                                            เนื้อ
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="shrimp">
                                                                        <label class="form-check-label" for="beef">
                                                                            กุ้ง
                                                                        </label>
                                                                    </div>
                                                                    <div class="">
                                                                        <label for="formGroupExampleInput2" class="form-label">ราคา (THB)</label>
                                                                        <input type="number" min="0" class="form-control" id="formGroupExampleInput2" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/png, image/jpeg">
                                                                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="2">Wednesday</option>
                                            <option value="2">Thursday</option>
                                            <option value="2">Friday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="card p-3 bg-success">
                                        <label class="mx-auto">ก๋วยเตี๋ยว 麺料理 </label>
                                    </div>
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
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function test() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: 'login/checklogin',
                        // data: {
                        //     name: 'John'
                        // },
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(9);
                        }

                    });
                }
            })
        }
    </script>
</body>

</html>