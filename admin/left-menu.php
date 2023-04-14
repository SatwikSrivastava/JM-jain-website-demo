<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="dashboard.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">CMS</span>
        </a>
    </div>


    <div class="menu-divider mt-0  ">
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <li class="menu-item" style="color:#6557e8;"><b><i>Welcome</i></b></li>
        <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);?>
        <!-- Dashboards -->
        <li class="menu-item <?= $page == 'dashboard.php' ? 'active':''?>">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="<?php echo $_SESSION['username'];?>"><?php echo $_SESSION['username'];?></div>
            </a>
        </li>

        <li class="menu-item <?= $page == 'banner.php' ? 'active':''?>">
            <a href="banner.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Home Banner">Home Banner</div>
            </a>
        </li>

        <li class="menu-item <?= $page == 'blog.php' ? 'active':''?>">
            <a href="blog.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Product &amp; Service</span></li>
        <li class="menu-item <?= $page == 'main-cat.php' ? 'active':''?>">
            <a href="main-cat.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                <div data-i18n="Main Category">Main Category</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'man.php' ? 'active':''?>">
            <a href="man.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                <div data-i18n="Man Category">Man Category</div>
            </a>
        </li>

        <li class="menu-item <?= $page == 'sub-category.php' ? 'active':''?>">
            <a href="sub-category.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Sub-Category">Sub-Category</div>
            </a>
        </li>

        <li class="menu-item <?= $page == 'category.php' ? 'active':''?>">
            <a href="category.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Category Management">Category Management</div>
            </a>
        </li>

        <li class="menu-item <?= $page == 'product.php' ? 'active':''?>">
            <a href="product.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Product">Product</div>
            </a>
        </li>

        <!-- Account -->
        <li class="menu-item <?= $page == 'user-profile.php' ? 'active':''?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-check-shield'></i>
                <div data-i18n="Profile">Profile</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $page == 'user-profile.php' ? 'active':''?>">
                    <a href="user-profile.php" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-user'></i>
                        <div data-i18n="My Profile">My Profile</div>
                    </a>
                </li>
                <li class="menu-item <?= $page == 'account-settings.php' ? 'active':''?>">
                    <a href="account-settings.php" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-cog'></i>
                        <div data-i18n="Setting">Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="logout.php" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-power-off'></i>
                        <div data-i18n="Logout">Logout</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>