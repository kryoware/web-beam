<title>Teacher Signup | Beam</title>
  <style>
    #signup {
      height: 48px;
      font-size: 16px;
    }
  </style>
</head>
<body class="mdl-color--grey-100">
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
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
          <div class="mdl-card__title mdl-color--red mdl-color-text--white">
            <h2 class="mdl-card__title-text">Teacher Information</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">work</i>
          </div>
          <?php echo form_open('teacher/signup/process', 'class="mdl-grid"') ?>

            <?php echo '<div class="mdl-cell mdl-cell--12-col mdl-cell--10-col-desktop mdl-cell--1-offset-desktop form-error">'.validation_errors()."</div>" ?>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="^[a-z\d\.]{5,}$" placeholder="5-digit ID Number" value="<?php echo set_value('username'); ?>"class="mdl-textfield__input" type="text" minlength="5" maxlength="5" id="username" name="username">
              <span class="mdl-textfield__error" for="username">Invalid ID Number</span>
              <label class="mdl-textfield__label" for="username">ID Number</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="^(09|\+639)\d{9}$" placeholder="+639123456789" value="<?php echo set_value('phone_num') ?>" class="mdl-textfield__input" type="text" maxlength="13" minlength="13" pattern="phone" name="phone_num" id="phone_num">
              <label class="mdl-textfield__error" for="phone_num">Invalid phone number</label>
              <label class="mdl-textfield__label" for="phone_num">Phone Number</label>
            </div>
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input mdl-color-text--grey" id="department" name="department">
                <option selected disabled>Choose Department</option>
                <option value="BA" class="mdl-color-text--black">Business Administration</option>
                <option value="CR" class="mdl-color-text--black">Criminology</option>
                <option value="ED" class="mdl-color-text--black">Education</option>
                <option value="IT" class="mdl-color-text--black">Information Technology</option>
              </select>
              <label class="mdl-textfield__label" for="department">Department</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('password'); ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="password" id="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input placeholder="********" value="<?php echo set_value('password2'); ?>" class="mdl-textfield__input" type="password" minlength="8" maxlength="24" name="password2" id="password2">
              <label class="mdl-textfield__label" for="password2">Re-Enter Password</label>
            </div>

            <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--4-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Juan" value="<?php echo set_value('first_name'); ?>" class="mdl-textfield__input" type="text" id="first_name" name="first_name">
              <span class="mdl-textfield__error" for="first_name">Invalid name</span>
              <label class="mdl-textfield__label" for="first_name">First Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Reyes" value="<?php echo set_value('middle_name'); ?>" class="mdl-textfield__input" type="text" id="middle_name" name="middle_name">
              <span class="mdl-textfield__error" for="middle_name">Invalid name</span>
              <label class="mdl-textfield__label" for="middle_name">Middle Name</label>
            </div>
            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input pattern="([A-Z][a-z]* )*[A-Z][a-z]+" minlength="2" placeholder="Dela Cruz" value="<?php echo set_value('last_name'); ?>" class="mdl-textfield__input" type="text" id="last_name" name="last_name">
              <span class="mdl-textfield__error" for="last_name">Invalid name</span>
              <label class="mdl-textfield__label" for="last_name">Last Name</label>
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
