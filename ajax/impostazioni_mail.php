<div class="container">
<div class="row headerModal amiciModalProfilo">
<div class="col-lg-4 text-center settingIMG">
<img src="template/img/impostazioniIcone/imp_mail.png" class="iconaImpostazioni">
</div>
<div class="col-lg-8 wrapTitoloImpostazioni modalTitolos">
<p>Mail</p>
<p>Gestisci mail</p>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="wrapPrivacyBox  ">
<div class="headerBox sfondoArancio">
Mail attuale (NON VERIFICATA)
</div>
<div class="row">
<div class="col-lg-6 text-center">
<div class="wrapBoxAttenzione ">
deejay@gmail.com </div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<button class="btn btnBoBBa btnSettings verificamail" type="button">VERIFICA</button>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="wrapPrivacyBox mailBox">
<div class="headerBox sfondoVerdeChiaro">
Cambia Mail
</div>
<div class="container">
<div class="row text-center">
<div class="col-lg-6">
<div class="settaMail">
<label>Nuova Mail:</label>
</div>
</div>
<div class="col-lg-6">
<div class="">
<input type="text" class="textinputBobba settainputMail" id="nuovamail" name="nuovamail">
</div>
</div>
<div class="col-lg-6">
<div class="settaMail">
<label>Ripeti Mail:</label>
</div>
</div>
<div class="col-lg-6">
<div class="">
<input type="text" class="textinputBobba settainputMail" id="nuovamail2" name="nuovamail2">
</div>
</div>
<div class="col-lg-6">
<div class="settaMail">
<label>Password attuale:</label>
</div>
</div>
<div class="col-lg-6">
<div class="">
<input type="text" class="textinputBobba settainputMail" id="mailpass" name="mailpass">
</div>
</div>
<div class="col-lg-12">
<button class="btn btnBoBBa btnSettings cambiaMailB" style="bottom:unset;margin:0 auto; margin-bottom: 30px;" type="button">CONFERMA CAMBIO MAIL</button>
</div>
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

$(document).on("click",'.verificamail', function(){
	$.ajax({
		type: "POST",
		url: "/ajax/setVerifymail.php",
		success:function(result){
			if(result == 1)
			{
				bbnotifica("notGood", "Email Inviata!", "Controlla tua posta in arrivo o la posta indesiderata per attivare il tuo account");
			}
			if(result == 2)
			{
				bbnotifica("notGood", "Codice Inviato!", "Controlla tua posta in arrivo o la posta indesiderata per attivare il tuo account");
			}
			if(result == 3)
			{
				bbnotifica("notWTF", "Email già inviata!", "Controlla tua posta in arrivo o la posta indesiderata per attivare il tuo account");
			}
	}});	
});

$(document).on("click",'.cambiaMailB', function(){
	var nmail = $('#nuovamail').val();
	var nmail2 = $('#nuovamail2').val();
	var password = $('#mailpass').val();
	var codice = $('#seccode').val();
	
	if(nmail == nmail2)
	{
		$.ajax({
			type: "POST",
			data: {nmail:nmail, password:password, codice:codice},
			url: "/ajax/cambiamail.php",
			success: function(result){
				if(result == 1)
				{
					bbnotifica("notGood", "Email Aggiornata!", "La tua email è stata cambiata!");
				}
				if(result == 2)
				{
					bbnotifica("notBAD", "Codice Errato!", "Controlla la tua mail o clicca su richiedi codice");
				}
				if(result == 3)
				{
					bbnotifica("notBAD", "Password Errata!", "Inserisci la password corretta");
				}
				if(result == 4)
				{
					bbnotifica("notWTF", "Email già in uso!", "Usa un'altra email, questa è già in uso!");
				}
			}
		});
	}else
	{
		bbnotifica("notWTF", "Email errata", "Nuova Email e Ripeti Email devono essere uguali!");
	}
});

</script>