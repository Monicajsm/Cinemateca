$(document).ready(function(){

setCookie = (cName, cValue, expDays) => {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 *60 *1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + ";" + expires + "; path=/";
}

getCookie = (cName) => {
    const name = cName + "=";
   /* const cDecoded = decodedURICComponent(document.cookie);*/
    constcArr = cDecoded.split("; ");
    let value;
    cArr.forEach(val => {
        if (val.indexOf(name) === 0) value = val.substring(name.length);

    })

    return value;
}


$(".cookie-button").click(function(){
    $("#cookies").addClass("none");
    setCookie("cookie", true, 30);
});

cookieMessage = () => {
    if(!getCookie("cookie"))
    $("#cookies").style.display = "block";
}

/*window.addEventListener("load", cookieMessage);*/

/* HOMEPAGE MENU */ 

$(function(){
    let scrollHeader = 50;
    $(window).scroll(function(){
        let scroll = getCurrentScroll();
      
        if (scroll >= scrollHeader) {
            $(".header-box").addClass('disappears');
            $(".menu").addClass('fixed-menu');
            $(".logo").show(this);
        }
        else {
            $(".header-box").removeClass('disappears');
            $(".menu").removeClass('fixed-menu');
            $(".logo").hide(this); 
        }
    })
   });

   function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
   }

   
/* ABRIR E FECHAR CAMPO DE PESQUISA */

$(".search-icon").click(function(){
 $(".inputfield").toggle();
})  



/* RESPONSIVE MENU */ 

$(".responsive-menu").click(function(){

    if($(this).text() === "Fechar") {
    $(this).text("Menu")
    $('.menu').removeClass('mobile');
    document.body.style.overflowY = 'visible';
    
   } else {
     $(this).text("Fechar")
     $('.menu').addClass('mobile')
     document.body.style.overflowY = 'hidden';
   } 
}) 

/* SUBMENU ACTIVO */ 

$('.submenu h4').click(function(){

    if ($(this).hasClass("active-underline")) {
        $(".submenu h4").removeClass("active-underline");
       
      } else {
        $(".submenu h4").removeClass("active-underline active");
        $(this).addClass("active-underline active");
        $(".submenu h4").addClass("subtitle");
      } 
})




/* SUBMENU FIXO NO SCROLL */ 

$(function(){
    let scrollMenu = 50;
    $(window).scroll(function(){
        let scroll = getCurrentScroll();
      
        if (scroll >= scrollMenu) {
            $(".submenu").addClass('fixed-submenu');
            
        }
        else {
            $(".submenu").removeClass('fixed-submenu');
            $(".submenu").addClass('submenu');
            
            
        }
   });

})

   function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
   }



/* HIGHLIGHT SECCAO SUBMENU ON SCROLL */ 


$(window).scroll(function() {
  

})



/* click no submenu para um id especifico */ 

/*
$('a[href^="#"]').click(function(event){
		event.preventDefault();
		var destino = $(this).attr("href");
		if(destino.length){
			var quemSomos = $("header .row").height();
			var dist = $(destino).offset().top - quemSomos+0;

			$('html, body').animate({
				scrollTop: dist
			}, 1000)
		}
	})
});*/


/* MAIN PAGE TITLE SHRINK ON SCROLL */ 

$(function(){
    let scrollMenu = 50;
    $(window).scroll(function(){
        let scroll = getCurrentScroll();
      
        if (scroll >= scrollMenu) {
            $(".main-page-title").addClass("main-page-title-fixed")
        }
        else {
            $(".main-page-title").removeClass("main-page-title-fixed")
        }
   });

})

   function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
}


/* TABELA PROGRAMACAO LINK ACTIVO */ 

/* DIA DA SEMANA ACTIVO */
$('.diasdasemana h4').click(function(){

    if ($(this).hasClass("active")) {
        $(".diasdasemana h4").removeClass("active");
       
      } else {
        $(".diasdasemana h4").removeClass("active");
        $(this).addClass("active");
        $(".diasdasemana h4").addClass("subtitle");
      } 
})



$('.dia').click(function(){
    //obter id do dia clicado
    let diaClicado = $(this).attr("data-target");
   //vai iterar cada div que tenha a class "tab-prog-dia"
   // se so existir uma div, so itera uma vez, se tiver varias divs vai iterar pelo numero de vezes do numero das divs que existe
   $(".tab-prog-dia").each(function(){
        //atributo da div tab-prog-dia
        let data_dia = $(this).attr("data-dia");

        if(diaClicado == data_dia){
            $(this).removeClass("none");
        }else {
                $(this).addClass("none");
        }

   });

    //tratamento imagens
    let slide = ".slide-prog-dia[data-dia=" + diaClicado + "]";
    //obtivemos todos os slides para o dia clicado

    //vamos percorrer todos os slides encontrados para o dia X
    let count = 0;
   $(slide).each(function(){
        //atributo da div tab-prog-dia
        let indexSlide = $(this).attr('data-slick-index');

        if(count==0){
            $('.slider_seg').slick('slickGoTo', indexSlide);
        }
        
        count++;
    });
    if(count!=0){   
        $('.imgSlideParent').removeClass('none');
        // Changes a single option to given value; refresh is optional.
        $('.slider_seg').slick('slickSetOption','slidesToShow',count,true);
    }else{
        $('.imgSlideParent').addClass('none');
    }
   
})


//var abaixo nao esta a ser usado
let slides_show = 4;


/* PROGRAMACAO SLIDERS */ 
$('.slider_seg').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    speed:700,
    draggable: true,
    responsive:[
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2.1,
                slidesToScroll: 2,
            }
        },
    {
        breakpoint: 500,
        settings: {
            slidesToShow: 1.1,
            slidesToScroll: 1,
        }
      }
    ]
    
});


/* MUDAR COR DE SESSAO INICIADA OU DECORRIDA */ 

let currentTime = new Date();
let hours = currentTime.getHours()+''+currentTime.getMinutes();
let num = parseInt(hours);
console.log("Horas "+num)

if (num > 1530) {
    $("#sessao1").addClass("sessaoiniciada");
} 
if (num > 1900) {
    $("#sessao2").addClass("sessaoiniciada");
}
if (num > 1930) {
    $("#sessao3").addClass("sessaoiniciada");
}
if (num > 2145) {
    $("#sessao4").addClass("sessaoiniciada");
}



/* EXPOSICOES SLIDER */

$('.slider_expo').slick({
    infinite: false,
    slidesToShow: 2,
    arrows: true,
    prevArrow:'.prev',
    nextArrow:'.next',
    slidesToScroll: 1,
    draggable:true,
    speed: 700,
    responsive:[
    {
        breakpoint: 996,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        }
      }
    ]

})
  

/* SLIDER COLECCOES E ARQUIVOS */

$('.slider_col').slick({
    infinite: false,
    slidesToShow: 2,
    arrows: true,
    prevArrow:'.prev-col',
    nextArrow:'.next-col',
    slidesToScroll: 1,
    draggable:true,
    speed: 700,
    responsive:[
    {
        breakpoint: 996,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        }
      }
    ]

})



/* SLIDER CICLOS */

$('.slider_ciclos').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable:true,
    speed: 700,
    responsive:[
        {
            breakpoint: 996,
            settings: {
                slidesToShow: 2.1,
                slidesToScroll: 2,
                arrows: true,
                prevArrow:'.prev-ciclos',
                nextArrow:'.next-ciclos',
            }
          },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1.1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow:'.prev-ciclos',
            nextArrow:'.next-ciclos',
        }
      }
      
    ]

})


/* TIMELINE HISTORIA */ 

$('.timeline-slider').slick({
    infinite: false,
    slidesToShow: 14,
    slidesToScroll: 1,
    dots:false,
    arrows: false,
    speed: 300,
    responsive:[
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 3,
                arrows: false,
            }
          },
          {
            breakpoint: 500,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
            }
          },
    ]
})

$('.event-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:false,
    dots: false,
    draggable:false,
    speed: 300
})


/* clicar no ano e aparecer evento + incrementar barra de progressao */
$("[data-year]").on('click', function(){

    $('.event-slider').slick('slickGoTo', $(this).attr('data-year'))

    let $timelineSlider = $('.timeline-slider');
    let $progressTimeline = $('.progress_timeline');
    let $progressBarLabel = $('.slider_label');

    $('.event-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    let calc = ( (nextSlide) / (slick.slideCount) ) * 100;

    $progressTimeline
    .css('background-size', calc + '% 100%')
    .attr('aria-valuenow', calc);

    $progressBarLabel.text(calc + '% completed');
    });
})


/* SLIDE EXPOSICAO PERMANENTE - CINEMATECA */ 

$('.expo-permanente').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    infinite:false,
    dragabble: true,
    fade: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    asNavFor: '.imagens-expo-permanente',
  });


  $('.imagens-expo-permanente').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dragabble:true,
        centerMode: false,
        dots: false,
        asNavFor: '.expo-permanente',
        focusOnSelect: false,
        adaptiveHeight: false,
        responsive:[
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                }
              },
        ]
    })


 /*$('.expo-permanente').on('afterChange', function(event, slick, currentSlide){
    $('.imagens-expo-permanente').slick('slickGoTo', currentSlide);
 });*/

    $('.imagens-expo-permanente').on('click', '.slick-slide', function(event) {
 	var goToSingleSlide = $(this).data('slick-index');

 	$('.expo-permanente').slick('slickGoTo', goToSingleSlide);
 });

 


/* clicar abrir e fechar divs */

    $(".separador").click(function () {
		let isOpen = $(this).attr("data-open");

		// Se acordeao aberto entao fecha o atual
		if (isOpen == "true") {
			$(this).attr("data-open", "false");
			$(".separador_texto", this).slideToggle(300);
			// Animar icon seta do clicado
			$(this).find(".seta").removeClass("rotate180");
		} else {
			//Se acordeao estiver fechadoo, abre o clicado e fecha os restantes
			$(".separador").attr("data-open", "false");
			$(this).attr("data-open", "true");

			// fecha todos
			$(".separador_texto").slideUp(300);
			// animar icon seta dos outros (nao funciona)
			$(".separador").find(".seta").removeClass("rotate180");

			// abre clicado
			$(".separador_texto", this).slideToggle(300);
			// Animar icon seta do clicado
			$(this).find(".seta").addClass("rotate180");
		}
	});



/* SLIDERS COLECCOES E ARQUIVOS */ 


$('.slider-galeria1').slick({
    infinite: false,
    slidesToShow: 8,
    slidesToScroll: 1,
    draggable:true,
    arrows:false,
    dots: false,
    speed: 700,
    responsive:[
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4.1,
                slidesToScroll: 2,
            }
          },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2.1,
            slidesToScroll: 1,
        }
      },
    {
      breakpoint: 500,
      settings: {
          slidesToShow: 1.1,
          slidesToScroll: 1,
      }
    }
      
    ]

})




$('.slider-galeria2').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable:true,
    arrows:false,
    dots: false,
    speed: 700,
    responsive:[
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2.1,
            slidesToScroll: 1,
        }
      },
    {
      breakpoint: 500,
      settings: {
          slidesToShow: 1.1,
          slidesToScroll: 1,
      }
    }
      
    ]

})



/* SLIDER EXPOSICOES */ 

$('.slider-galeria3').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable:true,
    arrows:false,
    dots: false,
    speed: 700,
    responsive:[
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2.1,
            slidesToScroll: 1,
        }
      },
    {
      breakpoint: 500,
      settings: {
          slidesToShow: 1.1,
          slidesToScroll: 1,
      }
    }
      
    ]

})



/* SLIDER GALERIA CINEMATECA JUNIOR */ 

$('.galeria-cinematecajunior').slick({
    infinite: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    draggable:true,
    arrows:false,
    dots: false,
    speed: 700,
    responsive:[
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3.1,
                slidesToScroll: 1,
            }
          },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1.1,
            slidesToScroll: 1,
        }
    }
      
    ]

})



/* SLIDER SABADOS EM FAMILIA */ 

$('.slider_cinematecajunior').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    adaptiveHeight:false,
    speed:700,
    draggable: true,
  
    responsive:[
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2.1,
                slidesToScroll: 2,
            }
        },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1.1,
            slidesToScroll: 1,
        }
      }
    ]

})



/* SLIDER SABADOS EM FAMILIA */ 

$('.slider_cinematecas').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    adaptiveHeight:false,
    speed:700,
    draggable: true,
  
    responsive:[
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3.1,
                slidesToScroll: 2,
            }
        },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
        }
      }
    ]

})



/* SLIDER SABADOS EM FAMILIA */ 

$('.slider_oficinas').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    speed:700,
    draggable: true,
  
    responsive:[
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
            }
        },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
        }
      }
    ]

})














  })
