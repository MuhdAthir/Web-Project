function checkpwd()
	{
		var pass1 = document.register.pwd.value;
		var pass2 = document.register.pwd2.value;
		var span = document.getElementById('notice');
		
		if(pass1 != pass2)
			{
				span.innerHTML = '&#x2612;<em>Password does not match</em>';
				span.style.color = 'red';
				span.style.display = 'block';
				document.getElementById('btn').className = 'btn-danger';
				document.getElementById('btn').disabled = true;				
			}else if(pass2 == '')
				{
					span.style.display = 'none';
				}else
					{
						span.innerHTML = '&#x2611;<em>Password match!</em>';
						span.style.color = 'green';
						span.style.display = 'block';
						document.getElementById('btn').className = 'btn-primary';
						document.getElementById('btn').disabled = false;
					}
	}
// Open
function openModal( getModal ) {
	// Get DOM Elements
	var modal = document.querySelector('#'+getModal);
	var closeBtn = document.querySelector('.'+getModal);
		  
	modal.style.display = 'block';
	
	// Events
	closeBtn.addEventListener('click', closeModal);
	window.addEventListener('click', outsideClick);
	// Close
	function closeModal() {
	  modal.style.display = 'none';
	}

	// Close If Outside Click
	function outsideClick(e) {
	  if (e.target == modal) {
		modal.style.display = 'none';
	  }
	}
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
}