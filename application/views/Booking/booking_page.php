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
                                <div class="row">
                                    <div class="col">User : <?= $_SESSION['username'] ?></div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="text" id="datepicker" readonly class="form-control" name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" id="row">
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-header">ซุปมะเขือ</div>
                                            <div class="card-body-item card-body"><img class="img-fluid" src="images/menu/ซุปมะเขือ.jpg"></div>
                                            <div class="card-footer text-start"><img class="" height="30" src="images/s1.png">20.00 THB</div>
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
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        document.getElementById("datepicker").value = today;
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 3 เดือน
                minDate: '1d',
                beforeShowDay: $.datepicker.noWeekends,
                onSelect: function(dateText) {
                    document.getElementById('row').innerHTML = "";
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;
                    var formData = {
                        date: document.getElementById("datepicker").value,
                    };
                    $.post("<?= base_url() ?>Booking/get_booking_on_date", {
                            date: document.getElementById("datepicker").value,
                        },
                        function(data, textStatus, jqXHR) {
                            var row = $('#myTable tr').length;
                            var booking = JSON.parse(data)['query_booking']; //array booking
                            var menu = JSON.parse(data)['query_master_menu']; //array menu

                            var tmp_booking =
                                booking.forEach(element_booking => {
                                    console.log(element_booking.Menu_id.split("-"));
                                    var tmp_Menu_Code = element_booking.Menu_id.split("-")[0];
                                    var tmp_M_Group = element_booking.Menu_id.split("-")[1];
                                    menu.forEach(element_menu => {
                                        if (element_menu.Menu_Code.toString() === tmp_Menu_Code && element_menu.M_Group === tmp_M_Group) {
                                            console.log(element_menu);
                                            // images\menu\A.jpg
                                            var col = document.createElement('div');
                                            col.setAttribute('class', 'col-3');
                                            var card = document.createElement('div');
                                            card.setAttribute('class', 'card');
                                            var card_header = document.createElement('div');
                                            card_header.setAttribute('class', 'card-header');
                                            card_header.innerHTML = element_menu.Name_Th;
                                            var card_body = document.createElement('div');
                                            card_body.setAttribute('class', 'card-body-item');
                                            card_body.classList.add('card-body')

                                            var img = document.createElement('img');
                                            img.setAttribute('class', 'img-fluid');
                                            img.setAttribute('src', '<?php base_url() ?>' + "images/menu/" + element_menu.Menu_Pic);
                                            var card_footer = document.createElement('div');
                                            card_footer.setAttribute('class', 'card-footer');

                                            var img_spicy = document.createElement('img');
                                            img_spicy.setAttribute('height', '35');
                                            img_spicy.setAttribute('src', '<?php base_url() ?>' + "images/s" + (element_menu.Spicy).toString() + '.png');

                                            card_footer.appendChild(img_spicy);
                                            card_body.appendChild(img);
                                            card.appendChild(card_header);
                                            card.appendChild(card_body);
                                            card.appendChild(card_footer);
                                            // card_footer.innerHTML = parseFloat(element_menu.Price).toFixed(2) + " THB";
                                            var Price = document.createTextNode(parseFloat(element_menu.Price).toFixed(2) + " THB");
                                            card_footer.appendChild(img_spicy);
                                            card_footer.appendChild(Price);


                                            col.appendChild(card);
                                            document.getElementById('row').appendChild(col);
                                        }
                                        // console.log(element_menu.)
                                    });
                                });
                        });
                }
            });
        });
    </script>
</body>

</html>