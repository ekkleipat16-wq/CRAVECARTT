<?php
include('../includes/header.php');
?>

<style>

center {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;
}

label.input {
    display: block;
    width: 300px;
    margin-bottom: 15px;
}



label.input input.grow:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
}

.btn.--btn-login {
    width: 300px;
    padding: 12px;
    background: #4a90e2;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}


.btn.--btn-login:hover {
    background: #357ABD;
    transform: translateY(-2px);
}






</style>

<center>
    <br>
    <label class="input">
        <input type="text" class="grow" id="login_email" placeholder="Enter you Email" />
    </label>
    <label class="input">
        <input type="password" class="grow" id="login_password" placeholder="Enter you Password" />
    </label>
    <button class="btn --btn-login">Login</button><br><br>
    
</center>



<?php include('../includes/footer.php') ?>