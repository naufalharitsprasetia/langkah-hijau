/** @format */

function confirmLogout() {
    Swal.fire({
        title: "Apakah kamu ingin Logout?",
        text: "pastikan semua progress tersimpan !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Logout!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Logout Succes !",
                text: "Anda telah berhasil logout !",
                icon: "success",
            });
            document.getElementById("logout-form").submit();
        }
    });
}

function deleteConfirm(idForm) {
    Swal.fire({
        title: "Apakah kamu yakin ingin menghapus ini?",
        text: "semua data/progress di dalamnya dan data yang bersangkutan dengan data ini akan terhapus, data yang anda hapus tidak dapat kembali !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Penghapusan Berhasil!",
                text: "Anda telah berhasil menghapus data ini !",
                icon: "success",
            }).then(() => {
                document.getElementById(`formDelete-${idForm}`).submit();
            });
        }
    });
}
