//memastikan semua file sudah di load
$(document).ready(function () {
    // eventlistener untuk mengetahui jurusan yang dipilih
    $("#jurusan").on("change", (e) => {
        // mengambil value dari input jurusan yang dipilih
        const selectedValue = e.target.value;
        // melakukan request dengan method get ke /get-prodi-jurusan tanpa merefresh halaman
        $.ajax({
            type: "get",
            url: "/get-prodi-jurusan/" + selectedValue,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    //berisi data prodi bentuk array
                    const data = response.data;
                    $("#prodi").html(`<option value="">Pilih Prodi</option>`);
                    data.forEach((element) => {
                        document.getElementById(
                            "prodi"
                        ).innerHTML += `<option value="${element.id}">${element.nama_prodi}</option>`;
                    });
                }
            },
            error: (error) => {
                $("#prodi").html(`<option value="">Pilih Prodi</option>`);
            },
        });
    });
});
