<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); ?>
<br/><br/> <br/>    <br/><br/> <br/>    

<div class="aview">
<br/><a href="http://localhost/examensarbete/save/">Spara fler arbeten </a><br/><br/>
<h1> De senast sparade jobben </h1>
<br/><a href="http://localhost/examensarbete/work/">Se äldre arbeten (arkiv) </a><br/>

<br/><br/><br/><br/> <br/>  

    <?php 
    get_header(); 

    // För att ladda in mina egna inlägg
    $viewWork = new WP_Query(array(
        // Vad vi vill fråga efter i databasen 
        'posts_per_page' => 10, // Visar allt innehåll
        'post_type' => 'work',
        'has_archive' => true
    )); ?>
    <div style="overflow-x:auto;">
   
   <!-- För att skriva ut rubriker till alla rader i tabellen -->
   <table class="view"> 
    <tr class="label">
       <td> Kundnamn </td>
       <td> Adress </td>
       <td> Start </td>
       <td> Slut </td>
       <td> Typ av arbete </td>
       <td> Produkter </td>
       <td> Beskrivning </td>
       <td> Inlagd av: </td>
       <td>  </td>
    </tr>

    <?php 
    // Loopa för att skriva ut inläggen 
    while($viewWork->have_posts()) { 
    $viewWork->the_post();?> 
    <tr> 

    <td><a href="<?php the_permalink() ?>"><?php the_field(kundnamn)?></a></td>
    <td><?php the_field(adress)?> <br/> 
    <?php the_field(postnummer_stad)?></td>
    <td><?php the_field(startdatum)?></td>
    <td><?php the_field(slutdatum)?></td>
    <td><?php the_field(typ_av_arbete)?></td>
    <td><?php echo wp_trim_words(get_field(produkter), 4)?></td>
    <td><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_field(beskrivning), 4)?></td>
    <td><?php the_author() ?></td>

    <!-- Läser ut knapp för att radera -->
   <td><ul><li data-id="<?php the_ID(); ?>">
   <button class="deleteWork"> Radera </button>
   </td>
   </tr>
   <?php
    };     
    ?>
    </table> 

 

    <br/><br/> <br/><br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>

</div>

    <?php
    get_footer(); 
    ?>

    