<?php 
include('../includes/header.php') 
?>

<style>

    /* Modal content spacing */
    .modal-action {
    display: flex;
    flex-direction: column;
    gap: 12px;
    }

    /* Input styling */
    .input.input-ghost {
    width: 100%;
    padding: 12px 14px;
    border: 2px solid #e2e2e2;
    border-radius: 8px;
    font-size: 15px;
    outline: none;
    transition: 0.3s;
    margin-bottom: 8px;
    }

    /* Input focus effect */
    .input.input-ghost:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 6px rgba(74, 144, 226, 0.4);
    }

    /* Signup button */
    .btn.--btn-signup {
    width: 100%;
    background: #4a90e2;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
        }

        /* Signup hover effect */
    .btn.--btn-signup:hover {
    background: #357ABD;
    transform: translateY(-2px);
    }       

    b{
    font-size:3rem;
    }
    h3{
    font-size:2rem;
    }


</style>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
            <c>
            <h3 class="text-lg font-bold">Sign up!</h3></c>
            <div class="modal-action">
                <form method="dialog">
                    <input type="text" placeholder="Your Email" id="email" class="input input-ghost" >
                    <input type="password" placeholder="Your password" id="password" class="input input-ghost" >
                    <br>
                    <a href="login.php">Already has an account?</a>
                    <br><br>
                    
                    <button class="btn --btn-signup">Signup</button>
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">


            <b>
            <a href="home1.php">CRAVECART</a>
            </b>
            
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">

                <li>
                    <!-- <details>
                        <summary>Menu</summary>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </details> -->
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn" onclick="my_modal_1.showModal()">Order Now!</a>
        </div>
    </div>


          <div id="item4" class="carousel-item w-ful">
            <img
                src="https://tse4.mm.bing.net/th/id/OIP.2r7T-ruG7_DI_PA0QMut-AHaD0?rs=1&pid=ImgDetMain&o=7&rm=3"
                class="w-full" />
                
        </div>
<!-- 
<figure class="hover-gallery max-w-60">
  <img src="https://www.thespruceeats.com/thmb/PafrpG1KT9IJhujsmD2z6-S0dIE=/5907x3943/filters:fill(auto,1)/classic-southern-fried-chicken-3056867-hero-01-f3114f52f67b4dfe8da551cc6b623b73.jpg" />
  <img src="https://img.daisyui.com/images/stock/daisyui-hat-2.webp" />
  <img src="https://img.daisyui.com/images/stock/daisyui-hat-3.webp" />
  <img src="https://img.daisyui.com/images/stock/daisyui-hat-4.webp" />
</figure> -->
         
   <?php include('../includes/footer.php') ?>