  <title>Admin Dashboard | Beam</title>
  <style>
  table {
    border: none;
  }
    #groupcode {
      text-align: center;
    }
    .mdl-button.card-btn {
      width: 100%;
      line-height: 48px;
      height: 48px;
    }
    .card-btn.mdl-button:hover {
      background-color: rgba(255, 255, 255, 0.25);
    }
    .counter {
      text-align: right !important;
      vertical-align: middle !important;
    }
    .mdl-card__actions {
      padding: 0;
    }
    .mdl-cell.card-btn {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body class="mdl-color--grey-100">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
  <header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row">
      <span class="logo">
        <a class="text-dark mdl-layout-title">beam</a>
      </span>

      <div class="mdl-layout-spacer"></div>

      <button id="user_menu" class="mdl-layout--large-screen-only text-dark mdl-button mdl-js-button mdl-button-flat">
        Hello <?php echo ' <span class="mdl-color-text--blue">'.$this->session->userdata('first_name').'</span>'; ?><i class="material-icons">expand_more</i>
      </button>

      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="user_menu">
        <a href="dashboard">
          <li class="mdl-menu__item mdl-color-text--white mdl-color--blue"><i style="vertical-align: middle !important" class="material-icons">dashboard</i> Dashboard</li>
        </a>
        <a href="profile">
          <li class="mdl-menu__item"><i style="vertical-align: middle !important" class="material-icons">account_box</i> Profile</li>
        </a>
        <a href="logout">
          <li class="mdl-menu__item mdl-color-text--red"><i style="vertical-align: middle !important" class="material-icons">exit_to_app</i> Logout</li>
        </a>
      </ul>

    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Navigation</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link mdl-color-text--white mdl-color--blue" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
      <a class="mdl-navigation__link mdl-color-text--black" href="<?php echo base_url('admin/profile') ?>">Profile</a>
      <a class="mdl-navigation__link mdl-color-text--black" href="<?php echo base_url('admin/logout') ?>">Logout</a>
    </nav>
  </div>
    <main class="mdl-layout__content">
      <div class="page-content">
        <div class="mdl-grid">

          <div class="mdl-cell mdl-cell--12-col"></div>

          <div class="mdl-color-text--white mdl-color--indigo mdl-cell mdl-cell--2-col-phone mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--indigo-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-color-text--white mdl-card__title-text">Total Students</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">school</i>
            </div>
            <div class="mdl-grid counter">
              <h1 class="mdl-cell mdl-cell--12-col mdl-cell--stretch mdl-cell--right">
                <?php echo $this->student_model->getCount() ?>
              </h1>
            </div>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="view_all/students">Student Management Panel</a>
            </div>
          </div>

          <div class="mdl-color-text--white mdl-color--red mdl-cell mdl-cell--2-col-phone mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--red-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-color-text--white mdl-card__title-text">Total Teachers</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">work</i>
            </div>
            <div class="mdl-grid counter">
              <h1 class="mdl-cell mdl-cell--12-col mdl-cell--stretch mdl-cell--right">
                <?php echo $this->teacher_model->getCount() ?>
              </h1>
            </div>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="view_all/teachers">Teacher Management Panel</a>
            </div>
          </div>

          <div class="mdl-color-text--white mdl-color--green mdl-cell mdl-cell--2-col-phone mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--green-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-color-text--white mdl-card__title-text">Total Events</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">event</i>
            </div>
            <div class="mdl-grid counter">
              <h1 class="mdl-cell mdl-cell--12-col mdl-cell--stretch mdl-cell--right">
                <?php echo $this->event_model->getCount() ?>
              </h1>
            </div>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="view_all/events">Event Management Panel</a>
            </div>
          </div>

          <div class="mdl-color-text--white mdl-color--blue mdl-cell mdl-cell--2-col-phone mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--blue-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-card__title-text">Total Polls</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">poll</i>
            </div>
            <div class="mdl-grid counter">
              <h1 class="mdl-cell mdl-cell--12-col mdl-cell--stretch mdl-cell--right">
                <?php echo $this->poll_model->getCount() ?>
              </h1>
            </div>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="view_all/polls">View Polls</a>
            </div>
          </div>

        </div>

        <div class="mdl-grid">

          <div class="mdl-color--purple mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--purple-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-card__title-text">System Log</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">assignment</i>
            </div>
            <?php $pending = $this->db->select('username, action, timestamp, l.id')->from('logs_admin_actions l')->join('accounts_admins a', 'l.admin_id = a.id')->order_by('timestamp', 'desc')->limit(5)->get()->result();
            if($pending) { ?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
              <tbody>
              <?php
                foreach ($pending as $user) {
              ?>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->action ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php $d = strtotime($user->timestamp); echo date('m-d-y h:i:s:A',$d); ?>
                  </td><!-- 
                  <td class="mdl-data-table__cell--non-numeric">
                    <a href="<?php echo base_url('admin/view/log/'.$user->id."?v=".md5($user->id+$_SESSION['id'])); ?>">Details</a>
                  </td> -->
                </tr>
            <?php
              }
            ?>
              </tbody>
            </table>
            <?php }else { echo '<span class="mdl-color-text--white mdl-typography--text-center"><br><h5>No Recent Activity</h5><br></span>'; } ?>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo base_url('admin/view/logs') ?>">View All</a>
            </div>
          </div>

          <div class="mdl-color--pink mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--pink-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-card__title-text">Quick Links</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">flash_on</i>
            </div>
            <div class="mdl-grid" style="width: 90%">
              <div class="mdl-cell mdl-cell--12-col"></div>

              <a style="border: 1px solid" href="<?php echo base_url('admin/create/event') ?>" class="mdl-cell--3-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect"><i class="material-icons">event</i> Event</a>

              <a style="border: 1px solid" href="<?php echo base_url('admin/signup') ?>" class="mdl-cell--3-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect"><i class="material-icons">person_add</i> Admin</a>

              <a style="border: 1px solid" href="<?php echo base_url('teacher/signup') ?>" class="mdl-cell--3-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect"><i class="material-icons">work</i> Teacher</a>

              <a style="border: 1px solid" href="<?php echo base_url('student/signup') ?>" class="mdl-cell--3-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect"><i class="material-icons">school</i> Student</a>
<!-- 
              <a style="border: 1px solid; height: auto" href="<?php echo base_url('admin/manage') ?>" class="mdl-cell--4-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect"><i class="material-icons">person</i> Admin Management</a> -->

<!--               <a style="border: 1px solid; height: auto" href="<?php echo base_url('admin/manage') ?>" class="mdl-cell--6-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect">Batch Student Signup</a>

              <a style="border: 1px solid; height: auto" href="<?php echo base_url('admin/manage') ?>" class="mdl-cell--6-col-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button mdl-js-ripple-effect">Batch Teacher Signup</a> -->

              <div class="mdl-cell mdl-cell--12-col"></div>              
            </div>
          </div>

          <div style="height: 100%" class="mdl-color--grey mdl-cell mdl-cell--2-col-phone mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-card__title-text">Pending Accounts</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">vpn_lock</i>
            </div>
            <?php $pending = $this->account_model->fetchPending();
            if($pending) { ?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">Phone Number</th>
                  <th class="mdl-data-table__cell--non-numeric">Verification Code</th>
                  <th class="mdl-data-table__cell--non-numeric">Account</th>
                  <th class="mdl-data-table__cell--non-numeric">Status</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($pending as $user) { ?>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->phone_number ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->verification_code ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $userType = $this->account_model->getUsertype($user->phone_number); ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->sent == 1 ? 'Verification Code Sent' : 'Pending' ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php }else { echo '<span class="mdl-color-text--white mdl-typography--text-center"><br><h5>No Pending Accounts</h5><br></span>'; } ?>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo base_url('admin/view/accounts/pending') ?>">View All</a>
            </div>
          </div>
          
          <div style="height: 100%" class="mdl-color--blue-grey mdl-cell mdl-cell--2-col-phone mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-shadow--4dp mdl-card">
            <div class="mdl-color--blue-grey-700 mdl-color-text--white mdl-card__title">
              <h2 class="mdl-card__title-text">Pending Requests</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">feedback</i>
            </div>
            <?php $requests = $this->log_model->fetchRequests();
            if($requests) { ?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">Code</th>
                  <th class="mdl-data-table__cell--non-numeric">Keyword</th>
                  <th class="mdl-data-table__cell--non-numeric">Message</th>
                  <th class="mdl-data-table__cell--non-numeric">Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($requests as $user) {
                  $teacher = $this->teacher_model->fetch($user->teacher_id);
              ?>
                <tr>
                  <td class="table-action mdl-data-table__cell--non-numeric">
                    <?php echo "ID# ".$teacher->username." (".$teacher->phone_number.")" ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->keyword ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo $user->message ?>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <?php echo ucfirst($user->status) ?>
                  </td>
                </tr>
            <?php
              }
            ?>
              </tbody>
            </table>
            <?php }else { echo '<span class="mdl-color-text--white mdl-typography--text-center"><br><h5>No Pending Requests</h5><br></span>'; } ?>
            <div class="mdl-card__actions mdl-card--border">
               <a class="card-btn mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo base_url('admin/view/requests/pending') ?>">View All</a>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>
