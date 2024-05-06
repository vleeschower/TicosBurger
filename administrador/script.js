const cloud = document.getElementById("cloud");
const barralateral = document.querySelector(".barra-lateral");
//selecciona todos los span encontrados
const spans = document.querySelectorAll("span");
const mode = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

menu.addEventListener("click",()=>{
    barralateral.classList.toggle("max-barra-lateral");

    if(barralateral.classList.contains("max-barra-lateral"))
    {
        menu.children(0).style.display = "none";
        menu.children(1).style.display = "block"
    }
    else{
        menu.children(0).style.display = "block";
        menu.children(1).style.display = "none"
    }
    if(window.innerWidth<=320)
    {
        barralateral.classList.add("max-barra-lateral");
        main.classList.add("min-main");
        span.forEach((span)=>{
            span.classList.add("oculto");
        });
    }
});

mode.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode")
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click",()=>{
    /*esto agrega una clase para la barra lateral y 
    esto se hace para que tenga un efecto*/
    barralateral.classList.toggle("mini-barra-lateral");
    
    //esto es para ajustar el contenido con la barra lateral 
    main.classList.toggle("min-main");
    
    //se crea un bucle foreach para recorrer todos los spans
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});