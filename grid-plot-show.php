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
  <style>
    td{
      width:120px!important;
      height:120px!important;
    }
    table{
      z-index:55;
    }
    .petunjuk{
      width: 250px;
      padding: 20px;
      border: 2px solid grey;
      background:white;
      margin-top:100px;
      z-index:10;
      position:absolute;
     
  }
  .ask{
      width: 60px;
      height:60px;
      line-height: 60px;
      background:white;
      margin-top:100px;
      position:absolute;
      border:1px solid grey;
      text-align:center;
      font-size:2rem;
      cursor:pointer;
  }
  .petunjuk span{
    font-size:1.2rem;

  }
  .x{
    position:absolute;
    top:0;
    right:0;
    margin-right:15px;
    cursor:pointer;
  }
  </style>
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
  <div class='petunjuk'>
    data ditampilkan secara berurutan<br> <span>{luxindoor , luxoutdoor}</span> <br> <span class='x' onclick='showHint(0)'>x</span>
  </div>
  <span class='ask' onclick='showHint(1)'>?</span>
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
        echo "<td id=";
        echo $user_data['id'];
        echo ">";    
        echo "<a href=update2.php?id=";
        echo $user_data['id'];  
        echo ">";        
        echo "{ ";
        echo  $user_data['luxin'];
        echo " , ";
        echo $user_data['luxout'] ;
        echo " }";
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
  </p>
  <p>
              Tampilkan grid ke bentuk DF <a href="grid-plot.php" style="color:purple;">click here</a>
  </p>
  <p>
              kembali ke halaman awal <a href="new.php" style="color:purple;">click here</a>
  </p>
  <p>
              Clear data <a href="clear.php" style="color:purple; ">click here</a>
  </p>
  <p>
              Export to JSON Format <a href="export.php" style="color:purple; ">click here</a>
  </p>
  <script>
    function showHint(state){
      if(state == 0){
        document.querySelector('.petunjuk').style.display = 'none';
        }
       else {
        document.querySelector('.petunjuk').style.display = 'block';
       } 
      }
  </script>
</body>
</html>