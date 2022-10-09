<form action="/action_page.php" id="message-frm">
	<label for="fname">Template:</label><br>
	<input type="text" id="fname" name="template_name" value=""><br>
	<label for="lname">Title:</label><br>
	<input type="text" id="lname" name="title" value=""><br><br>
	<label for="lname">Image link:</label><br>
	<input type="text" id="lname" name="image" value=""><br><br>
	<label for="lname">Banner link:</label><br>
	<input type="text" id="lname" name="banner" value=""><br><br>
	<input type="submit" value="Submit">
</form> 
<table>
<?php foreach($messages as $message) {  ?>
<tr><td>
<a href="/message/delete/<?= $message->id ?>"><?= $message->title ?></a>
</td></tr>

<?php } ?>
</table>
<button id="calendar">Add calendar</button>
<button id="dropdown">Add dropdown</button>
<div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Select car:</option>
    <option value="1">Audi</option>
    <option value="2">BMW</option>
  </select>
</div>