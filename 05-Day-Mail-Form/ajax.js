$(document).ready(function(e) {
  $("#gonderbtn").click(function() {
  var incomingIsim = $("input[name='isim']").val();
  var incomingMail = $("input[name='mail']").val();
  var incomingKonu = $("input[name='konu']").val();
  var incomingMesaj = $("textarea[name='mesaj']").val();
    $.post("sonuc.php", {
      isim: incomingIsim,
      mail: incomingMail,
      konu: incomingKonu,
      mesaj: incomingMesaj
    }, function(data) {
$("#mesajsonuc").text("Mesajınız İletilmiştir. Teşekkür ederiz.");
      $('#mailform').trigger("reset");
      $("#formtutucu").fadeOut("slow");
    });
  });
});




