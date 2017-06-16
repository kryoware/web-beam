<title>Poll Results | Beam</title>
</head>
<body class="mdl-color--grey-100">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
<header id="nav" class="mdl-layout__header mdl-color--white">
  <div class="mdl-layout__header-row">
    <div class="logo">
      <a class="text-dark mdl-layout-title">beam</a> <span class="text-dark mdl-layout-title">Analytics</span>
    </div>

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
        <div id="card" class="mdl-cell--5-col-desktop mdl-cell--1-offset-desktop">

        <section style="height: auto !important" class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Poll Chart</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">pie_chart</i>
          </div>
          <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch">
            <?php $total = intval($poll->attending) + intval($poll->not_going) + intval($poll->undecided);
            if($total != 0) { ?>
              <canvas id="results"></canvas><br>
              <div class="mdl-typography--text-center">Total Respondents: <?php echo $total; ?></div>
              <div class="mdl-cell mdl-cell--12-col"></div>
            <?php }else { ?>
              <span class="mdl-color-text--grey mdl-typography--text-center"><br>
                <h5>No Students RSVP'd yet<h5><h6>Did you send notifications already?</h6><br>
              </span>
            <?php } ?>
          </div>
          <div class="mdl-cell mdl-cell--12-col">
            <a href="<?php echo base_url('admin/view_all/polls') ?>" class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-button mdl-js-button mdl-color-text--blue-grey mdl-js-ripple-effect">
              Go Back
            </a>
          </div>
        </section>

<!--         <section style="height: auto !important" class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Respondents Chart</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">poll</i>
          </div>
          <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch">
            <?php if($total != 0) { ?>

				<div id="chartContainer" style="width: 100%; height: 440px;"></div>

              <!-- <canvas id="respondents"></canvas><br> 
              <div class="mdl-cell mdl-cell--12-col"/>
            <?php }else { ?>
              <span class="mdl-color-text--grey mdl-typography--text-center"><br>
                <h5>No Students RSVP'd yet<h5><h6>Did you send notifications already?</h6><br>
              </span>


            <?php } ?>
          </div>
        </section> -->
      </div>

        <section class="mdl-cell mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--5-col-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Respondents</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">assignment</i>
            <?php if($respondents) { ?>
            <a href="http://localhost/crud/download.php?id=<?php echo $poll->event_id ?>" class="mdl-color-text--white mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">get_app</i></a>
            <?php } ?>
          </div>
          <?php if($respondents) { ?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
              <thead>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric">Name</td>
                  <td class="mdl-data-table__cell--non-numeric">Course</td>
                  <td class="mdl-data-table__cell--non-numeric">Response</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($respondents as $respondent) { ?>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $respondent->last_name.", ".$respondent->first_name ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $respondent->course ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $respondent->reply ?></td>
                </tr>

                <?php } ?>
              </tbody>
            </table>
          <?php }else {?>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch">
              <span class="mdl-color-text--grey mdl-typography--text-center"><br>
                <h5>No Students RSVP'd yet<h5><h6>Did you send notifications already?</h6><br>
              </span>
            </div>
          <?php } ?>
        </section>
      </div>
    </div>
  </main>
</div>

<script type="text/javascript">
<?php $data = $this->poll_model->getCounts($poll->id); ?>
  var results = {
    labels: [ "Attending", "Not Attending", "Undecided", "No Response" ],
    datasets : [{
      data: [<?php echo intval($poll->attending) ?>, <?php echo intval($poll->not_going) ?>, <?php echo intval($poll->undecided) ?>, <?php echo intval($poll->no_reply) ?>],
      backgroundColor: [
        "#2196F3",
        "#f44336",
        "#4CAF50",
        "#607D8B"
      ],
      hoverBackgroundColor: [
        "#1976D2",
        "#d32f2f",
        "#388E3C",
        "#455A64"
      ],
      borderWidth: 0
    }]
  };

  var canvas_results = $("#results");
  var canvas_respondents = $("#respondents");

  var resultsChart = new Chart(canvas_results, {
    type: 'doughnut',
    data: results
  });
  var respondentsChart = new Chart(canvas_respondents,  {
    type: 'bar',
    data: data
  });
</script>
