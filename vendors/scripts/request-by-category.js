function selectCategory() {
  let idCategory = document.querySelector("#kategori-produk").value;

  $.ajax({
    url: "include/query-id-category.php",
    method: "POST",
    data: {
      id_kategori: idCategory,
    },
    success: function (data) {
      $("#conditional-form").html(data);
    },
  });
}

function selectPemesan() {
  let idPemesan = document.querySelector("#id_pemesan").value || 0;
  let idCategory = document.querySelector("#kategori-produk").value || 0;

  console.log('id pemesan :', idPemesan);
  console.log('id Category :', idCategory);

  $.ajax({
    url: "include/query-id-pemesan.php",
    method: "POST",
    data: {
      id_pemesan: idPemesan,
      id_kategori: idCategory,
    },
    success: function (data) {
      $("#nomor_batch").html(data);
    },
  });
}

function validateForm() {
  var lcdSelect = document.forms["myForm"]["LCD"].value;
  var pcbSelect = document.forms["myForm"]["PCB"].value;
  if (lcdSelect == 0) {
    alert("Please select an LCD");
    return false;
  } else if (pcbSelect == 0) {
    alert("Please select an PCB");
    return false;
  } else {
    return true;
  }
}
