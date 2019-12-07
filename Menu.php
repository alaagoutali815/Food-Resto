<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="CSS/designe.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:300">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
 <body>
<header>
    <div >
            <h1 id="titre1" data-text="Welecom To the wood Resturant  ">Welecom To the wood Resturant </h1>
        
    </div>
</header>
<p class="titel2" id="tit"> Add, Edit or Remove Menu </p> 
<style>
    p{
        width: 700px;
        height: 40px;
    margin-top:20px;
  margin-left: 350px;
   border-radius: 11px 11px 11px 11px ;
    }
  .titel2{
    font-size: 30px;
     font-weight: bold;
    background-color: orangered;
	  text-align: center;
	 
   }
  #onee{
    margin-top:10px;
    border:3px solid ;
    color: white;

  }
  #hh1{
    margin-top:30px;
    color:#5fa2db;
    font-size : 20px ;
    font-weight:bold;
  text-align:center ;
   }
  body{
   margin: 0;
   padding: 0;
     font-family: sans-serif;
    background: url("images/RH-table.jpg");   
 }
 table{
    width:1100px;
    margin-left:100px;
    margin-top:20px;
    background-color:rgba(0, 0, 0, 0.808);
    color:white;
 }
 thead {
 background-color:black;
 color:darkseagreen;
 }
 tbody :hover{
 background-color:#6c757d;
 }
</style>
<div class="area">
    <nav class="main-menu">
<ul>
  
      <div id="who">
             <a><i id="profil" class=" fas fa-user-circle"></i> </a>
                <span class="nav-text" id="textstyl" >
                       Adminisrator 
                  </span>
               
        </div>
          <hr>
            <li class="has-subnav">
                <a href="Menu.php" class="active">
                    <i class="fa fas fa-book-reader fa-2x "  >   </i>
                    <span class="nav-text">
                          Food Menu 
                    </span>
                </a>
                
            </li>
            <li class="has-subnav">
                <a href="#">
                   <i class="fa fas fa-fire-alt fa-2x" ></i>
                    <span class="nav-text">
                       Offres
                    </span>
                </a>
                
            </li>
          <ul class="test">
            <li class="has-subnav">
                <a href="#"> <i class="fa fad fa-scroll fa-2x"></i> 
                    <span class="nav-text">
                        Orders
                    </span> 
                </a>
         
               
            </li>
        </ul>         
            <li>
                <a href="#">
                    <i class="fa fa-comments fa-2x"></i>
                    <span class="nav-text">
                     Tikets
                    </span>
                </a>
            </li>
            <li>
               <a href="#">
                   <i class="fa fas fa-chart-line fa-2x"></i>
                    <span class="nav-text">
                       Statistique
                    </span>
                </a>
            </li>
            <li>
            <a href="team.php" >
                    <i class="fa fas fa-user-friends fa-2x"></i>
                    <span class="nav-text">
                     Team
                    </span>
                </a>
            </li>
           
        </ul>

        <ul class="logout">
            <li>
               <a href="LogIn.php" id="outcolor"> 
                     <i  class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
</div>
<h2 id="hh1"> Liste des menu</h2>
<hr id="onee"> </hr>
<table >
<div class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
</div>
  </table>

  
</body>
</html>