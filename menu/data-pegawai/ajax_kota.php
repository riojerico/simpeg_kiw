<script type="text/javascript">
    var ajaxku;


//edit
function ajaxkota3<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?q="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChanged3<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkota4<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?q="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChanged4<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkec<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?kec="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChangedKec<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkec2_<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?kec="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChangedKec2_<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkel<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?kel="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChangedKel<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function ajaxkel2_<?php echo $data['id']; ?>(id){
    ajaxku = buatajax();
    var url="ajax/select_kota.php";
    url=url+"?kel="+id;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChangedKel2_<?php echo $data['id']; ?>;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function buatajax(){
    if (window.XMLHttpRequest){
    return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}

//edit

function stateChanged3<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("ttl_kota3<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("ttl_kota3<?php echo $data['id']; ?>").value = "<option selected>Pilih Kota/Kab</option>";
    }
    }
}

function stateChanged4<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("ttl_kota4<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("ttl_kota4<?php echo $data['id']; ?>").value = "<option selected>Pilih Kota/Kab</option>";
    }
    }
}

function stateChangedKec<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kec<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("kec<?php echo $data['id']; ?>").value = "<option selected>Pilih Kecamatan</option>";
    }
    }
}

function stateChangedKec2_<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kec4<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("kec4<?php echo $data['id']; ?>").value = "<option selected>Pilih Kecamatan</option>";
    }
    }
}

function stateChangedKel<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kel<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("kel<?php echo $data['id']; ?>").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    }
}

function stateChangedKel2_<?php echo $data['id']; ?>(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kel4<?php echo $data['id']; ?>").innerHTML = data
    }else{
    document.getElementById("kel4<?php echo $data['id']; ?>").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    }
}

</script>

<script type="text/javascript">
function nextKota<?php echo $data['id']; ?>() {
         document.getElementById('ttl_kota3<?php echo $data['id']; ?>').disabled = false;
 }
function nextKota2_<?php echo $data['id']; ?>(){
         document.getElementById('ttl_kota4<?php echo $data['id']; ?>').disabled = false;
 }
function nextKec<?php echo $data['id']; ?>(){
         document.getElementById('kec4<?php echo $data['id']; ?>').disabled = false;
 }
function nextKel<?php echo $data['id']; ?>(){
         document.getElementById('kel4<?php echo $data['id']; ?>').disabled = false;
 }

 function enableInput<?php echo $data['id']; ?>(){
         document.getElementById('ttl_kota3<?php echo $data['id']; ?>').disabled = false;
         document.getElementById('ttl_kota4<?php echo $data['id']; ?>').disabled = false;
         document.getElementById('kec4<?php echo $data['id']; ?>').disabled = false;
         document.getElementById('kel4<?php echo $data['id']; ?>').disabled = false; 
 }
</script>