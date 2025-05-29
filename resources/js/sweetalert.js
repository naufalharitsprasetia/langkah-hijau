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

// Delete Confirmation
const deleteButtons = document.querySelectorAll(".deleteButton");

if (deleteButtons.length > 0) {
    deleteButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const idForm = button.getAttribute("data-form-id");

            Swal.fire({
                title: "Apakah kamu yakin ingin menghapus ini?",
                text: "Semua data/progress di dalamnya akan terhapus dan tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Penghapusan Berhasil!",
                        text: "Anda telah berhasil menghapus data ini!",
                        icon: "success",
                    }).then(() => {
                        document
                            .getElementById(`formDelete-${idForm}`)
                            .submit();
                    });
                }
            });
        });
    });
}
