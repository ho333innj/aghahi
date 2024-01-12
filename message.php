

<?php
if (isset($_SESSION['message'])) {
    echo '<div class="message-box">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
?>