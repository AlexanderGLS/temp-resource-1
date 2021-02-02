<div class="container">
<div class="row headerModal amiciModalProfilo">
<div class="col-lg-4 text-center settingIMG">
<img src="template/img/impostazioniIcone/imp_password.png" class="iconaImpostazioni">
</div>
<div class="col-lg-8 wrapTitoloImpostazioni modalTitolos">
<p>Password</p>
<p>Gestione password</p>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center" style="padding-bottom:30px;">
<div class="wrapAlertWarning" style="display: none;">
<span class="icon-segnala" style="font-size:23px; color:var(--coloreAlert); "></span>
<span>La tua password non viene cambiata da più di 30 giorni</span>
</div>
<div class="wrapPrivacyBox mailBox">
<div class="headerBox" style="background-color:var(--coloreAlert);">
Cambia Password
</div>
<div class="container">
<div class="row text-center">
<div class="col-lg-6"><div class="settaMail"><label for="passora">Password attuale:</label></div></div>
<div class="col-lg-6"><input type="password" class="textinputBobba settainputMail" id="passora" name="passora"></div>
<div class="col-lg-6"><div class="settaMail"><label for="npass">Nuova Password:</label></div></div>
<div class="col-lg-6"><input type="password" class="textinputBobba settainputMail" id="npass" name="npass"></div>
<div class="col-lg-6"><div class="settaMail"><label for="npass2">Ripeti nuova password:</label></div></div>
<div class="col-lg-6"><input type="password" class="textinputBobba settainputMail" id="npass2" name="npass2"></div>
<button class="btn btnBoBBa btnSettings cambiaPassword" style="bottom:unset;margin:0 auto; margin-bottom: 30px;" type="button">SALVA MODIFICHE PASSWORD</button>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).on("click",'.richiediCodice', function(){
	$.ajax({
		type: "POST",
		url: "/ajax/sendCodeaction.php",
		success:function(result){
			if(result == 1)
			{
				bbnotifica("notGood", "Codice Inviato!", "Controlla tua posta in arrivo o la posta indesiderata per attivare il tuo account");
			}
			if(success == 2)
			{
				bbnotifica("notWTF", "Codice inviato!", "Controlla tua posta in arrivo o la posta indesiderata per attivare il tuo account");
			}
	}});	
});
	$(document).on("click",'.cambiaPassword', function(){
		var npass = $('#npass').val();
		var npass2 = $('#npass2').val();
		var password = $('#passora').val();
		var codice = $('#seccode').val();
		
		if(npass == npass2)
		{
			$.ajax({
				type: "POST",
				data: {npass:npass, password:password, codice:codice},
				url: "/ajax/cambiapassword.php",
				success: function(result){
					if(result == 1)
					{
						bbnotifica("notGOOD", "Password Cambiata!", "Account aggiornato e sicuro!");
					}
					if(result == 2)
					{
						bbnotifica("notBAD", "Codice Errato!", "Controlla la tua mail o clicca su richiedi codice");
					}
					if(result == 3)
					{
						bbnotifica("notBAD", "Password Errata!", "La password attuale è errata, controlla!");
					}
				}
			});
		}else
		{
			bbnotifica("notBAD", "Password non uguali!", "Nuova Password e ripeti password devono essere uguali");
		}
	});
</script>