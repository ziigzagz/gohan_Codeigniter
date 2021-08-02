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
                <div class="row mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <select class="form-select" aria-label="Default select example" id="year">

                                                <?php foreach ($year as $item) { ?>
                                                    <option value="<?= $item->y ?>"><?= $item->y ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <select class="form-select" aria-label="Default select example" id="month">
                                                <option value="1">January </option>
                                                <option value="2">February </option>
                                                <option value="3">March </option>
                                                <option value="4">April </option>
                                                <option value="5">May </option>
                                                <option value="6">June </option>
                                                <option value="7">July</option>
                                                <option value="8">August </option>
                                                <option value="9">September </option>
                                                <option value="10">October </option>
                                                <option value="11">November </option>
                                                <option value="12">December </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <button class="btn btn-info" onclick="search()">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mx-auto text-center">
                                        <table class="table table-bordered border-primary table-responsive-sm" id="tb_ex">
                                            <thead>
                                                <tr id="head">

                                                </tr>
                                            </thead>
                                            <tbody id="tb_body">
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
    </div>

    <script>
        function search() {
            document.getElementById('head').innerHTML = ""
            var month = document.getElementById('month').value;
            var year = document.getElementById('year').value;
            // console.log(month, year);
            var dt = new Date();;
            var month1 = parseInt(month);
            var year1 = parseInt(year);
            var daysInMonth = new Date(year1, month1, 0).getDate();
            var a = new Date(2021, 7 - 1, 22);
            var day = "";
            // console.log(a, a.getDay(), month1)
            $('#head').append('<th>Name</th>')
            for (var i = 0; i < daysInMonth; ++i) {
                a = new Date(year1, month1 - 1, i + 1);
                day = a.getDay()
                if (day == 0 || day == 6) {
                    $('#head').append('<th class="bg-danger">' + (i + 1) + '</th>')
                } else {
                    $('#head').append('<th>' + (i + 1) + '</th>')
                }
            }
            $('#head').append('<th>Total</th>')
            document.getElementById('tb_body').innerHTML = ""

            $.post("<?= base_url() ?>Booking/API_Get_Monthly/" + month + "/" + year, {
                    month: month,
                    year: year
                },
                function(data, textStatus, jqXHR) {
                    console.log(JSON.parse(data))
                    JSON.parse(data)[0].forEach(element_user => {
                        var t = []
                        var tmp_row = "<tr>"
                        tmp_row += '<td>' + element_user.username + '</td>'
                        for (var i = 0; i < daysInMonth; ++i) {
                            a = new Date(year1, month1 - 1, i + 1);
                            day = a.getDay()
                            if (day == 0 || day == 6) {
                                tmp_row += '<td class="bg-danger" id=' + element_user.username + '*' + (i + 1) + '></td>'
                            } else {
                                tmp_row += '<td id=' + element_user.username + '*' + (i + 1) + '>' + '</td>'
                            }
                        }
                        tmp_row += '<td class="bg-light" id="total' + element_user.username + '"></td>'
                        tmp_row += '</tr>'
                        $('#tb_body').append(tmp_row)
                    })


                    tmp_row = "<tr class='bg-light'>"
                    tmp_row += '<td>Sum</td>'
                    for (var i = 0; i < daysInMonth; ++i) {
                        a = new Date(year1, month1 - 1, i + 1);
                        day = a.getDay()
                        if (day == 0 || day == 6) {
                            tmp_row += '<td class="bg-danger" id="sum' + (i + 1) + '"></td>'
                        } else {
                            tmp_row += '<td id="sum' + (i + 1) + '"></td>'
                        }

                    }
                    tmp_row += '<td id="sum_total"></td>'
                    tmp_row += '</tr>'
                    $('#tb_body').append(tmp_row)
                    console.log(JSON.parse(data)[2])
                    JSON.parse(data)[2].forEach(element_sum => {
                        console.log(element_sum)
                        var tmp_sum1 = parseInt(element_sum.Booking_date.split('-')[2])
                        console.log(tmp_sum1, 99)
                        document.getElementById("sum" + tmp_sum1).innerHTML = element_sum.tmp_s
                    })

                    // check size arr != 0
                    if (JSON.parse(data)[1].length != 0) {
                        var tmp_first_user = JSON.parse(data)[1][0].Username;
                        console.log(JSON.parse(data)[1]);
                        var tmp_sum = 0;
                        var sum_total = 0;
                        console.log(JSON.parse(data)[1])
                        JSON.parse(data)[1].forEach(element_book => {
                            document.getElementById(element_book.Username + '*' + element_book.d).innerHTML = element_book.total_sum
                            if (element_book.Username == tmp_first_user) {
                                tmp_sum += element_book.total_sum
                            } else {
                                document.getElementById("total" + tmp_first_user).innerHTML = tmp_sum
                                tmp_sum = 0;
                                tmp_first_user = element_book.Username
                                tmp_sum += element_book.total_sum;
                            }
                            sum_total += element_book.total_sum;
                        })
                        document.getElementById("total" + tmp_first_user).innerHTML = tmp_sum
                        document.getElementById("sum_total").innerHTML = sum_total
                    }

                });
        }
    </script>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                // ย้อนหลัง 0 วัน
                minDate: '0d',
                beforeShowDay: $.datepicker.noWeekends,
                onSelect: function(dateText) {
                    console.log(dateText);
                    localStorage.setItem('date', dateText)
                    window.location.href = '<?= base_url() ?>Report/Monthlyreport/' + dateText
                }
            });
        });
        document.getElementById('month').value = parseInt(mm);
    </script>
    <script>

    </script>

</body>

</html>