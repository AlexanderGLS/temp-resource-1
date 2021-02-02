<div class="container">
<div class="row headerModal amiciModalProfilo">
<div class="col-lg-4 text-center settingIMG">
<img src="template/img/impostazioniIcone/imp_amici.png" class="iconaImpostazioni">
</div>
<div class="col-lg-8 wrapTitoloImpostazioni modalTitolos">
<p>Amici</p>
<p>0 amici totali</p>
</div>
</div>
<div class="row rigaCercaAmici">
<div class="col-lg-12">
<div class="wrapIconaCercaAmici">
<span class="icon-cerca" style="font-size:40px; color:#757575; line-height: 1.9;"></span>
</div>
<input type="text" class="formBB cercaAmici" onkeyup="cercaAmici();" id="cercaAmici" placeholder="Cerca amici">
</div>
</div>
<div class="row" style="overflow-y:scroll !important;">
<div class="col-lg-3 nomeAmico" data-nome="-Meko." data-amicoid="1621522" >
<div class="wrapSettingsAmici">
<div class="wrapAmiciSinistra">
<p><a href="/profilo/-Meko.">-Meko.</a></p>
<button class="btn btnBoBBa sfondoRossoChiaro btnSmall cancAmico" data-amicoid="1621522">
Rimuovi
</button>
</div>
<img
                    src="https://images.bobbait.it/avatar/avatarimage.php?figure=he-3740-62.hr-3163-34.sh-3587-93-62.cc-987462858-62.lg-3301-93.ca-1814-65.ch-12667435-92.hd-180-1390&direction=4&head_direction=4&gesture=sml&action=&size=l">
</div>
</div>
<div class="col-lg-3 nomeAmico" data-nome="-PolloFritto" data-amicoid="1624881" >
<div class="wrapSettingsAmici">
<div class="wrapAmiciSinistra">
<p><a href="/profilo/-PolloFritto">-PolloFritto</a></p>
<button class="btn btnBoBBa sfondoRossoChiaro btnSmall cancAmico" data-amicoid="1624881">
Rimuovi
</button>
</div>
<img
                    src="https://images.bobbait.it/avatar/avatarimage.php?figure=fa-1212-62.ch-665-73.ha-1012-73.hr-3012-33.hd-627-1.lg-3018-92&direction=4&head_direction=4&gesture=sml&action=&size=l">
</div>
</div>
<div class="col-lg-3 nomeAmico" data-nome="auroraa20" data-amicoid="1647550" >
<div class="wrapSettingsAmici">
<div class="wrapAmiciSinistra">
<p><a href="/profilo/auroraa20">auroraa20</a></p>
<button class="btn btnBoBBa sfondoRossoChiaro btnSmall cancAmico" data-amicoid="1647550">
Rimuovi
</button>
</div>
<img
                    src="https://images.bobbait.it/avatar/avatarimage.php?figure=hr-3255-1027-55.ch-56284142-110-62.hd-3721-97554.wa-9211528-110-71.cc-3718-92-96.sh-30262-62.lg-3933-96&direction=4&head_direction=4&gesture=sml&action=&size=l">
</div>
</div>
<div class="col-lg-3 nomeAmico" data-nome="Sad.-" data-amicoid="1647759" >
<div class="wrapSettingsAmici">
<div class="wrapAmiciSinistra">
<p><a href="/profilo/Sad.-">Sad.-</a></p>
<button class="btn btnBoBBa sfondoRossoChiaro btnSmall cancAmico" data-amicoid="1647759">
Rimuovi
</button>
</div>
<img
                    src="https://images.bobbait.it/avatar/avatarimage.php?figure=he-3070-110.hr-3012-1042.ch-655-110.lg-6050208-1198.fa-3276-1276.hd-628-1&direction=4&head_direction=4&gesture=sml&action=&size=l">
</div>
</div>
<div class="col-lg-3 nomeAmico" data-nome="polpetty" data-amicoid="1649432" >
<div class="wrapSettingsAmici">
<div class="wrapAmiciSinistra">
<p><a href="/profilo/polpetty">polpetty</a></p>
<button class="btn btnBoBBa sfondoRossoChiaro btnSmall cancAmico" data-amicoid="1649432">
Rimuovi
</button>
</div>
<img
                    src="https://images.bobbait.it/avatar/avatarimage.php?figure=lg-990000025-82.ch-3014-110.hd-605-97540.ca-1807-62.hr-747474-1055.fa-990000361-62&direction=4&head_direction=4&gesture=sml&action=&size=l">
</div>
</div>
</div>
</div>
<script>
function cercaAmici() {
  var input = document.getElementById("cercaAmici");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('nomeAmico');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].getAttribute("data-nome").toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}

$(document).on("click",".cancAmico",function(){
	var amicoid = $(this).data("amicoid");
	var countAmico = $(".contatoreAmici").text();
	$.ajax({
		type: 'POST',
		url: '/ajax/delAmicoProfilo.php',
		data: {amicoid:amicoid},
		success: function(data) {
		  if(data == 1){
			bbnotifica("notGood", "Amico Cancellato!", "Rientra in hotel!");
			$(".nomeAmico[data-amicoid='"+amicoid+"']").remove();
			countAmico--;
			$(".contatoreAmici").text(countAmico);
		  }else{
			bbnotifica("notBad", "Errore", "Qualcosa è andato storto");
		  }
		},
		error:function(err){
		  alert("error"+JSON.stringify(err));
		}
	});
});

</script>