<?php include "header.php"; ?>

<?php
if(isset($_SESSION['message'])) {
    echo "<p class='message-success'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}

?>

<form class="ocjena-form" action="actions/upisOcjene.php" method="POST">
    <input type="hidden" name="ucenik_id" value="<?php echo $_GET['ucenik_id']; ?>">
    <div class="custom-select" style="width:212px;">
  <select name="predmet">
    <option value="0">Programiranje:</option>
    <option value="Usvojenost znanja">Usvojenost znanja</option>
    <option value="Digitalni sadržaj i suradnja">Digitalni sadržaj i suradnja</option>
    <option value="Rješavanje Problema">Rješavanje Problema</option>
    <option value="Web dizajn">Web dizajn</option>
  </select>
</div>
    <input type="number" max="5" min="1" name="ocjena">
    <button class="button button1">UNESI </button>
    <a class="button button2" href="../nastavnik/index.php">NATRAG</a>
    
    <div>
    
    </div>
</form>

<style>
.ocjena-form {
  width: 347px;
    text-align:left;
    text-transform: uppercase;
    font-size: 0.9em;
    font-family: sans-serif;
    height: 25px;
    
  
}
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: #2cc992;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #2cc992;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

input[type="number"]{
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		outline: none;
		display: block;
		padding: 7px;
		border: none;
		border-bottom: 1px solid #ddd;
		background: transparent;
		margin-bottom: 10px;
		font: 16px Arial, Helvetica, sans-serif;
		height: 45px;
		font-family: 'Open Sans Condensed', arial, sans;
    width: 211px;
    margin-bottom: 20px;
    margin-top: -10px;
}	

.ocjene {
		width: 140px;
		display:inline-block;
	}
.ocjene {
		margin: 4px 0;
	}
.submit {
		-moz-box-shadow: inset 0px 1px 0px 0px #2cc992;
		-webkit-box-shadow: inset 0px 1px 0px 0px #2cc992;
		box-shadow: inset 0px 1px 0px 0px #2cc992;
		background-color: #2cc992;
		border: 1px solid #2cc992;
		display: inline-block;
		cursor: pointer;
		color: #FFFFFF;
		font-family: 'Open Sans Condensed', arial, sans;
		font-size: 14px;
		padding: 8px 18px;
		text-decoration: none;
		text-transform: uppercase;
	}
.ocjene {
    background-color: blue;
    padding: 20px;
}

.ocjena-form {
    max-width: 300px;
    padding: 30px;
}

.ocjena-form input {
    margin-right: 20px;
    
}
.button1 {
    background-color: #2cc992; 
    color: white; 
    padding: 8px 29px;
    border: 1px solid transparent;
    cursor: pointer;
    user-select: none;
    text-decoration: none;
}

.button2 {
    background-color: #2cc992; 
    color: white; 
    padding: 8.3px 22px;
    cursor: pointer;
    user-select: none;
    text-decoration: none;
}


.button2:hover {
background-color: #2cc992;
color: whiteb;
}


</style>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<?php include "footer.php"; ?>