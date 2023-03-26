<?php
include_once 'header.php';
?>

        <main>
           <?php  // add some php to load the breadcrumb bar 
        
            ?>
          <div class="container-fluid">
            <div class="row top-buffer">
              <div class="col-9 rounded bg-beige1">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Home</li>
                      </ol>
                  </nav>
              </div>
              <!--END BREADCRUMB-->

              <?php  // add some php to deal with search querry
        
              ?>
              <div class="col-3">
                <div class="input-group">
                  <input type="search" class="form-control rounded-left" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <button type="button" class="btn bg-blue text-black">search</button>
                </div>
              </div>
            </div>
          </div>
          <!--END SEARCH-->

          <!--MAIN CONTAINER-->
      <div class="container-fluid">
            <div class="row top-buffer">

            <!--left container-->
              <div class="col-3 gx-5">
                <div class="row bg-beige1 rounded-top">
                  <h3 class="display-7 text-center">Categories</h1>
                </div>
                <div class="row bg-beige3 rounded-bottom min-vh-100">
                  <ul class="nav flex-column">

                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="category.php">SurfSpots</a>
                    </li>

                  </ul>
                </div>
              </div>
              <!-- end left contatiner-->

                <!-- post container  -->

                <div class="col-9 gx-5">

                  <!--post container header -->
                  <div class="row bg-beige1 rounded-top p-1">
                    <div class="col-2">
                    <button type="button" class="btn bg-blue d-inline">Create new post</button>
                  </div>
                  <div class="col-10">
                    <h3 class="display-7 text-center"> Recent Posts </h3>
                    
                  </div>
                </div>



                <div class="row border-beige1">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="display-7 text-left"><u><a href="post.php"> Post_Name </a></u></h3>
                      <p>surfBum69</p>
                    </div>
                    <!-- admin tools
                    <div class="col-2">
                      <a href="#">edit</a>
                      <a href="#">delete</a>
                    </div>
                     -->
                  </div>
                  <div class="row">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum porttitor dolor, et pretium urna volutpat sit amet. Nunc interdum faucibus lorem, vitae sollicitudin sem sodales quis. Maecenas pharetra metus eget magna pellentesque ultrices. Sed ut egestas lacus. Sed non nibh lectus. Integer a pharetra justo. Mauris egestas congue finibus. Cras malesuada tortor a mauris convallis lobortis. Aenean bibendum dui sit amet mi facilisis, quis viverra ipsum tincidunt. Pellentesque euismod tortor a ante mollis facilisis. Curabitur efficitur turpis vel nisl vehicula pellentesque. Quisque condimentum posuere neque nec posuere.

                      In viverra finibus est, in rutrum justo cursus id. Suspendisse faucibus, urna non pulvinar consectetur, mauris lorem convallis mi, a aliquet sapien tellus vitae justo. Aenean in nisi vel libero accumsan pellentesque. Nunc semper diam nisl, vestibulum efficitur nulla malesuada a. Morbi eu lectus congue, accumsan lacus id, dapibus sem. Quisque iaculis faucibus libero, non consequat ante venenatis ut. Suspendisse massa libero, hendrerit in elit sed, tempor facilisis quam. Vivamus consectetur ultricies eros, quis congue mi sollicitudin et. Etiam ut fringilla nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada magna a mi vulputate rutrum.
                      
                      Vivamus malesuada et eros a tristique. Morbi tempor, ligula id rhoncus fringilla, arcu est luctus nisl, et blandit odio turpis tincidunt libero. Sed vitae venenatis ipsum. Fusce vulputate commodo eros eu egestas. Fusce id metus eget ante euismod luctus at eget purus. Morbi mattis tempus augue, nec iaculis justo pellentesque hendrerit. Mauris lacinia sed nibh nec consectetur. Vivamus eget mauris in mauris commodo semper. Nunc quis erat vitae diam cursus tempor eget sit amet eros. Nullam ac purus orci. Donec ut leo placerat, sodales augue ac, luctus ipsum. Vestibulum dui tortor, rhoncus non maximus a, rutrum quis erat.
                      
                      Pellentesque a suscipit justo. Proin elementum quis justo sed tempus. Nunc nulla dui, accumsan sit amet placerat vitae, pretium eu justo. Sed pretium aliquet orci, maximus mattis nibh porttitor quis. Mauris eget sapien eu neque ullamcorper vehicula. Ut congue placerat commodo. Duis semper, nulla interdum consectetur lobortis, nulla eros tincidunt orci, non porttitor purus velit vel eros. Quisque ac lacus in est mattis mattis vel vel tellus. Donec a lobortis augue. Suspendisse in elementum ante. Integer convallis tellus et nunc efficitur congue. Morbi non lacinia quam, at sagittis ipsum. Maecenas posuere iaculis eros.
                      
                      Vestibulum posuere ante nec ante sagittis, a interdum mauris venenatis. Vivamus faucibus arcu nec sapien vulputate vulputate. Proin nec augue elementum, sagittis dolor non, tincidunt neque. Praesent elementum mauris nec massa sagittis, non cursus lorem consequat. Nulla erat arcu, dapibus ut enim non, luctus rhoncus dolor. Vestibulum enim erat, egestas ac imperdiet vel, placerat at leo. Donec iaculis orci eu lacus euismod sodales.
                    </p>
                  </div>
                </div>

                <div class="row border-beige1">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="display-7 text-left"><u><a href="post.php"> Post_Name_2 </a></u></h3>
                      <p>surfBum44</p>
                    </div>
                    <!-- admin tools
                    <div class="col-2">
                      <a href="#">edit</a>
                      <a href="#">delete</a>
                    </div>
                     -->
                  </div>
                  <div class="row">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum porttitor dolor, et pretium urna volutpat sit amet. Nunc interdum faucibus lorem, vitae sollicitudin sem sodales quis. Maecenas pharetra metus eget magna pellentesque ultrices. Sed ut egestas lacus. Sed non nibh lectus. Integer a pharetra justo. Mauris egestas congue finibus. Cras malesuada tortor a mauris convallis lobortis. Aenean bibendum dui sit amet mi facilisis, quis viverra ipsum tincidunt. Pellentesque euismod tortor a ante mollis facilisis. Curabitur efficitur turpis vel nisl vehicula pellentesque. Quisque condimentum posuere neque nec posuere.

                      In viverra finibus est, in rutrum justo cursus id. Suspendisse faucibus, urna non pulvinar consectetur, mauris lorem convallis mi, a aliquet sapien tellus vitae justo. Aenean in nisi vel libero accumsan pellentesque. Nunc semper diam nisl, vestibulum efficitur nulla malesuada a. Morbi eu lectus congue, accumsan lacus id, dapibus sem. Quisque iaculis faucibus libero, non consequat ante venenatis ut. Suspendisse massa libero, hendrerit in elit sed, tempor facilisis quam. Vivamus consectetur ultricies eros, quis congue mi sollicitudin et. Etiam ut fringilla nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada magna a mi vulputate rutrum.
                      
                      Vivamus malesuada et eros a tristique. Morbi tempor, ligula id rhoncus fringilla, arcu est luctus nisl, et blandit odio turpis tincidunt libero. Sed vitae venenatis ipsum. Fusce vulputate commodo eros eu egestas. Fusce id metus eget ante euismod luctus at eget purus. Morbi mattis tempus augue, nec iaculis justo pellentesque hendrerit. Mauris lacinia sed nibh nec consectetur. Vivamus eget mauris in mauris commodo semper. Nunc quis erat vitae diam cursus tempor eget sit amet eros. Nullam ac purus orci. Donec ut leo placerat, sodales augue ac, luctus ipsum. Vestibulum dui tortor, rhoncus non maximus a, rutrum quis erat.
                      
                      Pellentesque a suscipit justo. Proin elementum quis justo sed tempus. Nunc nulla dui, accumsan sit amet placerat vitae, pretium eu justo. Sed pretium aliquet orci, maximus mattis nibh porttitor quis. Mauris eget sapien eu neque ullamcorper vehicula. Ut congue placerat commodo. Duis semper, nulla interdum consectetur lobortis, nulla eros tincidunt orci, non porttitor purus velit vel eros. Quisque ac lacus in est mattis mattis vel vel tellus. Donec a lobortis augue. Suspendisse in elementum ante. Integer convallis tellus et nunc efficitur congue. Morbi non lacinia quam, at sagittis ipsum. Maecenas posuere iaculis eros.
                      
                      Vestibulum posuere ante nec ante sagittis, a interdum mauris venenatis. Vivamus faucibus arcu nec sapien vulputate vulputate. Proin nec augue elementum, sagittis dolor non, tincidunt neque. Praesent elementum mauris nec massa sagittis, non cursus lorem consequat. Nulla erat arcu, dapibus ut enim non, luctus rhoncus dolor. Vestibulum enim erat, egestas ac imperdiet vel, placerat at leo. Donec iaculis orci eu lacus euismod sodales.
                    </p>
                  </div>
                </div>

                

              </div>
            </div>
          </div>
        </div>
        </main>

        <?php
include_once 'footer.php';
?>