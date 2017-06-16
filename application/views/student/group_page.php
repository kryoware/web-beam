<title>View Group | Beam</title>
</head>
<body class="mdl-color--grey-100">
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
  <header class="mdl-layout__header mdl-color--white">
    <div class="mdl-layout__header-row">
      <span class="logo">
        <a class="text-dark mdl-layout-title">beam</a>
      </span>
        <div class="mdl-layout-spacer"></div>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="mdl-grid">

        <div class="mdl-cell mdl-cell--12-col"></div>

        <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--4-col-desktop mdl-cell--1-offset-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Group Information</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">info_outline</i>
          </div>
          <div class="mdl-grid">
            <div class="mdl-cell--6-col-desktop mdl-cell--order-1-phone mdl-cell--order-1-tablet mdl-cell mdl-cell--1-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="group_code" value="<?php echo $result->code ?>" readonly>
              <label class="mdl-textfield__label" for="group_code">Group Code</label>
            </div>
            <div class="mdl-cell--6-col-desktop mdl-cell--order-3-phone mdl-cell--order-3-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="moderator" value="<?php $mod = $this->group_model->getModerator($result->id); echo $mod->first_name.' '.$mod->last_name ?>" readonly>
              <label class="mdl-textfield__label" for="moderator">Moderator</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell--order-2-phone mdl-cell--order-2-tablet mdl-cell mdl-cell--3-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="group_name" value="<?php echo $result->name ?>" readonly>
              <label class="mdl-textfield__label" for="group_name">Group Name</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell--order-4-phone mdl-cell--order-4-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <textarea class="mdl-textfield__input" type="text" rows= "3" id="details" readonly><?php echo $result->details ?></textarea>
              <label class="mdl-textfield__label" for="details">Details<label>
            </div>

            <a href="<?php echo base_url('student/dashboard') ?>" class="mdl-cell--order-5-phone mdl-cell--order-5-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--accent">
                Go back
            </a>

          </div>
        </section>

        <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Members</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">group</i>
          </div>

          <?php
            if(!is_null($data['message']))
              echo "<span class='mdl-color-text--grey mdl-typography--text-center'><h5>".$data['message']."</h5><h6>".var_dump($data['flavour'])."</h6></span>"?>

          <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col <?php if(!is_null($data['message'])) echo "mdl-cell--hide-desktop mdl-cell--hide-tablet mdl-cell--hide-phone" ?>">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Student Name</th>
                <th class="mdl-data-table__cell--non-numeric">Course</th>
                <th class="mdl-data-table__cell--non-numeric">Year</th>
              </tr>
            </thead>
            <tbody><?php if(is_null($data['message'])) { foreach($members as $member) { ?>
              <tr>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $member->first_name." ".$member->middle_name[0].". ".$member->last_name;
                    if($member->id === $this->session->userdata('id')) echo '  <span class="mdl-color-text--primary"><b>(You)</b></span>';
                   ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $member->course ?>
                </td>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $member->year_level;
                  switch ($member->year_level) {
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
                <!-- <td class="mdl-data-table__cell--non-numeric"><?php echo $row['code'] ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $row['name'] ?></td>
                <td class="table-action mdl-data-table__cell--non-numeric"><a class="link mdl-color-text--accent" href="group/view/<?php echo $row['id'] ?>">View</a></td>
                <td class="table-action mdl-data-table__cell--non-numeric"><a class="link mdl-color-text--accent" href="group/edit/<?php echo $row['id'] ?>">Edit</a></td>
                <td class="table-action mdl-data-table__cell--non-numeric"><a class="link mdl-color-text--primary" onclick="return confirm('Delete this group? This action cannot be undone')" href="group/delete/<?php echo $row['id'] ?>">Delete</a></td> -->
              </tr><?php } }?>
            </tbody>
          </table>

        </section>

      </div>
    </div>
  </main>
</div>
