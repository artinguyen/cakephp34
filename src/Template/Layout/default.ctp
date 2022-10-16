<!DOCTYPE html>
<html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
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
  background-color: DodgerBlue;
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
</style>
<?= $this->Html->css('style.css') ?>
<!------ Include the above in your HEAD tag ---------->
</html>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://bryanrojasq.wordpress.com">
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <select onchange="myFunction(event)">
              <option value="en" >En</option>
              <option value="zh">Zh</option>
              <option value="ja">Zh</option>
              <option value="en" >En</option>
            </select>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-user-plus"></i>Notifications</a>
                </li>
                <li>
                    <a href="sugerencias"><i class="fa fa-fw fa-paper-plane-o"></i>Report</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script>
$(document).ready(function (e) {
  $("input[name='name'], input[name='user']").keyup(function(){
  let value = $(this).val();
  let type = $(this).attr('name');
  $.ajax('/report/?'+type+'='+value, {
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
        $('.tab-content').html(data);
    },
    error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
    }
});

  })
  // Message form
  $('[type="submit1"]').click(function() {
    $.ajax('/save-message/', {
    type: 'POST',  // http method
    data: $("form").serialize(),  // data to submit
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
        $('.tab-content').html(data);
    },
    error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
    }

    
  })
    return false;
})




  })
</script>

<script>

$(document).ready(function(){

    $('#message-frm').submit(function() {
    alert('abc');
        var el = {
            'template_name' : $('input[name="template_name"]').val(),
            'title' : $('input[name="title"]').val(),
            'image' : $('input[name="image"]').val(),
            'banner' : $('input[name="banner"]').val()
        }
        console.log(el);
        //Router::url(['_name' => 'create_message'])
        $.ajax("", {
        type: 'POST',  // http method
        data: el,  // data to submit
        success: function (data, status, xhr) {

        },
        error: function (jqXhr, textStatus, errorMessage) {
                $('p').append('Error' + errorMessage);
        }
    });
    return false;
    })
});

</script>


<script>

$(document).ready(function(){


    $('a').click(function() {
        let data = $(this).attr('href');
        $.ajax(data, {
        type: 'GET',  // http method
        //data: el,  // data to submit
        success: function (data, status, xhr) {

        },
        error: function (jqXhr, textStatus, errorMessage) {
                $('p').append('Error' + errorMessage);
        }
    });
    return false;
    })
    // Add calendar
    $('#calendar').click(function() {
        alert('abc');
        $('#main').append('<input type="text" id="datepicker"></p>');
        $("#datepicker").datepicker();
        return false;
    })
    $('#dropdown').click(function() {
        //alert('abc');
        $('#content').append(`<div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Select car:</option>
    <option value="1">Audi</option>
    <option value="2">BMW</option>
  </select>
</div>`);
        //$("#datepicker").datepicker();
        init();
        return false;
    })
    
});

</script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();

    $('.select-items').click(function(){
        alert('abc');
    })
  } );
  </script>


<script>
function init() {
    var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/

//x = document.getElementsByClassName("custom-select");
x = $(".custom-select:last");
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
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.setAttribute("data", selElmnt.options[j].value);
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        // for (i = 0; i < sl; i++) {
        //   if (s.options[i].innerHTML == this.innerHTML) {
        //     s.selectedIndex = i;
        //     h.innerHTML = this.innerHTML;
        //     y = this.parentNode.getElementsByClassName("same-as-selected");
        //     yl = y.length;
        //     for (k = 0; k < yl; k++) {
        //       y[k].removeAttribute("class");
        //     }
        //     this.setAttribute("class", "same-as-selected");
        //     break;
        //   }
        // }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      //closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
}

init();
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
//document.addEventListener("click", closeAllSelect);
</script>
<script>
function myFunction(event) {
  alert('<?= __("Popup Notification") ?>');
  let lang = event.target.value;
  var link = window.location.href;
  link = link.replace(/(zh|en|ja)/gi, lang);
  //alert(lang);
  //alert(link);
  location.replace(link);
}
</script>
</body>
</html>