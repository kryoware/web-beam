<title>View Event Information | Beam</title>
</head>
<body class="mdl-color--grey-100">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
<header id="nav" class="mdl-layout__header mdl-color--white">
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
          <section id="card" class="mdl-cell mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop mdl-card mdl-shadow--4dp mdl-cell--1-offset-desktop">
            <div class="mdl-card__title mdl-color--indigo mdl-color-text--white">
              <h2 class="mdl-card__title-text">Request Details</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">feedback</i>
            </div>
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input readonly value="<?php echo $request->request_code ?>" class="mdl-textfield__input" type="text" id="event_code" name="event_code">
                <label class="mdl-textfield__label" for="event_code">Request Code</label>
              </div>
                <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input readonly value="<?php $t = $this->teacher_model->fetch($request->teacher_id); echo $t->first_name." ".$t->last_name; ?>" class="mdl-textfield__input" type="text" id="event_code" name="event_code">
                  <label class="mdl-textfield__label" for="event_code">Sender</label>
                </div>
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input readonly value="<?php echo $request->keyword ?>" class="mdl-textfield__input" type="text" id="event_name" name="event_name">
                <span class="mdl-textfield__error" for="event_name">Invalid name</span>
                <label class="mdl-textfield__label" for="event_name">Keyword</label>
              </div>
              <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell-4-col-phone mdl-cell--2-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input readonly value="<?php echo ucfirst($request->status) ?>" class="mdl-textfield__input" type="text" id="event_code" name="event_code">
                <label class="mdl-textfield__label" for="event_code">Status</label>
              </div>
              <div class="mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col-desktop mdl-cell-4-col-phone mdl-cell--3-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea readonly class="mdl-textfield__input" type="text" id="details" name="details" rows="5"><?php echo $request->message ?></textarea>
                <label class="mdl-textfield__label" for="details">Message</label>
              </div>
              <a href="<?php echo base_url('admin/view/requests/pending') ?>" class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-button mdl-js-button mdl-color-text--indigo mdl-js-ripple-effect">
                Go Back
              </a>
            </div>
          </section>
          <section id="list" class="mdl-cell mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title mdl-color--indigo mdl-color-text--white">
              <h2 class="mdl-card__title-text">Recipients</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">people</i>
            </div>
            <?php
              if($targets) { ?>
              <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                <thead>
                  <tr>
                    <th class="mdl-data-table__cell--non-numeric">Student Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Course</th>
                    <th class="mdl-data-table__cell--non-numeric">Year</th>
                    <th class="mdl-data-table__cell--non-numeric">Timestamp</th>
                  </tr>
                </thead>
                <tbody><?php foreach($targets as $student) { ?>
                  <tr>
                    <td class="table-action mdl-data-table__cell--non-numeric">
                      <?php echo $student->first_name." ".$student->middle_name[0].". ".$student->last_name ?>
                    </td>
                    <td class="table-action mdl-data-table__cell--non-numeric">
                      <?php echo $student->course ?>
                    </td>
                    <td class="table-action mdl-data-table__cell--non-numeric">
                      <?php echo $student->year_level;
                      switch ($student->year_level) {
                        case'1': echo "st Year"; break;
                        case'2': echo "nd Year"; break;
                        case'3': echo "rd Year"; break;
                        default: echo "th Year"; break;
                      }
                      ?>
                    </td>
                    <td class="table-action mdl-data-table__cell--non-numeric">
                     <?php $d = strtotime($student ->timestamp); echo date('m-d-y h:i:s:A',$d); ?>                    
                    </td>
                  </tr><?php } ?>
                </tbody>
              </table>
              <button id="close" type="submit" class="mdl-cell mdl-cell--10-col-desktop mdl-cell--1-offset-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue"></button>
              <button id="print" type="submit" class="mdl-cell mdl-cell--10-col-desktop mdl-cell--1-offset-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue">Print List <i class="material-icons">print</i>
              </button>
            <?php }else { ?>
              <span class="mdl-color-text--grey mdl-typography--text-center"><br>
                <h5>Nothing here yet<h5><h6>Did you send notifications already?</h6><br>
              </span>
            <?php } ?>
          </section>
      </div>
    </div>
  </main>
</div>
<script>
$('#close').hide();
$('#close').on('click', function(){
  $('#close').hide();
  $('#print').show();
  $('#card').show();
  $('#nav').show();
  $('#list').removeClass('mdl-cell--12-col-desktop');
  $('#list').addClass('mdl-cell--5-col-desktop');

});
$('#print').on('click', function(){
  $('#close').show();
  $('#card').hide();
  $('#nav').hide();
  $('#print').hide();
  $('#list').removeClass('mdl-cell--5-col-desktop');
  $('#list').addClass('mdl-cell--12-col-desktop');
  window.print();
});
</script>
