<title>View Student Information | Beam</title>
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
    <a class="mdl-navigation__link mdl-color-text--white mdl-color--blue" href="<?php echo base_url('admin/view_all/students') ?>">
      <i class="material-icons">school</i> Students
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/students') ?>">
      <i class="material-icons">work</i> students
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/events') ?>">
      <i class="material-icons">event</i> Events
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/polls') ?>">
      <i class="material-icons">poll</i> Polls
    </a>
  </nav>
</div>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="mdl-grid">
        <section class="mdl-cell mdl-cell--12-col"></section>
        <section class="mdl-cell mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop mdl-card mdl-shadow--4dp mdl-cell--3-offset-desktop ">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Student Information</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">school</i>
          </div>
          <?php echo form_open('admin/edit/student', 'class="mdl-grid"');
                echo form_hidden('student_id', $student->id);?>
            <?php echo '<div class="mdl-cell mdl-cell--12-col mdl-cell--10-col-desktop mdl-cell--1-offset-desktop form-error">'.validation_errors()."</div>" ?>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--2-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input disabled readonly value="<?php echo $student->verified_user ? 'Verified':'Pending' ?>" class="mdl-textfield__input" type="text" id="verified">
              <label class="mdl-textfield__label" for="verified">Verification</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input disabled readonly value="<?php if(!is_null($student->last_verified)) { $d = strtotime($student->last_verified); echo date('M d, Y h:i:s A',$d); }else { echo 'N/A'; }?>" class="mdl-textfield__input" type="text" id="timestamp">
              <label class="mdl-textfield__label" for="timestamp">Last Verified</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input disabled style="text-align: center" readonly value="<?php echo $student->active ? 'Active':'Disabled' ?>" class="mdl-textfield__input" type="text" id="active">
              <label class="mdl-textfield__label" for="active">Status</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--4-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" value="<?php echo $student->first_name ?>" class="mdl-textfield__input" type="text" id="first_name" name="first_name">
              <span class="mdl-textfield__error" for="first_name">Invalid name</span>
              <label class="mdl-textfield__label" for="first_name">First Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" value="<?php echo $student->middle_name ?>" class="mdl-textfield__input" type="text" id="middle_name" name="middle_name">
              <span class="mdl-textfield__error" for="middle_name">Invalid name</span>
              <label class="mdl-textfield__label" for="middle_name">Middle Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" value="<?php echo $student->last_name ?>" class="mdl-textfield__input" type="text" id="last_name" name="last_name">
              <span class="mdl-textfield__error" for="last_name">Invalid name</span>
              <label class="mdl-textfield__label" for="last_name">Last Name</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <?php
                $options = array(
                  '0' => 'Select your course',
                  'Business Administration' => 'Business Administration',
                  'Criminology' => 'Criminology',
                  'Education' => 'Education',
                  'Information Technology' => 'Information Technology'
                );
                echo form_dropdown('course', $options, $student->course, 'class="mdl-textfield__input"');
              ?>
              <label class="mdl-textfield__label" for="course">Course</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <?php
                $options = array(
                  '0' => 'Select your year',
                  '1' => '1st Year',
                  '2' => '2nd Year',
                  '3' => '3rd Year',
                  '4' => '4th Year'
                );
                echo form_dropdown('year', $options, $student->year_level, 'class="mdl-textfield__input"');
              ?>
              <label class="mdl-textfield__label" for="year">Year</label>
            </div>

            <div class="mdl-cell mdl-cell--12-col"></div>
            <button type="submit" class="mdl-cell mdl-cell--5-col-desktop mdl-cell--1-offset-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
              Save
            </button>
            <a href="<?php echo base_url('admin/view_all/students') ?>" class="mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--red">
              Cancel
            </a>
            <div class="mdl-cell mdl-cell--12-col"></div>
          <?php echo form_close() ?>
        </section>  

        <section class="mdl-cell mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop mdl-card mdl-shadow--4dp mdl-cell--3-offset-desktop ">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Manage Account</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">settings</i>
          </div>
          <div class="mdl-grid" style="width: 100%">
            <div class="mdl-cell mdl-cell--12-col"></div> 
            <?php if($student->active) { ?>  
            <a href="<?php echo base_url('admin/edit/student/disable/'.$student->id."?token=".md5($student->id + $_SESSION['id'])) ?>" class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--red">
              Disable Account
            </a>
            <?php } else { ?>  
            <a href="<?php echo base_url('admin/edit/student/enable/'.$student->id."?token=".md5($student->id + $_SESSION['id'])) ?>" class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
              Enable Account
            </a>
            <?php } ?>       
            <a href="<?php echo base_url('admin/edit/student/reset/'.$student->id."?token=".md5($student->id + $_SESSION['id'])) ?>" class="mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--blue-grey">
              Reset Password
            </a>                                 
            <div class="mdl-cell mdl-cell--12-col"></div>
          </div>
        </section>
      </div>
    </div>
  </main>
</div>

<script type="text/javascript">

  $(document).ready(function(){

    $('option[value$="0"]').prop("disabled", true);
  });

</script>
