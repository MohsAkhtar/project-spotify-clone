<?php include("includes/header.php"); ?>
    <h1 class="pageHeadingBig">You Might Also Like</h1>
    <div class="gridViewContainer">
        <?php
            // making the albums return in a random order - RAND() and LIMIT by 10 albums shown
            $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

            // return array of albums
            while($row = mysqli_fetch_array($albumQuery)){
                // using a '.' in php means append string
                echo "<div class='gridViewItem'>
                        <a href='album.php?id=" . $row['id'] . "'>
                            <img src='" . $row['artworkPath'] ."'>
                            <div class='gridViewInfo'>"
                                . $row['title'] .
                            "</div>
                        </a>
                    </div>";
            }
        ?>
    </div>
<?php include("includes/footer.php"); ?>

               