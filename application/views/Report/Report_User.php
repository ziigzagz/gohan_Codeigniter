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
            <div class="container-fluid">
              
                <div class="row pt-3">
                    <!-- /.col -->
                    <div class="col mx-auto">
                        <div class="card card-primary">
                            <div class="card-body p-2">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col text-center">

                                        <h5 id="Date">
                               
                                        </h5>
                                        <h5 id="Price">

                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped " id="tb">
                                    <thead>
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Spicy
                                            </th>

                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_body">

                                    </tbody>
                                </table>
                            </div>
                            <button class="mb-3 col-3 mx-auto btn btn-info tt" id="summary" onclick="book()">book</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

            </div>
        </div>
    </div>
    <script>
        function book() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            // DATE1 => TODAY
            // DATE2 => DATE ON CLICK
            var date1 = new Date()
            var date2 = new Date(localStorage.getItem('date'))
            if (date1 > date2) {
                console.log(5)
                window.location.href = '<?= base_url() ?>Booking/index/' + today // GO RO TODAY
            } else {
                console.log(6);
                window.location.href = '<?= base_url() ?>Booking/index/' + localStorage.getItem('date')
            }
            // console.log(date1)
            // console.log(date2)
            // var date = 

        }
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
        $(function() {
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            console.log(d, m, y)
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            // console.log(calendarEl);
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridWeek,dayGridMonth'
                },
                locale: 'jp',
                themeSystem: 'bootstrap',

                events: [{
                        daysOfWeek: ['1', '2', '3', '4', '5'],
                        status: '',
                        display: 'background',
                        color: 'white'
                    },
                    <?php
                    foreach ($booking as $item) {
                        $tmp_year = intval(explode('-', $item->Booking_date)[0]);
                        $tmp_month = intval(explode('-', $item->Booking_date)[1]);
                        $tmp_date = intval(explode('-', $item->Booking_date)[2]);
                    ?> {
                            title: '<?= $item->Username ?>',
                            start: new Date(<?= $tmp_year ?>, <?= $tmp_month ?> - 1, <?= $tmp_date ?>),
                            end: new Date(<?= $tmp_year ?>, <?= $tmp_month ?> - 1, <?= $tmp_date ?>),
                            allDay: true,
                            status: '',
                            display: 'background',
                            color: '#43cd80',
                            id: '<?= $item->Booking_date; ?>&<?= $item->Username; ?>'
                        },
                    <?php } ?>
                ],
                dateClick: function(info) {
                    info.jsEvent.preventDefault();
                    var date = info.dateStr
                    var username = '<?= $_SESSION['username'] ?>'
                    var price = 0;

                    console.log(info.dateStr)
                    localStorage.setItem('date', info.dateStr)
                    document.getElementById('Date').innerHTML = "Date : " + date
                    $.post("<?= base_url() ?>Booking/API_Get_Booking_date_and_username/" + username + "/" + date, {
                            date: date,
                            username: username
                        },
                        function(data, textStatus, jqXHR) {
                            document.getElementById("tb_body").innerHTML = "";
                            JSON.parse(data).forEach(element => {
                                console.log(element);
                                var img = element.Menu_Pic;
                                price += element.Price * element.Total;
                                $('#tb tbody').append("<tr><td>" + element.Name_Th + "</td><td><img src='<?= base_url() ?>images/s" + element.Spicy + ".png' height='20' alt='' srcset=''></td><td>" + element.Price + "</td><td><img src='<?= base_url() ?>images/menu/" + element.Menu_Pic + "' height='40' alt='' srcset=''></td><td>" + element.Total + "</td></tr>")
                            });
                            console.log(price);
                         
                        });
                    // if (info.event.url) {}
                }
            });
            calendar.render();

        })
    </script>

</body>

</html>