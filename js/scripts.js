
window.onload=inicio;
function inicio() {
    var elementos = document.getElementsByClassName("borrar");
    var elementos2 = document.getElementsByClassName("modi");
    var elementos1 = document.getElementsByClassName("insertar");
        for(var i=0;i<elementos.length;i++){
            var elemento = elementos[i];
            elemento.addEventListener("click", function(event){
                if (!confirm("..........................................................................¿BORRAR?.....................................................  ¿TU TAS ZEGUR@ TARUG@? ESTA ACCIÓN ES IRREVERSIBLE COMO TE EQUIVOQUES Y NO TENGAS GUARDADOS LOS DATOS DEL USUARIO PARA PODER REINSERTARLOS LA VAS A ¡JODER!")) {
                    event.preventDefault(); }
            }, false);
    }
        for(var z=0;z<elementos2.length;z++){
            var elemento2 = elementos2[z];
            elemento2.addEventListener("click", function(event){
                if (!confirm("¿Musdisficars? So LOC@ ¿TU TAS ZEGUR@ TARUG@?")) {
                    event.preventDefault(); }
            }, false);
    }
    for(var x=0;x<elementos1.length;x++){
            var elemento1 = elementos1[x];
            elemento1.addEventListener("click", function(event){
                if (!confirm("¿Inzerrrtarrr? So LOC@ ¿TU TAS ZEGUR@ TARUG@?")) {
                    event.preventDefault(); }
            }, false);
    }
     
}