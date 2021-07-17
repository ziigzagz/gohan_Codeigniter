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
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-info">Choose Menu</button>
                    </div>
                    
                        <div class="col-10">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    
                </div>


            </div>
        </div>
    </div>
    <script>
        $(function() {

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                events: [
                    <?php
                    for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, 8, 2021); ++$i) {
                        echo "{
                            title: 'Booking',
                            start: new Date(y, m, " . ($i) . "),
                            backgroundColor: '#f56954', //red
                            borderColor: '#f56954', //red
                            allDay: true,
                 
                        },";
                    }
                    ?>
                ],
            
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate
                    console.log(info.event.startStr);
                }
            });
            calendar.render();
        })
    </script>
</body>

</html>