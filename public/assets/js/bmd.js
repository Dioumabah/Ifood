/**
 *
 */


	//Employé
	$(document).ready(function() {
		$('.delBtnEm').on('click', function(event) {
			event.preventDefault();
			var href=$(this).attr('href');
			$('#myModalEmDel #delRefEm').attr('href', href);
			$('#myModalEmDel').modal();
		});
        });



        //Categorie
	$(document).ready(function() {
		$('.delBtnCategorie').on('click', function(event) {
			event.preventDefault();
			var href=$(this).attr('href');
			$('#myModalCategorieDel #delRefCategorie').attr('href', href);
			$('#myModalCategorieDel').modal();
		});
        });


             //Categorie
	$(document).ready(function() {
		$('.delBtnFournisseur').on('click', function(event) {
			event.preventDefault();
			var href=$(this).attr('href');
			$('#myModalFournisseurDel #delRefFournisseur').attr('href', href);
			$('#myModalFournisseurDel').modal();
		});
    });


             //Client
	$(document).ready(function() {
		$('.delBtnClient').on('click', function(event) {
			event.preventDefault();
			var href=$(this).attr('href');
			$('#myModalClientDel #delRefClient').attr('href', href);
			$('#myModalClientDel').modal();
		});
        });



