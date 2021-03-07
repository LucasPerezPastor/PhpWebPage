
// Shorthand for $( document ).ready()
$(function() {
    languageSelector();
    showAlertCookie();
    setButtonsCookies();
});


function languageSelector()
{
    $('#results').text("Buscando id languageSelector");
    if ($('#languageSelector').length>0) //Si existe el elemento
    {
        $('#languageSelector').change //Si hay algún cambio , es decir se ha seleccionado alguna opción
        (function()
            {
                $.ajax({ //Usamos el método Ajax para realizar una petición POST pasandole la variable lang
                    type: "POST",
                    url: location.href,
                    data:{
                        lang:$("#languageSelector").val(), //lang = value de la opción seleccionada
                        },
                    success: function() {   
                        location.reload();  //Una vez realizada la pertición recargamos la página
                    }
                });
            }
        ); //Comprobaremos si hay algún cambio para detectar el cambio de opción
    }
}

/**
 * Creamos una cookie con el nombre indicado en cname, el valor indicado
 * en cvalue y los días que esta cookie está activa.
 * 
 * @param {*} cname 
 * @param {*} cvalue 
 * @param {*} exdays 
 */
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  /**
   * Devuelve el valor de una variable dentro de las cookies si es que existe,
   * en caso contrario devolvera una cadena vacia.
   * 
   * @param {*} cname 
   */
  function getCookie(cname) {
    var name = cname + "=";
    /* Ddcodifica la caden de cookies para manejar caracteres especiales */
    var decodedCookie = decodeURIComponent(document.cookie); 
    /* Dividimos la cadena de cookies en un array usando como separador el ;*/
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      /*Si en contramos el nombre de la cookie devolvemos , el valor de la cookie
      al restarle el valor del nombre de la cookie */
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  /**
   * Muestra el modal de aviso cookies , salvo que exista la cookie 'alertCookies' y esta valga false
   */
  function  showAlertCookie()
  {
      var myCookie=getCookie('alertCookies');
      if (myCookie=='false')
      {
        // No enseñamos el modal de cookies
      }else
      {
        var myCookiesModal = new bootstrap.Modal(document.getElementById('warningCookies'),{backdrop:'static' , keyboard:false})
        myCookiesModal.show();
      }
  };

  /**
   * Crea o pone la variable 'alertCookies' en las cookies con valor false y validez de 365 días
   */
  function AlertCookies(value='false',days=365)
  {
    setCookie('alertCookies',value,days);
  }

  
  /**
   * Asigna a los botones de "aceptar" del modal de avisocookies y de infocookies
   * la funcion de crear la cookie alertCookies en modo false por 365 días.
   * Y si existe un boton con id resetCookies la funcion de poner alertCookies a true por 365 días.
   */
  function setButtonsCookies()
  {
    $('#acceptInfoCookies').click(function(){AlertCookies()} );
    $('#acceptCookies').click(function(){AlertCookies()} );
    $('#closeInfocookies').click(function() {showAlertCookie()})
    $('#resetCookies').click(function(){AlertCookies('true')});
  }

