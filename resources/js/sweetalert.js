import Swal from "sweetalert2";

const logoutBtn = document.getElementById("logoutBtn");
const logoutForm = document.getElementById("logoutForm");
if (logoutBtn) {
    logoutBtn.addEventListener("click", () => {
        Swal.fire({
            title: "Apakah Anda Yakin ingin Logout",
            text: "pastikan seluruh data sudah tersimpan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Logout",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Logged out",
                    text: "logout telah berhasil!",
                    icon: "success",
                });
                // Delay 3 detik sebelum submit
                setTimeout(() => {
                    logoutForm.submit();
                }, 1500);
            }
        });
    });
}
