


function me() {

      FB.api('/me?fields=picture,name,email', function(user) {
            console.log('Facebook disse: ' + JSON.stringify(user));
            var profilePictureUrl = '';
            if (user.picture.data) {
              profilePictureUrl = user.picture.data.url;
            } else {
              profilePictureUrl = user.picture;
            }
            console.log('userId: ' + user.id);
            console.log('name: ' + user.name);
            console.log('email: ' + user.email);

            profilePictureUrl = 'http://graph.facebook.com/'+user.id+'/picture?width=200&height=200';
            // http://graph.facebook.com/id/picture?width=200&height=200

            if(user.email!=undefined){
              //$('#data').append('<p><img class="img-circle pull-left" src="' + profilePictureUrl+'" width="100" height="100" /></p>');
              //$('#data').append('<h3>&nbsp; ' + user.name+ ' <i class="icon-facebook-sign"></i></h3>');

              localStorage.setItem('uid',user.id);
              localStorage.setItem('email',user.email);
              localStorage.setItem('nome',user.name);
              localStorage.setItem('foto',profilePictureUrl);

              showUser();


              appUnLoad();
            }
        });
}

function logout() {
    //appLoad();
    FB.logout(function(response) {
        console.log('logout response:' + JSON.stringify(response));
        localStorage.clear();
        //alert('Sucesso');
        $('#data').html('');
        $('.fb-login').show();
        $('.fb-logout').hide();
        //appUnLoad();

        $('.img-user').hide();
        $('.icon-user').show();

    });
}

function login() {
    //appLoad();
    FB.login( function(response) {
       //appUnLoad();
       if (response.authResponse) {
            //alert('logged in now');
            console.log('Fazendo Login remotamente' + response.authResponse);
            me();
       } else {
            //alert('not logged in on login');
            console.log('login response:' + response.error);
       }
       },
       { scope: "email" } //removed: user_friends
       );
}



window.fbAsyncInit = function() {
  app_id=108237009230483; //parole
  //app_id=400210656667819; //sandbox
  //app_id=696418563745655; //parole test app

  try {
      FB.init({
        appId      : app_id,
        version    : 'v2.7',
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });

    } catch (e) {
        alert(e);
    }


    if(uid.length>1) {
      FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
          me();
        }
      });
    }
};
// Load the SDK asynchronously
(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/pt_BR/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));




$(document).ready(function(){


    showUser();


    $('#share').click(function(e){
        e.preventDefault();
        var mb=$('#sharer').find('.modal-body');
        mb.html('<p class="text-center"><img src="img/spinner_big.gif" alt="Carregando..." width="45" height="45" /></p>');
        var remote = server+'sharer.html?id='+$('#id').val();
        if(remote) {
          mb.load(remote);
        }
    });

});




(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-121819-11', 'auto');
ga('require', 'displayfeatures');
ga('send', 'pageview');
