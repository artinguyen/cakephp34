Generates a sorting link. Sets querystring parameters for the sort and direction. Links will default to sorting by asc. After the first click, links generated with sort() will handle direction switching automatically. If the resultset is sorted ‘asc’ by the specified key the returned link will sort by ‘desc’.

Accepted keys for $options:

escape Whether you want the contents HTML entity encoded, defaults to true.

model The model to use, defaults to PaginatorHelper::defaultModel().

direction The default direction to use when this link isn’t active.

lock Lock direction. Will only use the default direction then, defaults to false.
<div class="col-lg-12">
    <form id="fupForm" enctype="multipart/form-data">

        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" class="form-control" id="file" name="file" required />
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary submitBtn" value="SUBMIT"/>
    </form>
</div>
<nav role="navigation">
   <ul>
      <li><a href="#">One</a></li>
      <li><a href="#">Two</a>
         <ul class="dropdown">
            <li><a href="#">Sub-1</a></li>
            <li><a href="#">Sub-2</a></li>
            <li><a href="#">Sub-3</a>
            	<ul class="dropdown">
		            <li><a href="#">Sub-1</a></li>
		            <li><a href="#">Sub-2</a></li>
		            <li><a href="#">Sub-3</a>


		            </li>
		         </ul>

            </li>
         </ul>
      </li>
      <li><a href="#">Three</a></li>
   </ul>
</nav>

<nav role="navigation">
	<ul>
	   <!-- Level 1 -->
		<?php foreach ($conditions1 as $key => $val1) {?>
		<li><?= __($val1->name) ?> <?= $val1->parent_id ?>
		<!-- Level 2 -->
			<?php foreach ($conditions2 as $key => $val2) {?>
				<?php if( in_array($val1->id, explode(',', $val2->parent_id ) )) { ?>
					<ul>
						<li><?= ($val2->name) ?> <?= $val2->parent_id ?>
							<!-- Level 3 -->
							<?php foreach ($conditions2 as $key => $val3) {?>
								<?php if( in_array($val2->id, explode(',', $val3->parent_id ) )) { ?>
									<ul>
										<li><?= ($val3->name) ?> <?= $val3->parent_id ?></li>
									</ul>
								<?php } ?>
							<?php } ?>
						</li>
					</ul>
				<?php } ?>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</nav>
  


<form>
<input type="text" name="user">
<input type="text" name="name">
</form>
<ul class="pagination">
<?php 
$this->Paginator->options(['model' => 'Articles']);
//echo $this->Paginator->total() ;

?>
<?= $this->Paginator->numbers()?>
<?php
if($this->Paginator->total() > 0) {
	echo $this->Paginator->next(">>") ;
}


?>
</ul>
<ul class="list">
<?php foreach ($articles as $key=>$article) {?>
<li><?= $article->title ?></li>
<?php } ?>

</ul>
<?= $this->Paginator->numbers($options = array('model' => 'Messages'))?>
<ul class="list">
<?php foreach ($articles1 as $key=>$article) {?>
<li><?= $article->name ?></li>
<?php
}
?>

</ul>

<p>This noti</p>
<?= $this->Paginator->numbers($options = array('model' => 'Notifications'))?>


<p>This is mess</p>
<?= $this->Paginator->numbers($options = array('model' => 'Mess'))?>
<script>
$(document).ready(function() {
	$('a').click(function() {
	let href = $(this).attr('href');
			$.ajax(href+'?&type="report"', {
    type: 'GET',  // http method
    //data: { myData: 'This is my data.' },  // data to submit
    success: function (data, status, xhr) {
        //$('p').append('status: ' + status + ', data: ' + data);
        //console.log(data);
        let list = JSON.parse(data);
        let txt = '';
        for(let i=0; i<list.length; i++) {
        	txt += '<li>'+list[i].title+'</li>';
        }
        $('.list li').remove();
        $('.list').append(txt);
    },
    error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
    }
});

	return false;
	})


	$("input[name='name'], input[name='user']").keyup(function(){
	let value = $(this).val();
	let type = $(this).attr('name');
	$.ajax('/paging/?'+type+'='+value, {
    type: 'GET',  // http method
    //data: { myData: 'This is my data.' },  // data to submit
    success: function (data, status, xhr) {
        //$('p').append('status: ' + status + ', data: ' + data);
        console.log(data);
        /*
        let list = JSON.parse(data);
        let txt = '';
        for(let i=0; i<list.length; i++) {
        	txt += '<li>'+list[i].title+'</li>';
        }
        $('.list li').remove();
        $('.list').append(txt);
        */
    },
    error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
    }
});

	})


















})



$(document).ready(function (e) {
    	$("#fupForm").on('submit',(function(e) {
    		e.preventDefault();
    		$.ajax({
            	url: "/uploadCsv",
    			type: "POST",
    			data:  new FormData(this),
    			contentType: false,
        	    cache: false,
    			processData: false,
    			success: function(data)
    		    {
    				console.log(data);
    		    },
    		  	error: function(data)
    	    	{
    		  	  console.log("error");
                  console.log(data);
    	    	}
    	   });
    	}));
    });
</script>
