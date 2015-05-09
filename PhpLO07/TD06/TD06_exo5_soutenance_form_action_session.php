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
                   // BT_UNSET
                   function unsetMySession(){
                       session_start();
                       $_SESSION=array();
                       session_destroy();
                   }
                   //BT_DISPLAY
                   
                   
                   //BT_SET
                   function setMySession($tab){
                       //Sauvegarde les données deja existantes
                       session_start();
                       $uneSoutenance=$tab;
                               //array("Date"=>$_POST['date'],"Nom1"=>$_POST['nom1'],"Nom2"=>$_POST['nom2']);
                       if(isset($_SESSION['allSoutenance'])){
                           $allSoutenance=  unserialize($_SESSION['allSoutenance']);
                       }else{
                           $allSoutenance=array();
                       }
                       $allSoutenance[]=serialize($uneSoutenance);
                       $_SESSION['allSoutenance']=serialize($allSoutenance);
                   }
                   
                   
                   if(isset($_POST['BT_UNSET'])){
                       unsetMySession();
                   }
                   if(isset($_POST['BT_SET'])){
                       setMySession($_POST);
                       echo('Session settée');
                   }
                   
                   if(isset($_POST['BT_DISPLAY'])){
                       header("Location:TD06_exo1_superGlobales.php");
                   }
               
                   
                 
                   ?> 
                    
                    <form method="post" action = 'TD06_exo5_soutenance_form_action_session.php'>
                        <p/><label>Date</label>
                        <input type=datetime name="date" value='jjmmddhh'>
                        <p/><label>Nom1</label>
                        <input type="text" name="nom1" />
                        <p/><label>Nom2</label>
                        <input type="text" name="nom2" />

                        
                        <p/><input type="submit" id='BT_SET' name="BT_SET" value='Set'>
                            </form>
                            <form method="post" action = 'TD06_exo5_soutenance_form_action_session.php'>
                            <input type="reset" id='BT_UNSET' name="BT_UNSET" value='Unset'>
                                </form >
                                <form method="post" action = 'TD06_exo5_soutenance_form_action_session.php'>
                            <input type='submit' id='BT_DISPLAY' name="BT_DISPLAY" value='Display'>     
                                </form>
                    
                    
                    
                    



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

