<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gohan 2</title>
</head>

<body>
    <div class="container">

        <div class="row ">


            <div class="col-md-6 mx-auto mt-5">
                <div class="card shadow bg-white rounded card-login">
                    <div class="card-header text-center p-5">
                        <!-- <div class="typewriter col-md-3  mx-auto text-dark">
                            <h1>GOHAN V.2</h1>
                        </div> -->
                        <img src="images\Logo\ATC-Full.png" alt="No image" srcset="" height="100" class="img-fluid">
                    </div>
                    <div class="card-body text-center">
                        <form action="Login/checklogin" method="POST">
                            <div class="mb-3">

                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" placeholder="username">
                            </div>
                            <div class="mb-3">

                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                            </div>
                            <button type="submit" class="btn btn-info">Login</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>