<!DOCTYPE html>
<html lang="en">

<h2>Create account</h2>
<p><h3>Type in your details above to register your account!</h3>

<form action="index.php" method="POST">
    <div class="form-group">
        <label for="First_name">First name</label>
        <input name="register[first_name]" class="form-control" type="text" required>
    </div>
    <div class="form-group">
        <label for="Surname">Surname</label>
        <input name="register[surname]" class="form-control" type="text" required>
    </div>
    <p>
    <div class="form-group">
        <label for="Username">Username</label>
        <input name="register[username]" class="form-control" type="text" required>
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input name="register[email]" class="form-control" type="text" required>
    </div>
    <p>
    <div class="form-group">
        <label for="Password">Password</label>
        <input name="register[password]" class="form-control" type="password" required>
    </div>
    <p>
    <input type="submit" value="Create account">
    <button onclick="window.location.href='login_form.html'">Go back</button>
</form>