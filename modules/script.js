function showData(str) {
  if (str == "") {
    document.getElementById("dataTable").innerHTML = "";
    return;
  } else {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dataTable").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "fortidsminder_handler.php?q=" + str, true);
    xmlhttp.send();
  }
}
