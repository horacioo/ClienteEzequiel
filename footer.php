<script src="<?php echo tema; ?>/javascript/jquery.slim.min.js"></script>



<?php
if (is_home()) {
    echo '
       <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

       ';
    echo "<script src='" . tema . "/javascript/slickAtribuicoes.js'></script>";
}
?>



<?php wp_footer(); ?>

</body>

</html>