<?php /*Co a la BDD Gaumart*/
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GAUMART Traiteur Paris</title>
        <link rel="icon" type="image/x-ico" href="assets/img/logo_gaumart_ico.png">
        
        <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="style/pages_style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="style/middle_style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="style/small_style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="style/verySmall_style.css">
    </head>
    
    <body>
        <header id="top"><?php include('header.php');?></header>
        <div class="page" id="slide"><?php include('slide.php');?></div>
        <div class="page reception" id="reception"><?php include('reception.php');?></div>
        <div class="page reception" id="evenement"><?php include('evenement.php');?></div>
        <div class="page reception" id="traiteur"><?php include('traiteur.php');?></div>
        <div class="page" id="references"><?php include('references.php');?></div>
        <div class="page" id="contact"><?php include('contact.php');?></div>
        <footer><?php include('footer.php');?></footer>
    </body>
    
    
    <script type="text/javascript">
/* __________________________ JAVASCRIPT __________________________ */
        
        /* ajout événement resize à l'objet windows
        avec appel de fct° resize*/
        window.addEventListener("resize", resize);
        window.addEventListener("pageshow", resize);
        
        /* ==================== Gestion dimension page ==================== */
        
        /*recuperation format page et adaptation javaScript*/ 
        var hauteurPage = window.innerHeight;
        var segmentPage = hauteurPage/100;
        
        var body = document.getElementsByTagName("BODY");
        body[0].height = hauteurPage-20*segmentPage;
        
        var header = document.getElementsByTagName("HEADER");
        header[0].height = 20*segmentPage;//(hauteurPage/5);
        
        var footer = document.getElementsByTagName("FOOTER");
        footer[0].height = 10*segmentPage;//(hauteurPage/10);
        
        var page = document.getElementsByClassName("page");
        for(x=0; x<page.length; x++){
            page[x].height = 50*segmentPage;//(hauteurPage-((3*hauteurPage)/10));
        }
        
        /*Responsive img slide -> chg src*/
        var widthRespons = window.innerWidth;
        var SlideItems = document.getElementsByClassName("slide-item");
        var chgSrc = "-respons";
        var i;
        if(widthRespons<=1280){
            for(i=0; i<SlideItems.length; i++){
                var imgSrc = SlideItems[i].getElementsByTagName('IMG');
                var x = (imgSrc[0].src.length);
                var addImg = imgSrc[0].src.slice(0,(x-4));
                var jpg = imgSrc[0].src.slice((x-4), x);
                imgSrc[0].src = addImg.concat(chgSrc).concat(jpg);
            }
        }
        if(widthRespons<=720){
            for(i=0; i<SlideItems.length; i++){
                var imgSrc = SlideItems[i].getElementsByTagName('IMG');
                var x = (imgSrc[0].src.length);
                var addImg = imgSrc[0].src.slice(0,(x-4));
                addImg = addImg.replace(chgSrc, "");
                var jpg = imgSrc[0].src.slice((x-4), x);
                imgSrc[0].src = addImg.concat(chgSrc).concat(2).concat(jpg);
            }
        }
        
        
        /* ==================== Gestion menu affichage pages ==================== */
        
       function openPage(pageName, elmnt) {
    // Cache toutes les pages de class="page" par default */
    var i, page, navlink;
    page = document.getElementsByClassName("page");
    for (i=0; i<page.length; i++) {
        page[i].style.display = "none";
    }

    // border par default des items du menu
    navlink = document.getElementsByClassName("navlink");
    for (i=0; i<navlink.length; i++) {
        navlink[i].style.border = "";
    }

    // Affichage de la page spécifiée
    document.getElementById(pageName).style.display = "flex";

    // Coloration de l'item du menu selectioné
    elmnt.style.borderLeft = "1px solid rgba(255, 153, 51, .5)";
    elmnt.style.borderTop = "1px solid rgba(255, 153, 51, .5)";
    elmnt.style.borderRadius = "40% 20%";
           
           //Toogle menu
           if(document.getElementById("menu").className === "responsive"){
               ResponsMenu();
           }
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
        
        
        /* ==================== RESPONSIVE MENU ==================== */
        
        function ResponsMenu(){
            var menu = document.getElementById("menu");
            /*toogle logo*/
            var logo = document.getElementById("logo");
            /*toogle canvas*/
            var canvas1 = document.getElementById("Line1");
            var canvas2 = document.getElementById("Line2");
            if(menu.className === ""){
                menu.className = "responsive";
                logo.style.display = "none";
                canvas1.style.width = "15%";
                canvas2.style.width = "15%";
            }else{
                menu.className = "";
                logo.style.display = "block";
                canvas1.style.width = "36%";
                canvas2.style.width = "44%";
            }
        }
        
        
    /* ==================== SLIDER ==================== */
        /*Si page slider active*/
     if(page[0].style.display == "flex"){   
        /*init slide index*/
        var slideIndex = 0;
         showSlides();
        
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("slide-item");
            /* non display des slides items */
            for(i=0; i<slides.length; i++){
                slides[i].style.display = "none";
            }
            slideIndex++;
            if(slideIndex > slides.length){
                slideIndex = 1;
            }
            
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
    }
        
        
       /* ==================== Affichage des logos references ==================== */
        
        /*recuperation format img et adaptation largeure
        fonct° resize*/
    function resize(){
        var image = document.getElementsByClassName("logosimg");
        var largeurPage = window.innerWidth;
        var largeurDivReference = largeurPage*0.6; 
        
        for(i=0; i<=image.length; i++){
            image[i].width = largeurDivReference/6;
            if(image[i].width >= 2*(image[i].height)){
                image[i].style.flexGrow = "2";  
            }
        }
    }
        
        /* ==================== Formulaire de contact ==================== */
        function veriForm(){
            //recup label & verif !empty input
            var label = document.getElementsByTagName("LABEL");
            var i, valid=true;
            for(i=0; i<label.length; i++){
                //recup input
                var champ = label[i].firstElementChild;
                //Si champ vide
                if(champ.nodeValue == ""){
                    champ.style.boxShadow = "0 0 2px crimson";
                    valid=false;
                }
            }
            if(valid){
                alert('Votre message a bien été envoyer');
            }
            return valid;
        }
        
    </script>
</html>