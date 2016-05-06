        <div class="menu_img"></div>

          <div class="menu_context">

            <h1 class="text-center menu_icon">Menu</h1>
            <ul class="cat_list">

              <li><a class="menu-link" href="<?php echo $_SERVER['PHP_SELF'];?>">All</a></li>
              
              <?php
                  require_once("../dbconnect.php");
                  $sql = "SELECT * FROM crawfish_menu_categories ORDER BY sort";
                  $results = mysqli_query($connection,$sql);
                  while ($row = mysqli_fetch_array($results)) {
                    $name = $row['name'];
                    $slug = $row['slug'];
                    $desc = $row['description'];

                    $href = $_SERVER['PHP_SELF'] . "?category=$slug";

                    echo "<li class='$slug'><a class='menu-link' slug='$slug' title ='$desc' href ='$href'>$name</a></li>";
                  }
              ?>

            </ul>
                
            
              <table>
                
                <?php
                require_once("../dbconnect.php");

                if(isset($_GET["category"])){
                  $slug=$_GET["category"];
                  $sql="SELECT  
                        crawfish_menu.name,
                        crawfish_menu.price,
                        crawfish_menu.img,
                        crawfish_menu_categories.name as category,
                        crawfish_menu_categories.slug,
                        crawfish_menu_categories.description as cat_desc



                      FROM 
                        crawfish_menu,crawfish_menu_categories

                      WHERE
                        crawfish_menu.category=crawfish_menu_categories.id
                      AND
                        crawfish_menu_categories.slug='$slug'

                      ORDER BY
                        crawfish_menu_categories.sort,crawfish_menu.name";
                } else {
                  $sql="SELECT  
                        crawfish_menu.name,
                        crawfish_menu.price,
                        crawfish_menu.img,
                        crawfish_menu_categories.name as category,
                        crawfish_menu_categories.slug,
                        crawfish_menu_categories.description as cat_desc



                      FROM 
                        `crawfish_menu`,`crawfish_menu_categories`

                      WHERE
                        crawfish_menu.category=crawfish_menu_categories.id

                      ORDER BY
                        crawfish_menu_categories.sort,crawfish_menu.name";
                }
              

              

              // $sql="SELECT * FROM crabfish_menu ORDER BY category,name";

              


              $results=mysqli_query($connection,$sql);

              $current_category = "";

              while($row=mysqli_fetch_array($results)){
                $name=$row["name"];
                $price=$row["price"];
                $img=$row["img"];
                $desc=$row["description"];
                $cat=$row["category"];
                $slug   =$row["slug"];
                $cat_desc =$row["cat_desc"];

                // if ($current_category != $cat){
                //   echo "<div class='crawfish_menu_categories $slug'><h3>$cat</h3>
                //   <small>$cat_desc</small>
                //   <div>";
                //   $current_category = $cat;
                // }

                echo "<tr class='menu-item $slug'>
                  <td>$name</td>
                  <td class='pull-right'>$price</td>
                  </tr>
                ";
              }
            ?>


              </table>

          </div>


          



          

    <script src="js/jquery.js"></script>
    <script>
    $("body").on("click", ".menu-link", function(event){
      event.preventDefault();

      var slug = $(this).attr("slug");

      console.log(slug);

      // if (slug == undefined) {
      //   $(".menu-item").hide();
      //   $(".menu-item").show();
      // } else {
      //   $(".menu-item").hide();
      //   $(".menu-item."+slug).show();
      // }



      if (slug == undefined) {
        $(".menu-item").addClass("menu-item_fadeOut").hide();
        $(".menu-item").removeClass("menu-item_fadeOut").show();
      } else {
        $(".menu-item").addClass("menu-item_fadeOut").hide();
        $(".menu-item."+slug).removeClass("menu-item_fadeOut").show();
      }
      
     
  
    });


    $(".cat_list li a").click(function(){
    // alert("1111");
     $(".cat_list li a").removeClass("active");
     $(this).addClass("active");

    });


  </script>





