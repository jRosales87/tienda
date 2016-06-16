// Using the core $.ajax() method
$.ajax({
    url: "nombre.php",
    data: {
        param: "José Antonio",//pagina.php?id=123&id2=111        
    },
 
    // Whether this is a POST or GET request
    type: "GET",
    dataType: "json",
    }).done(function( json ) {// equivalente a ok
        alert("ok");
     //$( "<h1>" ).text( json.title ).appendTo( "body" );
     //$( "<div class=\"content\">").html( json.html ).appendTo( "body" );
    }).fail(function( xhr, status, errorThrown ) {
        alert("error");
       // alert( "Sorry, there was a problem!" );
       
   }).always(function( xhr, status ) {//siempre
       alert("siempre");
    //alert( "The request is complete!" );
  });
  
//  var ok = function ok(result){
//     alert(" ok"+resu);
//  }
//  var fallo = function(xhr,status,errorTh){
//      alert("error");
//  }
//  var siempre = function(xhr,status){
//      alert(siempre);
//  }
//  var pet ={ url: "pagina.php", data: {id: 123},  type: "GET",   dataType: "json"};
//  var r = $.ajax(pet).done(ok).fail(fallo).always(siempre);
  //r.done(ok);
