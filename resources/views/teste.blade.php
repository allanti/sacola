<!DOCTYPE>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/sacola.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">

</body>

	<title>Controle sacolas</title>

</head>
<body>


<!-- Transition Button -->
<a id="toggle" href="#!" class="btn right">toggle</a>
<a id="scale" href="#!" class="btn-floating btn-large scale-transition scale-in">
    <i class="material-icons">add</i>
</a>
<!-- Transition Button -->



<!-- Float Action Button -->
<div class="row">
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
  </ul>
</div>
</div>
<!-- Float Action Button -->
<!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<script type="text/javascript">

$(document).ready(function(){
  $('.modal').modal();
});
//floate action buttom
const emensBtns = document.querySelectorAll(".fixed-action-btn");
const floatingBtn = M.FloatingActionButton.init(emensBtns, {
    direction: "top"
});
//floate action buttom


//transition Button
let c = 0;
$('#toggle').click( f => c == 0
 ? `${$('#scale').removeClass('scale-in').addClass('scale-out')} ${c = c+=1}` 
 : `${$('#scale').removeClass('scale-out').addClass('scale-in')} ${c = c-=1}`
);
//transition Button
</script>
</html>