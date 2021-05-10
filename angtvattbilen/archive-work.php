<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); ?>
<br/><br/> <br/><br/><br/><br/>    

<div class="aview">

<h1> Arkiv </h1>
<br/><br/>
<a href="http://localhost/examensarbete/view/">Tillbaka till de senast sparade jobben </a>
<br/> <br/><br/><br/> <br/>  

    <?php 
    get_header(); 

    // För att ladda in mina egna inlägg
    $viewWork = new WP_Query(array(
        // Vad vi vill fråga efter i databasen 
        'posts_per_page' => -1, // Visar allt innehåll
        'post_type' => 'work',
        'has_archive' => true
    )); 

   // För att skriva ut rubriker till alla rader i tabellen
    ?> <table class="aview"> 
    <tr class="label">
       <td> Kundnamn </td>
       <td> Adress </td>
       <td> Startdatum </td>
       <td> Slutdatum </td>
       <td> Typ av arbete </td>
       <td> Produkter </td>
       <td> Beskrivning </td>
       <td> Inlagd av: </td>
    </tr>

    <?php 
    // Loopa för att skriva ut inläggen 
    while($viewWork->have_posts()) { 
    $viewWork->the_post();?> 
    <tr> 
    <td><a href="<?php the_permalink()?>"><?php the_field(kundnamn)?></a></td>
    <td><?php the_field(adress)?></td>
    <td><?php the_field(startdatum)?></td>
    <td><?php the_field(slutdatum)?></td>
    <td><?php the_field(typ_av_arbete)?></td>
    <td><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_field(produkter), 4)?></a></td>
    <td><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_field(beskrivning), 4)?></a></td>
    <td><?php the_author() ?></td>
    </tr>
    <?php
    }; ?>
    </table> 
 

    <br/> <br/>
    <?php echo paginate_links(); ?>
    <br/> <br/><br/>
    <br/><br/> <br/>
    <br/><br/> <br/>

</div>

    <?php
    get_footer(); 
    ?>

    