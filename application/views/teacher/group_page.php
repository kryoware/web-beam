<title>Edit Group | Beam</title>
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
          <div class="mdl-card__title mdl-color--blue-grey mdl-color-text--white">
            <h2 class="mdl-card__title-text">Edit Group</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">edit</i>
          </div>
          <?php echo form_open('teacher/group/update/'.$result->id, 'class="mdl-grid mdl-color-text--black"') ?>

            <div class="mdl-cell--6-col-desktop mdl-cell mdl-cell--1-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="group_code" value="<?php echo $result->code ?>" disabled>
              <label class="mdl-textfield__label" for="group_code">Group Code</label>
            </div>

            <div class="mdl-cell--6-col-desktop mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="moderator" value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?>" disabled>
              <label class="mdl-textfield__label" for="moderator">Moderator</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell mdl-cell--3-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" pattern="[a-zA-Z0-9\s]*" minlength="3" validate required type="text" id="group_name" name="name" value="<?php echo $result->name ?>">
              <label class="mdl-textfield__label" for="group_name">Group Name</label>
              <label class="mdl-textfield__error" for="group_name">Please enter alphanumeric values</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <textarea class="mdl-textfield__input" minlength="25" validate required type="text" name="details" rows= "3" id="details"><?php echo $result->details ?></textarea>
              <label class="mdl-textfield__label" for="details">Details<label>
            </div>

            <button type="submit" class="mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--green">
              Save
            </button>
            <a onclick="return confirm('Are you sure you want to discard your changes?')" href="<?php echo base_url('teacher/dashboard') ?>" class="mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--red">
              Cancel
            </a>
          <?php echo form_close() ?>
        </section>

        <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--blue-grey mdl-color-text--white">
            <h2 class="mdl-card__title-text">Members</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">person</i>
          </div>
          <?php if(!$members) { ?>
            <h5 class="mdl-color-text--grey mdl-typography--text-center">
              <?php echo "<br><br>This group has no members yet.<br><br>Tell your students to join - It's FREE!<br><br><br>" ?>
            </h5>
          <?php }else { ?>
          <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Student Name</th>
                <th class="mdl-data-table__cell--non-numeric">Course</th>
                <th class="mdl-data-table__cell--non-numeric">Year</th>
              </tr>
            </thead>
            <tbody><?php foreach($members as $member) { ?>
              <tr>
                <td class="table-action mdl-data-table__cell--non-numeric">
                  <?php echo $member->first_name." ".$member->middle_name[0].". ".$member->last_name ?>
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
              </tr><?php } }?>
            </tbody>
          </table>

        </section>

      </div>
    </div>
  </main>
</div>
