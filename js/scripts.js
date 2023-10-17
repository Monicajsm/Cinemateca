// Javascript


document.querySelector('.card').onclick = function(){
	apagar(this);
}

function apagar(quem){
    quem.style.display="none";
}

//Para verificar se existe atributo, adicionar e remover atributos
//HTML não possui esta estrutura pedro!
// let prov ="";
// let img = document.querySelector('.img1');
// document.querySelector('#card1').onmouseenter = function(){
//     prov = img.src;
//     let valorExtra;

//     if(Image.hasAttribute("data-img2")){
//         valorExtra = img.getAttribute("data-img2");
//         img.src=valorExtra;
//     }else{
//         img.setAttribute("data-img2","img/img.png")
//         valorExtra=img.getAttribute('data-img2');
//         img.src=valorExtra;
//     }
//     img.removeAttribute('data-img2');
// }


//____ Intervalos de tempo
//setInterval
//setTimeout

const tempo = setInterval(escreveOla, 1000, "Parameter 1");
let conta = 0;
function escreveOla(a) {
  conta++;
  if(conta<=4 || conta >= 8){
    console.log('Olá!' + conta);
  }
  if(conta>=10){
    clearInterval(tempo);
  }
}


//GET ALL CLASS ( a ideia era fazer a troca de imagem de cada carta, não tenho o HTML bem feito)
//ver o exemplo que o hugo colocou na plataforma
let cards = document.querySelectorAll('card');
let prov ='';
//Mostrar PlaginsaElementsArray
for (let i = 0; i < cards.length; i++) {
    //podia fazer um random de 3 valores entre 1 e 255 e depois criar um RGB(X Y Z)
    //e depois podia mudar a cor de coisas aleatoriamente
    // cards[i].querySelector('titulo1').style.color=cor;

    let img = cards[i].querySelector('.img1');
    cards[i].onmouseenter = function(){
        prov = img.src;
        let valorExtra;

        if(Image.hasAttribute("data-img2")){
            valorExtra = img.getAttribute("data-img2");
            img.src=valorExtra;
        }else{
            img.setAttribute("data-img2","img/img.png")
            valorExtra=img.getAttribute('data-img2');
            img.src=valorExtra;
        }
        img.removeAttribute('data-img2');
    }

    cards[i].onmouseleave = function(){
    img.src = prov;
    }
}