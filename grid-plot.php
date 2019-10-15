<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style-grid.css">
 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- developing navbar -->
  <?php
      require 'dbconfig.php'; 
      $result = mysqli_query($mysqli, "SELECT * FROM maintable order by noy,nox");      
  ?>
  <title>Mapping daylighting in square grid</title>
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="#">
    Navigation
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="new.php">New<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clear.php">Clear</a>
        </li>
      </ul>
    <!-- <form class="form-inline my-2 my-lg-0" action="create_table.php">
      <input class="form-control mr-sm-2" type="form-text" placeholder="Search" aria-label="Search">
      <input class="form-control mr-sm-2" type="form-text" placeholder="Search" aria-label="Search">
      <input type="submit" value="submit">
    </form> -->
    </div>
  
  </nav>
  <p>
    <table>
      <?php
      $y = 1;
      while ($user_data = mysqli_fetch_array($result)) {
        $temp = $user_data['noy'];
        if ($temp != $y) {
          $y++;
          echo "<tr>";
        }
        echo "<td class='grid' id=";
        echo $user_data['id'];
        echo ">";    
        echo "<a href=update.php?id=";
        echo $user_data['id'];  
        echo ">";        
        echo $user_data['value'];
        echo "</a></td>";
        if ($temp != $y) {
          echo "</tr>";
        }
      }

      // drop down
                // echo "<td id=";
                // echo $user_data['id'];
                // echo ">";
                // echo "<div class='dropdown'>";            
                // echo "<button onclick='myFunction()' class='dropbtn'>";
                // echo $user_data['lux'];
                // echo "</button>";
                // echo "<div id='myDropdown' class='dropdown-content'>";
                // echo "<a href='update.php?=";
                // echo $user_data['id'];
                // echo "'>update</a>";
                // echo "<a href='#about'>About</a>";
                // echo "</div";
                // echo "</div>";
                // echo "</td>";
      ?>
    <!-- <script>
    //When the user clicks on the button, 
    //toggle between hiding and showing the dropdown content
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>  -->             
  </table>
  <br>
  <table>
    <tr>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
      <td class='cmap'></td>
    </tr>
  </table>
  </p>
  <p>
              kembali ke halaman awal <a href="new.php" style="color:purple;">click here</a>
  </p>
  <p>
              Tampilkan grid ke bentuk {Luxin , Luxout} <a href="grid-plot-show.php" style="color:purple;">click here</a>
  </p>
  <p>
              Clear data <a href="clear.php" style="color:purple; ">click here</a>
  </p>
  <p>
              Export to JSON Format <a href="export.php" style="color:purple; ">click here</a>
  </p>
  <!--<p>-->
  <!--  <form action='save.php' method="post">-->
  <!--  <input type="hidden" name="mapobj" id='mapobj'> -->
  <!--  </form> -->
  <!--            save map to database<a href="javascript:void(0)" style="color:purple; " onclick="saveMap()"> click here</a>-->
  <!--</p>-->
    <script>
  function saveMap(){
    var url = "export.php";
    $.getJSON(url, function(data) {
      console.log(data);
        });
  };
  var maxnum = 0;
  var minnum = 100;
  var td = document.getElementsByClassName('grid');
  Array.prototype.forEach.call(td, function(e){
     if (Number(e.innerText) > maxnum) {
       maxnum = Number(e.innerText);     
     }; 
     if (Number(e.innerText) < minnum) {
       minnum = Number(e.innerText);     
     }; 
    });

  var range = (maxnum - minnum);
  var box = [];
  for (let index = 0; index < 10; index++) {
    box[index] = (minnum + (index*range)/10);
    box[index] = box[index].toFixed(2);
    console.log(box[index]);
  }


  function thisClass(el){
   if (Number(el.innerText) <= box[0]) {
    el.style.background = color[0];
  }
  else if  (Number(el.innerText) <= box[1]) {
    el.style.background = color[1];
  }
  else if  (Number(el.innerText) <= box[2]) {
    el.style.background = color[2];
  }
  else if  (Number(el.innerText) <= box[3]) {
    el.style.background = color[3];
  }
  else if  (Number(el.innerText) <= box[4]) {
    el.style.background = color[4];
  }
  else if  (Number(el.innerText) <= box[5]) {
    el.style.background = color[5];
  }
  else if  (Number(el.innerText) <= box[6]) {
    el.style.background = color[6];
  }
  else if  (Number(el.innerText) <= box[7]) {
    el.style.background = color[7];
  }
  else if  (Number(el.innerText) <= box[8]) {
    el.style.background = color[8];
  }
   else {
    el.style.background = color[9];
     
   };
  };
  var color = [];
  color[0] ='rgb(0,0,99)';
  color[1]= 'rgb(0,0,250)';
  color[2]= 'rgb(3,94,255)';
  color[3] ='rgb(1,211,249)';
  color[4] ='rgb(80,255,160)';
  color[5]= 'rgb(160,254,80)';
  color[6]= 'rgb(255,211,1)';
  color[7]= 'rgb(255,94,3)';
  color[8] ='rgb(250,0,0)';
  color[9] ='rgb(99,0,0)';
  var loops = 0;
  color.forEach(element => {
    document.getElementsByClassName('cmap')[loops].style.background = color[loops];
    document.getElementsByClassName('cmap')[loops].innerText = '<= ' + String(box[loops]);    
    loops = loops +1 ;
  });
  document.getElementsByClassName('cmap')[9].innerText = '> ' + String(box[9]);   
  Array.prototype.forEach.call(td, function(el){
    if (Number(el.innerText) <= box[0]) {
    el.style.background = color[0];
  }
  else if  (Number(el.innerText) <= box[1]) {
    el.style.background = color[1];
  }
  else if  (Number(el.innerText) <= box[2]) {
    el.style.background = color[2];
  }
  else if  (Number(el.innerText) <= box[3]) {
    el.style.background = color[3];
  }
  else if  (Number(el.innerText) <= box[4]) {
    el.style.background = color[4];
  }
  else if  (Number(el.innerText) <= box[5]) {
    el.style.background = color[5];
  }
  else if  (Number(el.innerText) <= box[6]) {
    el.style.background = color[6];
  }
  else if  (Number(el.innerText) <= box[7]) {
    el.style.background = color[7];
  }
  else if  (Number(el.innerText) <= box[8]) {
    el.style.background = color[8];
  }
   else {
    el.style.background = color[9];
     
   };
  });

  </script>
</body>
</html>