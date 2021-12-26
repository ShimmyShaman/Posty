<?php
    echo "<h2>Signed Up: " . strval($tourny->participants()->count()) . "</h2>";
?>

@auth
<?php
    if($already_signed_up) {
        echo "<h3>You are signed up!</h3>";
    } else {
        echo "<form action=\"\" method=\"POST\">";
        echo "  <input type=\"hidden\" name=\"_token\"";
        echo "     value=\"" . csrf_token() . "\">";
        echo "  <input type=\"hidden\" name=\"tid\"";
        echo "    value=\"" . strval($tourny->id) . "\">";
        echo "  <input type=\"submit\" value=\"Signup\">";
        echo "</form>";
    }
?>
@else
<h4>Login or register to sign up</h4>
@endauth