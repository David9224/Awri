<?php
    session_start();
    session_destroy();
    echo '<script>window.location="/Proyecto/index.php"</script>';
?>