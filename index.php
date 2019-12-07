
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="CSS/designe.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:300">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
	body{
   margin: 0;
   padding: 0;
     font-family: sans-serif;
    background: url("images/RH-table.jpg");
    
}
	</style>
</head>
 <body>
<header>
    <div >
            <h1 id="titre1" data-text="Welecom To the wood Resturant  ">Welecom To the wood Resturant </h1>
        
    </div>
</header>


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
                <a href="Menu.php">
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

<div class="cont">
        <div class="slider"></div>
        <ul class="nav"></div>
        <div data-target='right' class="side-nav side-nav--right"></div>
        <div data-target='left' class="side-nav side-nav--left"></div>
    </div>

  
</body>
</html>