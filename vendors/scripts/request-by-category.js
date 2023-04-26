function selectCategory() {
    let idCategory = document.querySelector("#kategori-produk").value;

    $.ajax({
        url: "include/query-id-category.php",
        method: "POST",
        data: {
            id_kategori: idCategory
        },
        success: function(data) {
            $('#conditional-form').html(data);
        }
    })
}

function selectPemesan() {
    let idPemesan = document.querySelector("#id_pemesan").value;
  
    $.ajax({
      url: "include/query-id-pemesan.php",
      method: "POST",
      data: { id_pemesan: idPemesan },
      success: function (data) {
        $("#nomor_batch").html(data);
      },
    });
  }