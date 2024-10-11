// step 1: get DOM (obter os elementos do DOM)
let nextDom = document.getElementById('next'); // Botão "próximo"
let prevDom = document.getElementById('prev'); // Botão "anterior"

let carouselDom = document.querySelector('.carousel'); // Container do carrossel
let SliderDom = carouselDom.querySelector('.carousel .list'); // Lista de itens (imagens) dentro do carrossel
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail'); // Container de miniaturas (thumbnails)
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item'); // Todas as miniaturas
let timeDom = document.querySelector('.carousel .time'); // Elemento que pode ser usado para mostrar o tempo (não utilizado no código atual)

// Move a primeira miniatura para o final da lista
thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);

// Define o tempo de execução da animação (3 segundos) e o tempo para o próximo slide automático (7 segundos)
let timeRunning = 3000;
let timeAutoNext = 7000;

// Define o que acontece quando o botão "próximo" é clicado
nextDom.onclick = function(){
    showSlider('next'); // Chama a função showSlider com o parâmetro 'next'
}

// Define o que acontece quando o botão "anterior" é clicado
prevDom.onclick = function(){
    showSlider('prev'); // Chama a função showSlider com o parâmetro 'prev'
}

let runTimeOut; // Variável que armazenará o temporizador para a remoção das classes de animação
let runNextAuto = setTimeout(() => {
    next.click(); // Simula um clique no botão "próximo" após 7 segundos
}, timeAutoNext);

// Função que controla a exibição do próximo ou anterior slide
function showSlider(type){
    // Coleta todos os itens (imagens) do carrossel e miniaturas
    let SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');
    
    // Se o tipo for 'next', move a primeira imagem e miniatura para o final da lista
    if(type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next'); // Adiciona a classe 'next' para animação
    } else { // Se o tipo for 'prev', move a última imagem e miniatura para o início da lista
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        carouselDom.classList.add('prev'); // Adiciona a classe 'prev' para animação
    }

    // Limpa qualquer timeout anterior e remove as classes 'next' ou 'prev' após 3 segundos
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    // Reinicia o temporizador para a troca automática de slide após 7 segundos
    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}


