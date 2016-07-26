document.addEventListener('DOMContentLoaded', function(){


// Changer les feuilles de style
function setActiveStyleSheet(title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
}

function getActiveStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) return a.getAttribute("title");
  }
  return null;
}

function getPreferredStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1
       && a.getAttribute("rel").indexOf("alt") == -1
       && a.getAttribute("title")
       ) return a.getAttribute("title");
  }
  return null;
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

window.onload = function(e) {
  var cookie = readCookie("style");
  var title = cookie ? cookie : getPreferredStyleSheet();
  setActiveStyleSheet(title);
}

window.onunload = function(e) {
  var title = getActiveStyleSheet();
  createCookie("style", title, 365);
}

var cookie = readCookie("style");
var title = cookie ? cookie : getPreferredStyleSheet();
setActiveStyleSheet(title);

document.addEventListener('click', function(event){
	$theme1 = document.getElementById('theme1');
	$theme2 = document.getElementById('theme2');

	if(event.target == $theme2) {
		setActiveStyleSheet("eco");
	} else if(event.target == $theme1) {
		setActiveStyleSheet("standard");
	}
}); 

// Editeur de texte
tinymce.init({
  selector: 'textarea.admin',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
	
/*
 * Accordéon
 * Quand je clique sur le titre d'un article, 
   je veux afficher le paragraphe correspondant
 */
$(function(){
 
    $("h3").on('click', function(event){
         
        var p = $(event.target).next();
         
        $('li.active').removeClass('active');
        p.parent().addClass('active');
         
        if(p.css('display') == 'block'){
            $('li.active').removeClass('active');
            p.css('display', 'none');
        } else {
            // cacher tous les <p>
            $('li p').css('display', 'none');
            // afficher le <p> après le <h3> sur lequel on clique
            p.css('display', 'block');
        }
 
         
     
    });
 
});

// API Instagram

// Mes infos
//'3586721364.3f41411.af5bb95f456942aa99aac35e04b1ae94',

var token = '2041609864.cfc5a53.7027f5823fdf4308a2f830d97085817b';
    num_photos = 4; // how much photos do you want to get
     
    $.ajax({
      url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token='+token, // or /users/self/media/recent for Sandbox
      dataType: 'jsonp',
      type: 'GET',
      data: {count: num_photos},
      success: function(data){
        console.log(data);
        for( x in data.data ){
          $('ul#rudr_instafeed').append('<li><img src="'+data.data[x].images.low_resolution.url+'"></li>'); // data.data[x].images.low_resolution.url - URL of image, 306х306
          // data.data[x].images.thumbnail.url - URL of image 150х150
          // data.data[x].images.standard_resolution.url - URL of image 612х612
          // data.data[x].link - Instagram post URL 
        }
      },
      error: function(data){
        console.log(data);
      }
    });


});