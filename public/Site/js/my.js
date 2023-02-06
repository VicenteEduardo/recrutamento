

function getprovince(valor) {
    if (valor === "P11") {
      document.getElementById("cen").style.display = "block";
      document.getElementById("cen").disabled = false;
    } else {
        document.getElementById("cen").disabled = true;
      document.getElementById("cen").style.display = "none";
    }
  }