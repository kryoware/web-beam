<title>Groups | Beam</title>
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
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/students') ?>">
      <i class="material-icons">school</i> Students
    </a>
    <a class="mdl-navigation__link mdl-color-text--blue-grey-300" href="<?php echo base_url('admin/view_all/teachers') ?>">
      <i class="material-icons">work</i> Teachers
    </a>
    <a class="mdl-navigation__link mdl-color--green mdl-color-text--white" href="<?php echo base_url('admin/view_all/events') ?>">
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

        <section class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">

          <div class="mdl-card__title mdl-color--green mdl-color-text--white">
            <h2 class="mdl-card__title-text">All Events</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">event</i>
          </div>

          <?php if($data) { ?>
          <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Code</th>
                <th class="mdl-data-table__cell--non-numeric">Name</th>
                <th class="mdl-data-table__cell--non-numeric">Details</th>
                <th class="mdl-data-table__cell--non-numeric"></th>
                <th class="mdl-data-table__cell--non-numeric"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $event) { ?>
              <tr>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $event->code ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $event->name ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $event->details ?>
                </td>

                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo form_open('admin/view/event');
                        echo form_hidden('event_id', $event->id); ?>
                  <button type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-color-text--indigo">View</button>
                  <?php echo form_close(); ?>
                </td>

                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo form_open('admin/delete/event');
                        echo form_hidden('event_id', $event->id); ?>
                  <button type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-color-text--red">Delete</a>
                  <?php echo form_close(); ?>
                </td>

              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php } ?>
        </section>

      </div>
    </div>
  </main>
</div>
