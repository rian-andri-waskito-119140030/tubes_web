// Get the modal
let modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function validateForm(){
  let laporan = document.forms["form"]["laporan"].value;
  let aspek = document.forms["form"]["aspek"].value;
  let lampiran = document.forms["form"]["lampiran"].value;
  if (laporan=="" || aspek=="" || lampiran=="" ){
    alert("Tidak boleh ada data yang kosong!!!");
  }
  else if(laporan.split(" ").length<20){
    alert("Laporan tidak boleh kurang dari 20 kata");
  }
  else{
    document.getElementById("form").submit();
  }
  
}


async function postData(url = '', data ={}){
  const response = await fetch(url, {
    method : 'POST',
    body : data
  });
}