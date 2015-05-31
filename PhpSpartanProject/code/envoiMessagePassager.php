<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
$pseudoReceveur=$_POST['pseudo'];
?>

<div class="container">
    <form method='post' action='envoiMessagePassager_action.php'>
        <label>Message à destination de <?php echo $pseudoReceveur; ?>:</label>
        <br />
        <textarea maxlength="400" name='message' placeholder="Ecrivez votre message."></textarea>
        <input type='hidden' name='pseudo' value='<?php echo $pseudoReceveur; ?>'>
        <button type="submit" id="boutonMessage" class="btn btn-default btn-lg btn-block" name="sendMessage" onclick="alert(\'Le message a bien été envoyé. \')">Envoyer le Message</button>
        
    </form>


</div>


<?php
include '../pagetype/basPage.php';
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

