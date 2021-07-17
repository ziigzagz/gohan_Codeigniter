function gotobooking() {
    window.location.href = "booking.php"
}

function goToAddUser() {
    window.location.href = "AddUser.php"
}

function check_input() {
    var user = document.getElementById("user").value;
    var pw = document.getElementById("pw").value;
    var Sect = document.getElementById("Sect").value;
    var permission = document.getElementById("permission").value;
    if (user.length == 0 || pw.length == 0 || Sect.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'ไม่สามารถเพิ่ม User ได้',
            text: 'โปรดกรอกข้อมูลให้ครบถ้วน',
        })
    } else {
        Swal.fire({
            title: 'ยืนยันการเพิ่ม?',
            showCancelButton: true,
            confirmButtonText: `ยืนยัน`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("frm_adduser").submit();
            }
        })
    }

}

function insert_feedback_fail() {
    Swal.fire({
        icon: 'error',
        title: 'ไม่สามารถเพิ่ม User ได้',
        text: 'username อาจซ้ำโปรดตรวจสอบอีกครั้ง',
    }).then(() => {
        window.location.href = "AddUser.php"
    })
}

function insert_feedback_success() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เพิ่ม User สำเร็จ',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = "ManageUser.php"
    })
}

function login_success() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'ลงชื่อเข้าใช้สำเร็จ',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = "index.php"
    })
}

function login_fail() {
    Swal.fire({
        icon: 'error',
        title: 'ไม่สามารถสามารถลงชื่อเข้าใช้งานได้',
        text: 'โปรดตรวจสอบ username และ password อีกครั้ง',
    }).then(() => {
        window.location.href = "login.php"
    })
}

function update(id) {
    var path = "database/Delete_meeting.php?id=" + id;
    var tmp_list = []
    console.log(path)
    $.get(path, function(data, status) {
        if (status == 'success') {

            Swal.fire({
                title: 'ยืนยันการลบ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `ยืนยัน`,
                cancelButtonText: `ยกเลิก`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลบสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "booking_schedule.php"
                    })
                }
            })

        }

    }).then(() => {


    });
    console.log(id);
}