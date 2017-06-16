  <title><?php echo $data['title'] ?> Dashboard</title>
  <style>
    #group_code {
      text-align: center;
    }
  </style>
</head>
<body class="mdl-color--grey-100">
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
    <header class="mdl-layout__header mdl-color--white">
      <div class="mdl-layout__header-row">
        <span class="logo"><a class="text-dark mdl-layout-title">beam</a></span>

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

            <div class="mdl-card__title mdl-color--indigo-600 mdl-color-text--white">
              <h2 class="mdl-card__title-text">Your Groups</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">group_work</i>
            </div>
            <?php if(!$groups) echo "<span class='mdl-color-text--grey mdl-typography--text-center'><h5>No groups here yet<br></h5><h6>Use the form on the right to join one, it's easy!</h6></span>"?>
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col
            <?php if(!$groups) echo "mdl-cell--hide-desktop mdl-cell--hide-tablet mdl-cell--hide-phone" ?>">
              <thead>
                <tr>
                  <!-- <th>ID</th> -->
                  <th class="mdl-data-table__cell--non-numeric">Group Code</th>
                  <th class="mdl-data-table__cell--non-numeric">Name</th>
                  <th class="mdl-data-table__cell--non-numeric">Members</th>
                  <th class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
              </thead>
              <tbody><?php if($groups) { foreach ($groups as $row) { ?>
                <tr>
                  <!-- <td><?php echo $row['id'] ?></td> -->
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['code'] ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['name'] ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $this->group_model->getMemberCount($row['id']) ?></td>
                  <td class="mdl-data-table__cell--non-numeric"><a class="link mdl-color-text--primary" href="group/view/<?php echo $row['id'] ?>">View</a></td>
                </tr><?php } } ?>
              </tbody>
            </table>

          </section>

          <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--3-col-desktop mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title mdl-color--indigo mdl-color-text--white">
              <h2 class="mdl-card__title-text">Join a Group</h2>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons">person_add</i>
            </div><br>
            <div class="form-error mdl-typography--text-center"><?php if(!is_null($error)) echo $error ?></div>

            <?php echo form_open('student/join_group', 'class="mdl-grid mdl-color-text--black"'); ?>

              <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input pattern="-?[0-9]*(\.[0-9]+)?" placeholder="Ex. 12345" value="<?php if(isset($_POST['group_code'])) echo $_POST['group_code'] ?>" class="mdl-typography--text-center mdl-textfield__input" type="text" minlength="6" maxlength="6" name="group_code" id="group_code">
                <label class="mdl-textfield__label" for="group_code">Group Code</label>
                <span class="mdl-textfield__error">Invalid group code</span>
              </div>

              <button style="border: 1px solid" type="submit" class="mdl-cell mdl-cell--12-col mdl-color-text--primary mdl-button mdl-js-button mdl-js-ripple-effect">
                Join
              </button>
            <?php echo form_close() ?>
          </section>

        </div>
      </div>
    </main>
  </div>
