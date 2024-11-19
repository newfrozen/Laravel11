$(document).ready(function () {
    // Inisialisasi DataTable dengan opsi bahasa
    window.tablePangkat = $('#tablePangkat').DataTable({
        language: {
            emptyTable: "No data available in table",
            info: "Showing START to END of TOTAL entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            lengthMenu: "Show MENU entries",
            search: "Search:",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

// Fungsi untuk menghapus data dengan konfirmasi SweetAlert
const deleteData = (e) => {
    let uuid = e.getAttribute('data-uuid'); // Mendapatkan data-uuid

    if (!uuid) {
        Swal.fire({
            title: "Error!",
            text: "Invalid UUID!",
            icon: "error"
        });
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to delete this item?",
        icon: "question",
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) { // Jika pengguna mengonfirmasi penghapusan
            startLoading(); // Menampilkan loading indikator (pastikan fungsi ini sudah diimplementasi)

            $.ajax({
                type: "DELETE",
                url: `/pangkat/destroy/${uuid}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    stopLoading(); // Menghentikan loading indikator
                    toastSuccess(response.message); // Menampilkan notifikasi sukses

                    // Hapus baris dari DataTable
                    removeRowFromTable(uuid);
                    var table = $('#tablePangkat').DataTable();
                    table.rows().every(function () {
                        var row = this.node();
                        if ($(row).data('uuid') === uuid) {
                            table.row(row).remove();  // Hapus baris dari tabel
                        }
                    });
                    table.draw(); // Redraw tabel untuk memperbarui tampilan
                },
                error: function (xhr, status, error) {
                    stopLoading(); // Menghentikan loading indikator jika ada error
                    console.error("Error:", error); // Menampilkan pesan error di konsol
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete the data. Please try again.",
                        icon: "error",
                        confirmButtonColor: "#3085d6"
                    });
                }
            });
        }
    });
}

// Fungsi untuk menghapus baris dari DataTable
const removeRowFromTable = (uuid) => {
    var table = $('#tablePangkat').DataTable();
    table.rows().every(function () {
        var row = this.node();
        if ($(row).data('uuid') === uuid) {
            table.row(row).remove();  // Hapus baris dari tabel
        }
    });
    table.draw();  // Redraw DataTable untuk memperbarui tampilan
}
