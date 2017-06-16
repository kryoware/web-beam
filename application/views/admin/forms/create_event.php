<title>New Event | Beam</title>
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
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/teachers') ?>">
      <i class="material-icons">work</i> Teachers
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
              <h2 class="mdl-card__title-text">Create Event</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">event</i>
            </div>
            <?php echo form_open('admin/create/event', 'class="mdl-grid"'); ?>
              <?php echo '<div class="mdl-cell mdl-cell--12-col mdl-cell--10-col-desktop mdl-cell--1-offset-desktop form-error">'.validation_errors()."</div>" ?>

              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col-desktop mdl-cell-4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input placeholder="XYZ Seminar" class="mdl-textfield__input" type="text" id="event_name" name="event_name" value="<?php echo set_value('event_name') ?>">
                <span class="mdl-textfield__error" for="event_name">Invalid name</span>
                <label class="mdl-textfield__label" for="event_name">Event Name</label>
              </div>
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input placeholder="Sun, September 30, 2020, 8:00AM - 5:00PM" class="mdl-textfield__input" type="text" id="schedule" name="schedule" value="<?php echo set_value('schedule') ?>">
                <label class="mdl-textfield__label" for="schedule">Schedule</label>
              </div>
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea placeholder="ABC St., DEF Building, Room G" class="mdl-textfield__input" type="text" id="location" name="location" rows="2"><?php echo set_value('location') ?></textarea>
                <label class="mdl-textfield__label" for="location">Location</label>
              </div>
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col-desktop mdl-cell-4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea placeholder="Registration form: http://goo.gl/j9i1n & Directions: http://goo.gl/l0d3k" class="mdl-textfield__input" type="text" id="details" name="details"><?php echo set_value('details') ?></textarea>
                <label class="mdl-textfield__label" for="details">Details</label>
              </div>
              <label class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="toggle">
                <input type="checkbox" name="toggle" id="toggle" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">Launch an RSVP Poll for this event</span>
              </label>

              <div class="mdl-cell mdl-cell--12-col"></div>
              <button type="submit" class="mdl-cell mdl-cell--5-col-desktop mdl-cell--1-offset-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
                Save
              </button>
              <a href="<?php echo base_url('admin/view_all/events') ?>" class="mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--red">
                Cancel
              </a>
              <div class="mdl-cell mdl-cell--12-col"></div>

            <?php echo form_close() ?>

      </div>
    </div>
  </main>
</div>
