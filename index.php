<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRAWFISH HUNTER</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
  </head>


  <body>

     <div id="fixedLogo">

        <div class="logo_content">
          <h1>CRAWFISH HUNTER</h1>
         <nav>
           <ul >
             <li><a href="#home" class="scrollto">Home</a></li>
             <li><a href="#hours" class="scrollto">Hours</a></li>
             <li><a href="#menu" class="scrollto">Menus</a></li>
             <li><a href="#delivery" class="scrollto">Delivery</a></li>
           </ul>
         </nav>
        </div><!--end of the logo_content-->
         
    </div><!--end of the fixedLogo-->

    <div id="wrapper">

     <header id="home">

       <div id="header_photo"><img src="img/header.jpg" alt=""></div>

       <div class="header_content">
          <p class="header_location"><a href="https://www.google.com/maps/place/716+Jackson+St,+San+Francisco,+CA+94133/@37.7961812,-122.4070836,17z/data=!3m1!4b1!4m2!3m1!1s0x808580f4a003ba41:0xd60447a5b4d2a7a?hl=en">716 Jackson Street | SF,CA 94133</a></p>
          <p class="header_contact">415-527-8266 <span><a href="mailto:crawhuntertlx@gmail.com"> | CONTACT </a></span></p>
       </div>
    </header>


    
      <section id="hours">

        <div class="hours_icon">Hours</div>

        <table>
          <tbody>
            <tr>
              <td>MON-THU</td>
              <td>11AM-10PM</td>
            </tr>
            <tr>
              <td>FRI</td>
              <td>11AM-11PM</td>
            </tr>
            <tr>
              <td>SAT</td>
              <td>10AM-10PM</td>
            </tr>
            <tr>
              <td>SUN</td>
              <td>10AM-08PM</td>
            </tr>
          </tbody>
        </table>

        <!-- <div class="hours_icon">Hours</div> -->

        <p>
          Private dining available. Seats up to 50 people.<br>

          Call 314.862.6603 or email us.<br>
        </p>

      </section>
     
    

    
   
      <section id="food_slide">

      </section>
    

    
      <section id="menu">

          

      </section>
  

     
      <section id="delivery">
        <div class="delivery_img"><img src="img/delivery.png"></div>

        <h2>Delivery is delightful.</h2>
        <p>Our friends would love to deliver a delicious Crawfish meal to your door.</p>

      </section>

      <section id="find_us">
        
        <div class="overlay" onClick="style.pointerEvents='none'"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.7379239304087!2d-122.40708360000002!3d37.7961812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580f4a003ba41%3A0xd60447a5b4d2a7a!2s716+Jackson+St%2C+San+Francisco%2C+CA+94133!5e0!3m2!1sen!2sus!4v1443421043046" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>



      </section>

      <footer>
        &copy;2015 Crawfish Hunter.inc All Rights Reserved
      </footer>

    </div>
    

    
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.backstretch.js"></script>

    <script src="js/main.js"></script>

    <script>
      $("#food_slide").backstretch([
          "img/boiledcrawfish.jpg",
          "img/5-kabobs-healthy-bbq.jpg",
          "img/4591406021.jpg"    
        ], {duration: 3000, fade: 750});

      $.get("menu.php",{},
        function(data){
        $("#menu").html(data);
       });


      // function loadMenuForCategorySlug(slug) {
      //   var params = {};
      //   if (slug != undefined || slug != "") {
      //     params.category = slug;
      //   }
      //   $.get("menu.php",
      //     params,
      //     function(data){
      //       $(".menu_context table").html(data);
      //    });
      // }

      // loadMenuForCategorySlug();

      //  $("body").on("click", ".menu-link", function(event){
      //     event.preventDefault();
      //     var slug = $(this).attr("slug");
      //     console.log(slug);
      //     loadMenuForCategorySlug(slug);
      //  });

    </script>

  </body>
</html>