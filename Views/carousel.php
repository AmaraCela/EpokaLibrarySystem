<?php 
include "../Model/connection.php";

$query = "SELECT * FROM books WHERE Genre IN (SELECT Genre FROM books WHERE BookId IN(SELECT BookId FROM favorites 
WHERE id = {$_SESSION['id']}))";
$books = $db->query($query);
$row=$books->fetch_assoc();
?>
<div class="carousel">
    <div class="carousel__body">
      <div class="Sug">
        <h5>Suggested for you</h5>
      </div>
        <div class="carousel__slider">
            <?php
            while($row=$books->fetch_assoc())
            {
              echo "
            <div class='carousel__slider__item'>
                <div class='item__3d-frame'>
                    <div class='item__3d-frame__box item__3d-frame__box--front'>
                        <a href='./readMoreFavorites.php?title=".$row['Title']."'><img src='data:image/png;base64," . base64_encode($row['Image']) . "'></a>
                    </div>
                    <div class='item__3d-frame__box item__3d-frame__box--left'></div>
                    <div class='item__3d-frame__box item__3d-frame__box--right'> </div>
                </div>
            </div>";  
            }
            ?>
            
            <!-- <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <a href="./readMoreFavorites.php"><img src="../assets/images/broken.jpeg"></a>
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/thief.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/lord.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/neck.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/poter.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/neck.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                      <img src="../assets/images/thief.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                        <img src="../assets/images/neck.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div>
            <div class="carousel__slider__item">
                <div class="item__3d-frame">
                    <div class="item__3d-frame__box item__3d-frame__box--front">
                        <img src="../assets/images/poter.jpg">
                    </div>
                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                </div>
            </div> -->
        </div>
        <div class="carousel__prev"><img src="../assets/images/noun-previous-1153682.png" style="width: 50px; height:50px; margin-bottom: 10px;"></div>
        <div class="carousel__next"><img src="../assets/images/noun-next-1153682.png" style="width: 50px; height:50px; margin-bottom: 10px;"></div>
    </div>
</div>
<script src="../Controller/carCon.js"></script>