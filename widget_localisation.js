/***
Description: 
Dependances: http://vanilla-js.com/
Copyright (c) 20200518, bibibricodeur.
License: WTFPL
***/

// https://playground.deaxon.com/js/vanilla-js/
document.addEventListener("DOMContentLoaded", function() {
	// code
	console.log('localisation.js en marche :-)');
  
	function fetchIP() {
	    // https://developer.mozilla.org/fr/docs/Web/API/Fetch_API/Using_Fetch
	    if(self.fetch) {
	        // exécuter ma requête fetch ici
	        var requete = ('https://ip.nf/me.json');
	        // https://developer.mozilla.org/fr/docs/Learn/JavaScript/Objects/JSON
	        fetch(requete).then(function(response) {
	            var contentType = response.headers.get("content-type");
	            if(contentType && contentType.indexOf("application/json") !== -1) {
	                return response.json().then(function(data) {
	                    // traitement du JSON                    
	                    console.log('requete = ' + requete);                    
	                    console.log(data);
	                    // https://developer.mozilla.org/fr/docs/Web/API/Body/json
	                    ip = (data.ip.ip)
	                    pays = (data.ip.country)
	                    patelin = (data.ip.city)
                        // https://developer.mozilla.org/fr/docs/Web/API/Document/querySelector
                        document.querySelector('#ip').innerHTML = 'Ip: <b>' + ip + '</b>';
                        document.querySelector('#pays').innerHTML = 'Pays: ' + pays;
                        document.querySelector('#patelin').innerHTML = 'Patelin: <b>' + patelin + '</b>';
	                });
	            } else {
	                console.log("Oops, nous n'avons pas du JSON!");
	            }
	        })
	        .catch(function(error) {
	            console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
	        });
	    } else {
	        // Faire quelque chose avec XMLHttpRequest?
	        console.log('Faire quelque chose avec XMLHttpRequest?');
	    }
	}

	fetchIP();
});

/* fin */ 
