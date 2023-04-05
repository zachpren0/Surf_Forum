<?php
include_once 'header.php';
?>

<main>
          <div class="container-fluid">
            <div class="row top-buffer">
                <div class="col-9 rounded bg-beige1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </nav>
                </div>
                    <div class="col-3">
                        <div class="input-group">
                          <form action="search.php" method="post">
                            <input type="search" name="search" class="form-control rounded-left" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" name="submit" class="btn bg-blue text-black">search</button>
                          </form>  
                      </div>
                    </div>
          </div>
      </div>
      <div class="container-fluid">
            <div class="row top-buffer">

            <?php
              include_once 'categoryList.php';
            ?>

            <div class="col-9 gx-5">
                  <div class="row bg-beige1 rounded-top p-1">
                    <div class="col-10">
                      <h3 class="display-7 text-center"> Welcome </h3>
                    </div>
                  </div>
                <div class="row border-beige1">
                  <div class="row">
                    <div class="col-10">
                      <p>
                      Welcome to our surf blog, the ultimate destination for all surf enthusiasts!
                      Our blog features the latest news, tips, and insights on the world of surfing.
                      We cover everything from the best surf spots around the globe, to the latest gear and technology, to interviews with pro surfers.
                      Whether you're a beginner or an experienced surfer, our blog has something for everyone.
                      Join our community of surfers and stay up-to-date with the latest trends and developments in the world of surfing.
                      </p>
                      <img src="https://ec2-im-1.msw.ms/md/image.php?key=DSC00216gmc.jpg&type=EE_COVER&resize_type=COVER" width="1000"/>
                      <p>
                      Check out our current message boards in the left sidebar, or you can search for posts in the top right corner.
                      </p>
                    </div>
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