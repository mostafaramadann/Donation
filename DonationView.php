<?php
require_once ("IView.php");
class DonationView implements IView
{
private $string;
    function showView($records)
    {
        echo "
        <link rel='stylesheet' href='CSS/Register.css'>
<br class=\"container\">
    <div class=\"price\">
    </br>
    </br>
        <h1>Thank you for your Donation!</h1>
    </div>
    <form method='post'>
    <div class=\"card__container\">
        <div class=\"card\">
            <div class=\"row credit\">
                <div class=\"left\">
                    <input id=\"cd\" type=\"radio\" name='visa' />
                    <div class=\"radio\"></div>
                    <label for=\"cd\">Debit/ Credit Card</label>
                </div>
                <div class=\"right\">
                </div>
            </div>
            
            <div class=\"row number\">
                <div class=\"info\">
                    <label for=\"cardnumber\">Card number</label>
                    <input id=\"cardnumber\" name='cardnumber' type=\"text\" pattern=\"[0-9]{16,19}\" maxlength=\"19\" placeholder=\"8888-8888-8888-8888\"/>
                </div>
            </div>
            <div class=\"row details\">
                <div class=\"left\">
                    <label for=\"expiry-date\">Expiry</label>
                    <select id=\"expiry-date\" name='expm'>
                        <option>MM</option>
                        <option value=\"1\">01</option>
                        <option value=\"2\">02</option>
                        <option value=\"3\">03</option>
                        <option value=\"4\">04</option>
                        <option value=\"5\">05</option>
                        <option value=\"6\">06</option>
                        <option value=\"7\">07</option>
                        <option value=\"8\">08</option>
                        <option value=\"9\">10</option>
                        <option value=\"11\">11</option>
                        <option value=\"12\">12</option>
                    </select>
                    <span>/</span>
                     <select id=\"expiry-date\" name='expy'>
                        <option>YYYY</option>
                        <option value=\"2016\">2016</option>
                        <option value=\"2017\">2017</option>
                        <option value=\"2018\">2018</option>
                        <option value=\"2019\">2019</option>
                        <option value=\"2020\">2020</option>
                        <option value=\"2021\">2021</option>
                        <option value=\"2022\">2022</option>
                        <option value=\"2023\">2023</option>
                        <option value=\"2024\">2024</option>
                        <option value=\"2025\">2025</option>
                        <option value=\"2026\">2026</option>
                        <option value=\"2027\">2027</option>
                        <option value=\"2028\">2028</option>
                        <option value=\"2029\">2029</option>
                        <option value=\"2030\">2030</option>
                    </select>
                </div>
                <div class=\"right\">
                    <label for=\"cvv\">CVC/CVV</label>
                    <input type=\"text\" name='CVC'maxlength=\"4\" placeholder=\"123\"/>
                    <span data-balloon-length=\"medium\" data-balloon=\"The 3 or 4-digit number on the back of your card.\" data-balloon-pos=\"up\"></span>
                    </br>
                    <label>Donation Amount</label>
                   <input type='number' name='visaamount'>
              
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
    <div>
    <h2>Cash Donation</h2>
    <label>Cash</label>
    <input type='radio'name='cash'>
    <input type='number' name='cashamount'>
   
    </div>
    <div class=\"button\">
        <button name='submit' type=\"submit\"><i class=\"ion-locked\"></i> Confirm and Donate</button>
    </div>
     </form>
</div>";
    }
}
?>
