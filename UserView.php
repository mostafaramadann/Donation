<?php
require_once ("IView.php");
class UserView implements IView
{
    public function showView($records)
    {
        echo "
        </br>
        </br>
        </br>
        </br>
            <html lang='en'>
              <body>
              <form method='post'>
              </br>
              <label>Change Password</label>
              <input type='password' name='pass'>
              </br>
              <label> rewritepassword</label>
              <input type='password' name='pass2'>
              </br>
              <label>Change Username</label>
              <input type='text' name='uname'>
              </br>
              <label>rewrite username</label>
              <input type='text' name='uname2'>
              </br>
              <button type='submit' name='submit'> Change </button>
              </br>
              <button type='submit' name='del'>Delete Account</button>
              </form>
              </body>
              </html>";

    }
}
?>
