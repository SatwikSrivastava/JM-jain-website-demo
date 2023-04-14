    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <h2><a class="navbar-brand active" href="index.php">JM - JAIN</a></h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">JM - JAIN</h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'index.php' ? 'active':''?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'about.php' ? 'active':''?>" href="about.php">About-Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'blog.php' ? 'active':''?>" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'contact.php' ? 'active':''?>" href="contact.php">Contact-Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'cart.php' ? 'active':''?>" href="cart.php">Cart</a>
                    </li>                
                </ul>
            </div>
            </div>
        </div>
    </nav>