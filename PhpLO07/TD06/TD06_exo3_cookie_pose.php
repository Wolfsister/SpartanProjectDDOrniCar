<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title>TD_Exo</title>
        <?php
        include('../pagetype/header.php');
        ?>
    </head>

    <body>
        <div id="global">
            <div id="entete">
                <?php
                include('../pagetype/entete.php');
                ?>
            </div><!-- #entete -->
            <div id="centre">
                <div id="navigation">
                    <?php
                    include('../pagetype/navigation.php');
                    ?>
                </div><!-- #navigation -->
                <div id="contenu">
                    
                 <?php 
                    function redirection($url){
                        header("Location:$url");
                    }
                    
                    function setMyCookies($tab){
                        foreach ($tab as $key => $value) {
                            setcookie($key, $value);
                        }                        
                    }
                    
                    function unsetMyCookies(){
                        foreach ($_COOKIE as $key => $value) {
                            setcookie($key, "", time()-1);
                        }
                    }
                   
                    if(isset($_POST) and (!empty($_POST))){
                        setMyCookies($_POST);
                        redirection('TD06_exo1_superGlobales.php');
                    }else{
                        unsetMyCookies();
                    }
                 
                 ?>   
                    
                  



                </div><!-- #contenu -->
            </div><!-- #centre -->
            <div id="pied">
                <p id="copyright">
                    <?php
                    include('../pagetype/footer.php');
                    ?>
                </p>
            </div><!-- #pied -->
        </div><!-- #global -->

    </body>


</html>

