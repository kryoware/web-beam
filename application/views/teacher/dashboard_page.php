  <title>Teacher Dashboard | Beam</title>
  <style>
    #groupcode {
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
           Hello <?php echo '<span class="mdl-color-text--blue">'.$this->session->userdata('first_name').'</span>' ?><i class="material-icons">expand_more</i>
        </button>

        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="user_menu">
          <a href="dashboard">
            <li class="mdl-menu__item mdl-color-text--white mdl-color--blue"><i style="vertical-align: middle !important" class="material-icons">dashboard</i> Dashboard</li>
          </a>
          <a href="profile"><li class="mdl-menu__item"><i style="vertical-align: middle !important" class="material-icons">account_box</i> Profile</li></a>

          <a href="logout"><li class="mdl-menu__item mdl-color-text--red"><i style="vertical-align: middle !important" class="material-icons">exit_to_app</i> Logout</li></a>
        </ul>

      </div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Navigation</span>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link mdl-color-text--white mdl-color--blue" href="">Dashboard</a>
        <a class="mdl-navigation__link mdl-color-text--black" href="profile">Profile</a>
        <a class="mdl-navigation__link mdl-color-text--black" href="help">Help</a>
        <a class="mdl-navigation__link mdl-color-text--black" href="logout">Logout</a>
      </nav>
    </div>
    <main class="mdl-layout__content">
      <div class="page-content">
        <div class="mdl-grid">

          <div class="mdl-cell mdl-cell--12-col"></div>

          <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--7-col-desktop mdl-cell--1-offset-desktop mdl-card mdl-shadow--4dp">

            <div class="mdl-card__title mdl-color--red-600 mdl-color-text--white">
              <h2 class="mdl-card__title-text">Your Groups</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">group_work</i>
            </div>
            <?php if(!$results) echo "<span class='mdl-color-text--grey mdl-typography--text-center'><h5>No groups here yet<br></h5><h6>Use the form on the right to make one, it's easy!</h6></span>"?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col
            <?php if(!$results) echo "mdl-cell--hide-desktop mdl-cell--hide-tablet mdl-cell--hide-phone" ?>">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">Code</th>
                  <th class="mdl-data-table__cell--non-numeric">Name</th>
                  <th colspan="2" class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if($results) { foreach($results as $row) { ?>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['code'] ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['name'] ?></td>
                  <td class="table-action mdl-data-table__cell--non-numeric"><a class="link mdl-color-text--accent" href="group/view/<?php echo $row['id'] ?>?u=<?php echo md5($row['id'] + $_SESSION['id']) ?>">View</a></td>
                  <td class="table-action mdl-data-table__cell--non-numeric">
                    <a class="link mdl-color-text--primary" onclick="return confirm('Delete this group? This action cannot be undone')"
                    href="group/delete/<?php echo $row['id'] ?>?u=<?php echo md5($row['id'] + $_SESSION['id']) ?>">Delete
                    </a>
                  </td>
                </tr>
                <?php }
                } ?>
              </tbody>
            </table>

          </section>

          <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--3-col-desktop mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title mdl-color--red mdl-color-text--white">
              <h2 class="mdl-card__title-text">Create Group</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">group_add</i>
            </div><br>
            <div class="form-error mdl-typography--text-center"><?php echo validation_errors() ?></div>

            <?php echo form_open('teacher/create_group', 'class="mdl-grid mdl-color-text--black"'); ?>

              <div class="mdl-cell mdl-cell--12-col-desktop mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input placeholder="IT Elective 8" value="<?php echo set_value('group_name') ?>"class="mdl-textfield__input" type="text" name="group_name" id="groupname">
                <label class="mdl-textfield__label" for="groupname">Group Name</label>
              </div>

              <div class="mdl-cell mdl-cell--12-col-desktop mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea placeholder="<?php echo "Ex.\nMON 9:00 AM-12:00 NN\nRoom 123\nMintal Campus" ?>" class="mdl-textfield__input" type="text" rows= "5" id="details" name="group_details"><?php echo set_value('group_details') ?></textarea>
                <label class="mdl-textfield__label" for="details">Details</label>
              </div>

              <button style="border: 1px solid" type="submit" class="mdl-cell mdl-cell--12-col-desktop mdl-color-text--primary mdl-button mdl-js-button mdl-js-ripple-effect">
                Create
              </button>
            <?php echo form_close() ?>
          </section>

        </div>
      </div>
    </main>
  </div>
