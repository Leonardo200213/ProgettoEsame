    function aggiorna() {
        var cont = 0;
        $.ajax(
           {
               url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/utente.php',
               method: 'GET',
               contenttype: 'json',
               success: function (data, textStatus, jQxhr) {
                    $.each(data.clienti, function (i, post) {
                        aggiungi(post.id_utente, post.cognome, post.nome, post.indirizzo, post.email, post.comune);
                        cont++;
                    });
               },
               error: function (jQxhr, textStatus, errorThrown) {
                   console.log(errorThrown);
               }
           });
        return cont;
    }
	
	function cancella(identit) {
		var result = (identit).split('l');
		var iden = result[1];
        $.ajax(
        {
            url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/utente.php/'+iden,
            method: 'DELETE',
            success: function (data, result) {
				var res = JSON.stringify(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    }
	
	function aggiungi(ID, lastName, firstName, address, email, town) {
        var div = document.createElement('div');
        div.className = 'row';
        div.innerHTML = "<div id='d" + ID + "' class='row'> <div class='col-md-1'> <input name='sottolinea' id=" + ID +
            " type='checkbox' value='ID' /> </div>" + "<div class='col-md-2'> " + firstName + " " + lastName +
            "</div> <div class='col-md-2'> " + address + " </div> <div class='col-md-2'>" + email + 
			"</div>  <div class='col-md-3'> "+ town + "</div> <div class='col-md-1'> <button id='mi" + 
			ID +"' class='mod' type='button' onclick='modifica(this.id)'> m </button> <button id=del" + ID +
			" class='del' type='button' onclick='cancella(this.id)'> d </button> <div class='col-md-1'> &nbsp; </div> </div>";
        document.getElementById('c').appendChild(div);
    }