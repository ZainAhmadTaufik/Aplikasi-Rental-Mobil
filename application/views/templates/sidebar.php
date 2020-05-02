       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="sidebar-brand-icon">
                   <i class="fas fa-car"></i>
               </div>
               <div class="sidebar-brand-text mx-3">Rental Mobil</div>
           </a>

           <!-- Divider -->
           <hr class="sidebar-divider">
           <div class="sidebar-heading">
               admin
           </div>

           <!-- Nav Item - Dashboard -->
           <li class="nav-item">
               <a class="nav-link" href="index.html">
                   <i class="fas fa-fw fa-tachometer-alt"></i>
                   <span>Dashboard</span></a>
           </li>

           <!-- Divider -->
           <hr class="sidebar-divider">

           <!-- kueri menu -->
           <?php
            $role_id = $this->session->userdata('role_id');
            $querymenu = "SELECT `menu_user`. `id`, `menu`
                        FROM `menu_user` JOIN `user_access_menu`
                        ON `menu_user`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
            $menu = $this->db->query($querymenu)->result_array();

            ?>

           <!-- Heading -->
           <?php foreach ($menu as $m) : ?>
               <div class="sidebar-heading">
                   <?= $m['menu']; ?>
               </div>

               <?php
                $menuID = $m['id'];
                $querysubmenu = "SELECT * FROM `user_sub_menu` JOIN `menu_user` ON `user_sub_menu`.`menu_id` = `menu_user`.`id` WHERE `user_sub_menu`.`menu_id` = $menuID AND `user_sub_menu`.`is_active` = 1";
                $subMenu = $this->db->query($querysubmenu)->result_array();
                ?>
               <?php foreach ($subMenu as $sm) : ?>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url($sm['url']) ?>">
                           <i class="<?= base_url($sm['icon']) ?>fas fa-fw fa-user-tie"></i>
                           <span><?= base_url($sm['title']) ?></span></a>
                   </li>

               <?php endforeach; ?>
               <!-- Divider -->
               <hr class="sidebar-divider d-none d-md-block">
           <?php endforeach; ?>

           <li class="nav-item">
               <a class="nav-link" href="<?= ('auth/logout'); ?>">
                   <i class="fas fa-fw  fa-sign-out-alt"></i>
                   <span>Logout</span></a>
           </li>



           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

       </ul>
       <!-- End of Sidebar -->