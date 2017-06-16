<title><?php if($_SESSION['isAdmin']) { $user = 'admin'; echo 'Admin'; }else if($_SESSION['isStudent']) { $user = 'student'; echo 'Student'; }else if($_SESSION['isTeacher']) { $user = 'teacher'; echo 'Teacher'; } ?> Profile | Beam</title>
<style>
.mdl-textfield__input {
  text-align: center;
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
        Hello <?php echo ' <span class="mdl-color-text--blue">'.$this->session->userdata('first_name').'</span>' ?><i class="material-icons">expand_more</i>
      </button>

      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="user_menu">
      <a href="<?php echo base_url($user.'/dashboard') ?>">
          <li class="mdl-menu__item"><i style="vertical-align: middle !important" class="material-icons">dashboard</i> Dashboard</li>
        </a>
        <a href="<?php echo base_url($user.'/profile') ?>">
          <li class="mdl-menu__item mdl-color-text--white mdl-color--blue"><i style="vertical-align: middle !important" class="material-icons">account_box</i> Profile</li>
        </a>
        <a href="<?php echo base_url($user.'/logout') ?>">
          <li class="mdl-menu__item mdl-color-text--red"><i style="vertical-align: middle !important" class="material-icons">exit_to_app</i> Logout</li>
        </a>
      </ul>

    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Navigation</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link mdl-color-text--black" href="dashboard">Dashboard</a>
      <a class="mdl-navigation__link mdl-color-text--white mdl-color--blue">Profile</a>
      <a class="mdl-navigation__link mdl-color-text--black" href="logout">Logout</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="mdl-grid">

        <div class="mdl-cell mdl-cell--12-col"></div>

        <section class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--10-col-desktop mdl-card mdl-shadow--4dp mdl-cell--1-offset-desktop ">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Account Information</h2>
          </div>
          <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--4-col mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $this->session->userdata('first_name') ?>" class="mdl-textfield__input" type="text" id="first_name" name="first_name">
              <label class="mdl-textfield__label" for="first_name">First Name</label>
            </div>

            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--2-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $this->session->userdata('middle_name') ?>" class="mdl-textfield__input" type="text" id="middle_name" name="middle_name">
              <label class="mdl-textfield__label" for="middle_name">Middle Name</label>
            </div>

            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $this->session->userdata('last_name') ?>" class="mdl-textfield__input" type="text" id="last_name" name="last_name">
              <label class="mdl-textfield__label" for="last_name">Last Name</label>
            </div>

            <div class="mdl-cell <?php echo $_SESSION['isStudent'] ? 'mdl-cell--1-offset-desktop mdl-cell--2-col-desktop ' : 'mdl-cell--4-offset-desktop mdl-cell--1-col-desktop ' ?> mdl-cell--2-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $this->session->userdata('username') ?>" class="mdl-textfield__input" type="text" name="phone_num" id="phone_num">
              <label class="mdl-textfield__label" for="phone_num">Username</label>
            </div>

            <?php if(!$_SESSION['isStudent']) { ?>
            <div class="mdl-cell mdl-cell--1-col-desktop mdl-cell--2-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $data->department ?>" class="mdl-textfield__input" type="text" name="phone_num" id="phone_num">
              <label class="mdl-textfield__label" for="phone_num">Department</label>
            </div>
            <?php } ?>
            <div class="mdl-cell <?php echo $this->session->userdata('isStudent') ? 'mdl-cell--3-col-desktop' : 'mdl-cell--2-col-desktop' ?> mdl-cell--4-tablet mdl-cell--2-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $data->phone_number ?>" class="mdl-textfield__input" type="text" id="phone_num">
              <label class="mdl-textfield__label" for="phone_num">Phone Number</label>
            </div>

            <div class="mdl-cell mdl-cell--1-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input readonly value="<?php echo $data->verified_user ? 'Yes' : 'No' ?>" class="mdl-textfield__input" type="text" id="last_name" name="last_name">
              <label class="mdl-textfield__label">Verifed User</label>
            </div>
            <!-- <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="Phone verification is required"readonly value="<?php echo date($data->last_verified) ?>"class="mdl-textfield__input" type="text" minlength="6" maxlength="30" id="username" name="username">
              <label class="mdl-textfield__label" for="username">Last Verified</label>
            </div> -->

            <?php if($_SESSION['isStudent']) { ?>
              <div class="mdl-cell mdl-cell--1-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input readonly id="username" value="<?php echo $this->session->userdata('year_level'); switch($this->session->userdata('year_level')){case 1: echo 'st'; break; case 2: echo 'nd'; break; case 3: 'rd'; break; default: echo 'th'; break; } ?>"class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label" for="username">Year</label>
              </div>
                <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input readonly id="course" value="<?php echo $this->session->userdata('course') ?>"class="mdl-textfield__input" type="text">
                  <label class="mdl-textfield__label" for="course">Course</label>
                </div>
            <?php } ?>
          </div>
        </section>

        <section class="mdl-cell mdl-cell--4-col-phone mdl-cell--4-col-desktop mdl-cell--8-col-tablet mdl-card mdl-shadow--4dp mdl-cell--1-offset-desktop ">
          <div class="mdl-card__title mdl-color--blue mdl-color-text--white">
            <h2 class="mdl-card__title-text">Manage Contact Info</h2>
          </div>
          <div class="mdl-cell mdl-cell--12-col form-error"><?php if($this->session->flashdata('flash_error')) echo $this->session->flashdata('flash_error'); else if($this->session->flashdata('flash_success')) echo $this->session->flashdata('flash_success'); else echo form_error('new_number') ?></div>
          <?php if($data->verified_user) { echo form_open($user.'/profile/change_number', 'class="mdl-grid"'); ?>
            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="^(\+639)\d{9}$" placeholder="Ex. +639123456789" value="<?php echo set_value('new_number'); ?>" class="mdl-textfield__input" type="text" minlength="13" maxlength="13" name="new_number" id="new_number">
              <span class="mdl-textfield__error" for="new_number">Format: +639XXXXXXXXX</span>
              <label class="mdl-textfield__label mdl-color-text--blue" for="new_number">Enter New Phone Number</label>
            </div>

            <button id="signup" type="submit" class="mdl-cell mdl-cell--middle mdl-cell--6-col-desktop mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--blue">
              Update Number
            </button>
          <?php echo form_close(); } ?>

          <?php if($data->verified_user != 1) { echo form_open($user.'/profile/verify', 'class="mdl-grid"'); ?>
            <div class="mdl-cell mdl-cell--12-col form-error"><?php echo form_error('code') ?></div>
            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="Ex. 123456" value="<?php echo set_value('code'); ?>" class="mdl-textfield__input" type="text" minlength="6" maxlength="6" name="code" id="code">
              <label class="mdl-textfield__label mdl-color-text--blue" for="code">Verification Code</label>
              <span class="mdl-textfield__error" for="new_number">Invalid code</span>
            </div>

            <button id="signup" type="submit" class="mdl-cell mdl-cell--middle mdl-cell--6-col-desktop mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--blue">
              Verify Account
            </button>
          <?php echo form_close(); } ?>
        </section>

        <section class="mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--green mdl-color-text--white">
            <h2 class="mdl-card__title-text">Change Password</h2>
          </div>
          <?php echo form_open($user.'/profile/change_password', 'class="mdl-grid" '); ?>
            <div class="mdl-cell mdl-cell--12-col form-error"><?php if($this->session->flashdata('flash_error2')) echo $this->session->flashdata('flash_error2'); else if($this->session->flashdata('flash_success2')) echo $this->session->flashdata('flash_success2'); else echo form_error('curr');echo form_error('pass');echo form_error('repw') ?></div>

            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('curr') ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="curr" id="curr">
              <span class="mdl-textfield__error" for="curr">Must be at least 8 characters long</span>
              <label class="mdl-textfield__label mdl-color-text--grey-700" for="curr">Current Password</label>
            </div>
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('pass') ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="pass" id="pass">
              <span class="mdl-textfield__error" for="pass">Must be at least 8 characters long</span>
              <label class="mdl-textfield__label mdl-color-text--grey-700" for="pass">New Password</label>
            </div>
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('repw') ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="repw" id="repw">
              <span class="mdl-textfield__error" for="repw">Must be at least 8 characters long</span>
              <label class="mdl-textfield__label mdl-color-text--grey-700" for="repw">Re-enter Password</label>
            </div>

            <button id="signup" type="submit" class="mdl-cell mdl-cell--8-col-desktop mdl-cell--2-offset-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
              Change Password
            </button>

            <div class="mdl-cell mdl-cell--12-col"></div>
          <?php echo form_close() ?>
        </section>

      </div>
    </div>
  </main>
</div>
