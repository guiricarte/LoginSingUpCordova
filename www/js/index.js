"use strict";
var Index = {

    //Application Constructor
    init: function() {
        this.bindEvents();
    },

    //Bind Event Listeners
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    
    //Event Handle
    onDeviceReady: function() {
      
      $("#formLogin").submit(function (e){
        e.preventDefault();

         $.ajax({
            type: "POST",
            url: "http://192.168.1.10/safehood/verifyLogin.php", 
            data: {
                acao: 'LoginWeb',
                usuario: $("#usuario").val(),
                senha: $("#senha").val()
            },            
            async: false,
            dataType: "json", 
            success: function (json) {
               
                if(json.result == true){
                   //redireciona o usuario para pagina de home
                   window.location.href = "home.html";

                }else{
                   alert(json.msg);
                }

                Funcoes.hideLoad();
            },error: function(xhr,e,t){
                console.log(xhr.responseText);                
            }
        });
      });

    }
};

