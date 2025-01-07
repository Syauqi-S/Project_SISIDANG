//memastikan semua file sudah di load
$(document).ready(function () {
    //eventlistener untuk mengetahui jurusan yang dipilih
    const idJurusan = document.getElementById("jurusan").value;

    $.ajax({
        type: "get",
        url: "/get-kategori-jurusan/" + idJurusan,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.success) {
                //berisi data kategori bentuk arrray
                const data = response.data;
                $("#kategories").html(
                    `<option value="">Pilih Kategori</option>`
                );
                data.forEach((element) => {
                    document.getElementById(
                        "kategories"
                    ).innerHTML += `<option value="${element.id}">${element.kategori}</option>`;
                });
            }
        },
        //error
        error: (error) => {
            $("#kategories").html(`<option value="">Pilih Kategori</option>`);
        },
    });
});
