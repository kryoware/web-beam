<title>Student Signup | Beam</title>
  <style>
    #signup {
      height: 48px;
      font-size: 16px;
    }
    select {
      border-bottom: 2px solid rgb(63,81,181)!important;
    }
  </style>
</head>
<body class="mdl-color--grey-100">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-drawer-button">
  <header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row">
      <a href="<?php echo base_url('admin/dashboard') ?>">
        <i class="text-dark material-icons">arrow_back</i>
      </a>
      <div class="mdl-layout-spacer"></div>
      <span class="logo">
        <a href= "<?php echo base_url() ?>" class="text-dark mdl-layout-title">beam</a>
      </span>
        <div class="mdl-layout-spacer"></div>
    </div>
  </header>
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
          <?php echo form_open('student/signup/process', 'class="mdl-grid"') ?>

            <?php echo '<div class="mdl-cell mdl-cell--12-col mdl-cell--10-col-desktop mdl-cell--1-offset-desktop form-error">'.validation_errors()."</div>" ?>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="^[a-z\d\.]{5,}$" placeholder="5-digit ID Number" value="<?php echo set_value('username'); ?>" class="mdl-textfield__input" type="text" minlength="5" maxlength="5" id="username" name="username">
              <span class="mdl-textfield__error" for="username">Please enter a valid ID Number</span>
              <label class="mdl-textfield__label" for="username">ID Number</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="^(\+639)\d{9}$" placeholder="+639123456789" value="<?php echo set_value('phone_num') ?>" class="mdl-textfield__input" type="text" maxlength="13" minlength="13" pattern="phone" name="phone_num" id="phone_num">
              <label class="mdl-textfield__error" for="phone_num">Please enter a valid phone number</label>
              <label class="mdl-textfield__label" for="phone_num">Phone Number</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('password'); ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="password" id="password">
              <span class="mdl-textfield__error" for="password">Password is too short. Min. 8 characters</span>
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('password2'); ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="password2" id="password2">
              <span class="mdl-textfield__error" for="password2">Password is too short. Min. 8 characters</span>
              <label class="mdl-textfield__label" for="password2">Re-Enter Password</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--4-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Juan" value="<?php echo set_value('first_name'); ?>" class="mdl-textfield__input" type="text" id="first_name" name="first_name">
              <span class="mdl-textfield__error" for="first_name">Please enter a valid name</span>
              <label class="mdl-textfield__label" for="first_name">First Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Reyes" value="<?php echo set_value('middle_name'); ?>" class="mdl-textfield__input" type="text" id="middle_name" name="middle_name">
              <span class="mdl-textfield__error" for="middle_name">Please enter a valid name</span>
              <label class="mdl-textfield__label" for="middle_name">Middle Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Dela Cruz" value="<?php echo set_value('last_name'); ?>" class="mdl-textfield__input" type="text" id="last_name" name="last_name">
              <span class="mdl-textfield__error" for="last_name">Please enter a valid name</span>
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
                echo form_dropdown('course', $options, '0', 'class="mdl-textfield__input"');

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
                echo form_dropdown('year', $options, '0', 'class="mdl-textfield__input"');

              ?>
              <label class="mdl-textfield__label" for="year">Year</label>
            </div>

            <div class="mdl-cell mdl-cell--12-col"></div>
            <button id="signup" type="submit" class="mdl-cell mdl-cell--8-col-desktop mdl-cell--2-offset-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
              Register
            </button>

            <div class="mdl-cell mdl-cell--12-col"></div>

          <?php echo form_close() ?>
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
