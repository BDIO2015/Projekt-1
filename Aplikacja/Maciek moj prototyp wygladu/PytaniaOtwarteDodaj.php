<html lang="pl">
      <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	</head>
		<style type="text/css">
			#fixme { 
			margin-left: 40%;
			display:inline-block;
			vertical-align:top;
			position: absolute; 
			left: 0px; 
			top: 0px; 
		}
		#fixmetoo { 
			position: absolute; 
			right: 0px; 
			bottom: 0px; 
		}
		div > div#fixme { position: fixed; }
		div > div#fixmetoo { position: fixed; }
		
		pre.fixit { 
			overflow:auto;
			border-left:1px dashed #000;
			border-right:1px dashed #000;
			padding-left:2px; }

		</style>
		
		
        <title>Ankiety online</title>

        

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">

        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />


        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">


        <!-- jQuery Load -->
        <script src="assets/js/jquery-min.js"></script>




<!-- Tutaj dynamicznie tworze pola do dodawania pytan -->
  <script>
  
  


  var x;
  var scroll;
  $(document).ready(function() {
    var max_fields      = 30; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	 var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_open"); //Add button ID
	// var add_button2      = $(".add_closed"); //Add button ID
	var guziki = $(".guziki");
	
    var x = 1; //initlal text box count
	var scroll = 50;
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
		
		
		$(wrapper).append('<p><div>Pytanie nr '+ x +'&nbsp<span class="glyphicon glyphicon-question-sign"></span><input type="text" class="form-control" placeholder="Treść pytania"name="mytext_'+ x +'" /><a href="#" class="remove_field">Usun</a></div></p>' ); //add input box
		window.scrollTo(0,document.body.scrollHeight);
		
		
        }
		else alert('Mozna dodac maksymalnie ' + max_fields + ' pytan');
    });
	
	
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		e.preventDefault(); $(this).parent('p').remove(); 
    }
	
	
	)
	
	
});</script>


<!-- kod html, ktory wyswietlam na stronie -->
<form action=" PytaniaOtwarteDodaj_action.php "method="POST">
<div class="input_fields_wrap" id="content">
	<div class="guziki"	id="fixme">
		<button style="fixed" id="sidebar" class="btn btn-success add_open fixed">Dodaj więcej pytań</button>  <!-- przycisk oprogramowany w js, aby dodac kolejen pole -->
		<input name="submit" type="submit" class="btn btn-primary " value="Prześlij pytania">  <!--przycisk do wyslania zapytania -->
	
	</div>
	<br></br>
	<p>Pytanie nr 1 <span class="glyphicon glyphicon-question-sign"></span></p> <input type="text"  required class="form-control" placeholder="Tresc pytania" name="mytext_1"/></p>
	<script>window.scrollTo(0,document.body.scrollHeight);</script>
	
</div>

</form>
</html>



