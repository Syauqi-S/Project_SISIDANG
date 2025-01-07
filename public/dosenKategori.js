$(document).ready(function () {
    const kategoriDropdown = $("#kategories");
    const pembimbing1Dropdown = $("#pembimbing1");
    const pembimbing2Dropdown = $("#pembimbing2");

    // Fungsi untuk mengisi dropdown pembimbing
    function loadPembimbing(selectedValue) {
        if (!selectedValue) {
            // Kosongkan dropdown jika tidak ada kategori yang dipilih
            pembimbing1Dropdown.html(
                '<option value="">Pilih Pembimbing1</option>'
            );
            pembimbing2Dropdown.html(
                '<option value="">Pilih Pembimbing2</option>'
            );
            return;
        }

        // AJAX Request
        $.ajax({
            type: "GET",
            url: "/get-dosen-kategori/" + selectedValue,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    const data = response.data;

                    // Kosongkan dropdown sebelum mengisi ulang
                    pembimbing1Dropdown.empty();
                    pembimbing2Dropdown.empty();

                    // Tambahkan opsi default
                    pembimbing1Dropdown.append(
                        '<option value="">Pilih Pembimbing1</option>'
                    );
                    pembimbing2Dropdown.append(
                        '<option value="">Pilih Pembimbing2</option>'
                    );

                    // Isi dropdown dengan data dosen
                    data.forEach((dosen) => {
                        const option = `<option value="${dosen.id}">${dosen.nama}</option>`;
                        pembimbing1Dropdown.append(option);
                        pembimbing2Dropdown.append(option);
                    });

                    // Sinkronkan dropdown setelah data dimuat
                    syncDropdowns();
                } else {
                    alert("Tidak ada data pembimbing untuk kategori ini.");
                }
            },
            error: function (error) {
                console.error("AJAX Error:", error);
                pembimbing1Dropdown.html(
                    '<option value="">Pilih Pembimbing1</option>'
                );
                pembimbing2Dropdown.html(
                    '<option value="">Pilih Pembimbing2</option>'
                );
            },
        });
    }

    // Fungsi untuk menyinkronkan dropdown
    function syncDropdowns() {
        const pembimbing1Value = pembimbing1Dropdown.val();
        const pembimbing2Value = pembimbing2Dropdown.val();

        // Filter opsi pada dropdown Pembimbing 2
        pembimbing2Dropdown.find("option").each(function () {
            const option = $(this);
            if (option.val() === pembimbing1Value && pembimbing1Value !== "") {
                option.hide(); // Sembunyikan opsi yang dipilih di Pembimbing 1
            } else {
                option.show();
            }
        });

        // Filter opsi pada dropdown Pembimbing 1
        pembimbing1Dropdown.find("option").each(function () {
            const option = $(this);
            if (option.val() === pembimbing2Value && pembimbing2Value !== "") {
                option.hide(); // Sembunyikan opsi yang dipilih di Pembimbing 2
            } else {
                option.show();
            }
        });
    }

    // Panggil AJAX saat kategori diubah
    kategoriDropdown.on("change", function (e) {
        const selectedValue = e.target.value;
        loadPembimbing(selectedValue);
    });

    // Panggil AJAX saat halaman pertama kali dimuat jika kategori sudah dipilih
    const selectedKategori = kategoriDropdown.val(); // Ambil nilai kategori yang sudah diset
    if (selectedKategori) {
        loadPembimbing(selectedKategori);
    }

    // Event listener untuk sinkronisasi dropdown
    pembimbing1Dropdown.on("change", function () {
        syncDropdowns();
    });

    pembimbing2Dropdown.on("change", function () {
        syncDropdowns();
    });
});
