$(document).ready(function(){

	$('.del').click(function(){
		if (confirm("Tem a certeza que quer apagar?") != true) {
			return false;
		}
	})

	$('.abreFecha').click(function(){
		if ($('.abreFecha').html() == '<i class="fa fa-bars"></i>') {
			$('.abreFecha').html('<i class="fa fa-times">');
			$('.sidebar').removeClass('col-md-3');
			$('.sidebar').addClass('col-md-1');

			$('.sidebar').addClass('removeList');

			$('.dash').removeClass('col-md-9');
			$('.dash').addClass('col-md-11');
		}else{
			$('.abreFecha').html('<i class="fa fa-bars">');
			$('.sidebar').removeClass('col-md-1');
			$('.sidebar').addClass('col-md-3');

			$('.sidebar').removeClass('removeList');

			$('.dash').removeClass('col-md-11');
			$('.dash').addClass('col-md-9');
		}
	})

})


function sorteia(min, max){
	return Math.floor(Math.random() * (max - min + 1)) + min;
}







