<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); ?>

<br/><br/> <br/><br/><br/><br/><br/>
<div class="welcome">
<h1> Välkommen 

<!-- För att läsa ut namnet på den inloggade -->
<?php global $current_user; wp_get_current_user(); ?>
<?php if ( is_user_logged_in() ) { 
 echo $current_user->display_name . "!"; } 
else { wp_loginout(); } ?></h1>


<h2><i> Vad vill du göra idag? </i></h2><br/>


<form action="http://localhost/examensarbete/save/">
    <button class="block"> Spara arbete <i class="arrow">></i></button>
</form>
<form action="http://localhost/examensarbete/view/">
    <button class="block"> Se lagrade arbeten <i class="arrow">></i></button>
</form>
<form action="http://localhost/examensarbete/bilduppladdning/">
    <button class="block"> Bilduppladdning <i class="arrow">></i></button>
</form>
<form action="http://localhost/examensarbete/category/test/">
    <button class="block"> Bra-att-ha information <i class="arrow">></i></button>
</form>
<form action="http://localhost/examensarbete/category/test/">
    <button class="block"> Kom ihåg listan <i class="arrow">></i></button>
</form>


<br/><br/> <br/>
<br/><br/> <br/><br/>



</div>

    <?php
    get_footer(); 
    ?>

    