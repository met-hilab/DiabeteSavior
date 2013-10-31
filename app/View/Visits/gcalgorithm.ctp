<h2>Glycemic Control Algorithm Results</h2>

<form id="algorithm_results" class="form-horizontal" role="form" action="/visits/gcalgorithm" method="post">

<?php
	echo "Algorithm Decision: " .$decision. "<br>";
	echo "Therapy: " .$therapy. "<br>";
	echo "Medicine1: " .$medicine1. "<br>";
	echo "Medicine2: " .$medicine2. "<br>";
	echo "Medicine3: " .$medicine3. "<br>";
?>

<div class="control-group">
  <label class="" for="Accept"></label>
  <div class="">
    <button id="Accept" name="Accept" class="btn btn-primary">Accept</button>
  </div>
</div>
</form>
<br/>

<div style="padding-bottom:10px;">
	<a href="/visits/edit" class="btn btn-primary" style="padding-left:5px;">
		<span class="glyphicon glyphicon-edit"></span>Edit</a>
</div>
