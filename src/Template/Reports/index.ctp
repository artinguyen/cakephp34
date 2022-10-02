<div class="container">
  <h2>Dynamic Tabs</h2>
  <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Filter</h3>
      <form>
        <input type="text" name="name">
      </form>
      <ul>
      <?php foreach ($mess as $m) {?>
      <li><?= $m->message->name ?> ---- <?= $m->total ?></li>
      <?php } ?>
      </ul>
      <p>This is paging</p>
      <div class="mess-paging">
      <?= $this->Paginator->numbers($options = array('model' => 'Mess'))?>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Users</h3>
      <form>
        <input type="text" name="user">
      </form>
      <ul>
      <?php foreach ($users as $m) {?>
      <li><?= $m->user_id ?> ---- <?= $m->total ?></li>
      <?php } ?>
      </ul>
      <p>This paging</p>
      <?= $this->Paginator->numbers($options = array('model' => 'Notifications'))?>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
