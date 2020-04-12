<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardSideNav">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
        <li id="userSideNav">
          <a href="<?php echo base_url('users') ?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <?php endif; ?>
        
        <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
        <li id="vihicleSideNav">
          <a href="<?php echo base_url('vehicle') ?>">
            <i class="fa fa-car"></i> <span>Vehicle</span>
          </a>
        </li>
        <?php endif; ?>

        <?php if(in_array('createEvent', $user_permission) || in_array('updateEvent', $user_permission) || in_array('viewEvent', $user_permission) || in_array('deleteEvent', $user_permission)): ?>
        <li id="eventSideTree">
          <a href="<?php echo base_url('events') ?>">
            <i class="fa fa-calendar"></i> <span>Event</span>
          </a>
        </li>
        <?php endif; ?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
    
  </aside>