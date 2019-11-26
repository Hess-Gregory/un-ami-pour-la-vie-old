function completionVillePv(value) 
{
    let num = document.getElementById("postal").value;
        //console.log("code postal: ", num);

    let client = new XMLHttpRequest();
    client.open("GET", "http://api.zippopotam.us/be/"+num, true);
    client.onreadystatechange = function() 
    {
        if(client.readyState == 4 &&client.status == 200) 
        {   // console.log(client.responseText);
            let info= eval('('+client.responseText+')');
                    //console.log(info);
            ville.innerHTML = info.places[0]["place name"];
            console.log(info.places.length);
                    //var arr = new Array( 10, 20, 30 )
                    //console.log(info.places[].every(isBelowThreshold));

            if(info.places.length > 1)
                {
                    for(i = 0; i < info.places.length; i++)
                    
                    {   //console.log("contient plusieurs");
                
                        document.forms['newUserForm'].adPvCity.options[i] =
                        new Option(info.places[i]["place name"],info.places[i]);
                                //console.log(info.places[i]);
                                //document.forms['the form'].ville.options[i] = 
                                //new Option(the_option[i],the_option[i]);
                    }
                }else

                {               //console.log("contient un seul", );
                        document.forms['newUserForm'].adPvCity.options[i] = 
                        new Option(adPvCity.innerHTML);
                }               console.log("ville: ", info.places[0]["place name"] );
                    
                    
        }
        else if(client.status == 404)
        {
            error.innerHTML = "Erreur code postal invalide";
    }
            };

            client.send();
}

                    error.innerHTML = "";                
        //let error = document.getElementById("error");
        //let adPvCity = document.getElementById("adPvCity");
        //console.log("la ville: ", ville);

        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });        
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation')
  
      // Loop over them and prevent submission
      Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    }, false)
  }())        