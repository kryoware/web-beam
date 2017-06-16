<title>Student Management Panel | Beam</title>
</head>
<body class="mdl-color--grey-100">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
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
      <a href="<?php echo base_url('admin/dashboard') ?>">
        <li class="mdl-menu__item"><i style="vertical-align: middle !important" class="material-icons">dashboard</i> Dashboard</li>
      </a>
      <a href="<?php echo base_url('admin/profile') ?>">
        <li class="mdl-menu__item"><i style="vertical-align: middle !important" class="material-icons">account_box</i> Profile</li>
      </a>
      <a href="<?php echo base_url('admin/logout') ?>">
        <li class="mdl-menu__item mdl-color-text--red"><i style="vertical-align: middle !important" class="material-icons">exit_to_app</i> Logout</li>
      </a>
    </ul>

  </div>
</header>
<div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--white">
  <span class="mdl-layout-title mdl-color--blue-grey-800">Navigation</span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/manage') ?>">
      <i style="vertical-align: middle !important"  class="material-icons">person</i> Admins
    </a>
    <a class="mdl-navigation__link mdl-color-text--white mdl-color--indigo" href="<?php echo base_url('admin/view_all/students') ?>">
      <i class="material-icons">school</i> Students
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/teachers') ?>">
      <i class="material-icons">work</i> Teachers
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/events') ?>">
      <i class="material-icons">event</i> Events
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/polls') ?>">
      <i class="material-icons">poll</i> Polls
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view/requests/pending') ?>">
      <i class="material-icons">feedback</i>  Requests
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view/accounts/pending') ?>">
      <i class="material-icons">vpn_lock</i> Verification
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view/logs') ?>">
      <i class="material-icons">assignment</i> System Logs
    </a>
  </nav>
</div>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="mdl-grid">
<!-- 
        <section class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">

          <div class="mdl-card__title mdl-color--blue-grey-600 mdl-color-text--white">
            <h2 class="mdl-card__title-text">Options</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">school</i>
          </div>

            <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-desktop">
              <button class="mdl-cell mdl-cell--4-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                New Student
              </button>
              <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                Batch Signup
              </button>
            </div>

            <span style="width: auto; border: 1px solid" class="mdl-cell mdl-cell--2-col mdl-cell--2-col-desktop">
              Search
              <form action="#">
                <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input" type="text" id="sample1" name="q">
                  <label class="mdl-textfield__label" for="sample1">Text...</label>
                </div>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  Search
                </button>
              </form>
            </span>

            <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-desktop">
              Sort

            </div>

            <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-desktop">
              Filter(s):
              Show only:
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">BA</span>
              </label>
              
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">CR</span>
              </label>
              
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">ED</span>
              </label>
              
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">IT</span>
              </label>

              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">ALL</span>
              </label>
              IT
              BA
              ED
              CR
              All

              Show only:
              1st Year
              2nd Year
              3rd Year
              4th Year
              All

              Show only:
              Active
              All
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                  Apply
                </button>
            </div>

        </section> -->

        <section class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">

          <div class="mdl-card__title mdl-color--indigo-600 mdl-color-text--white">
            <h2 class="mdl-card__title-text">All Students</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">school</i>
          </div>

          <?php if($data) { ?>
          <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Name</th>
                <th class="mdl-data-table__cell--non-numeric">ID Number</th>
                <th class="mdl-data-table__cell--non-numeric">Phone Number</th>
                <th class="mdl-data-table__cell--non-numeric">Course</th>
                <th class="mdl-data-table__cell--non-numeric">Year</th>
                <th class="mdl-data-table__cell--non-numeric">Status</th>
                <th class="mdl-data-table__cell--non-numeric"></th>
                <th class="mdl-data-table__cell--non-numeric"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $student) { ?>
              <tr>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $student->last_name.', '.$student->first_name." ".$student->middle_name[0]."." ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $student->username ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo substr($student->phone_number, 0, 6).'****'.substr($student->phone_number, 10, 3) ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $student->course ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $student->year_level;
                  switch ($student->year_level) {
                    case '1':
                      echo "st Year";
                      break;
                    case '2':
                      echo "nd Year";
                      break;
                    case '3':
                      echo "rd Year";
                      break;
                    default:
                      echo "th Year";
                      break;
                  }
                   ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $student->active ? 'Active' : 'Disabled' ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <a href="<?php echo base_url('admin/view/student/'.$student->id.'?v='.md5($student->id+$_SESSION['id'])) ?>" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-color-text--indigo">View</a>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <a href="<?php echo base_url('admin/delete/student/'.$student->id.'?d='.md5($student->id+$_SESSION['id'])) ?>" onclick="return confirm('Delete this student\'s account?\n\nTHIS ACTION CANNOT BE UNDONE')" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-color-text--red">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php }else { echo '<span class="mdl-cell mdl-cell--12-col"><h5 class="mdl-color-text--grey mdl-typography--text-center">Nothing to see here</h5></span>'; } ?>
        </section>

      </div>
    </div>
  </main>
</div>
