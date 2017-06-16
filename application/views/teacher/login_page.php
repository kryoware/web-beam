  <title>Teacher Login | Beam</title>
  </head>
  <body class="mdl-color--grey-100">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
      <header class="mdl-layout__header mdl-color--white">
        <div class="mdl-layout__header-row">
          <a href="<?php echo base_url() ?>">
            <i class="mdl-color-text--black material-icons">arrow_back</i>
          </a>
          <div class="mdl-layout-spacer"></div>
          <span class="logo">
            <a class="text-dark mdl-layout-title">beam</a>
          </span>
          <div class="mdl-layout-spacer"></div>
          <a href>
            <i class="mdl-color-text--black material-icons">menu</i>
          </a>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="page-content">
          <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--12-col"></div>

            <?php if(isset($_SESSION['server_message'])) { ?>
              <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--2-offset-desktop mdl-cell--12-col mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title mdl-color--green mdl-color-text--white">
                  <h2 class="mdl-card__title-text"><?php echo $_SESSION['server_message']; session_unset($_SESSION['server_message']); ?></h2>
                </div>
              </div>
            <?php } ?>

<!--             <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--2-offset-desktop mdl-cell--12-col mdl-card mdl-shadow--4dp">
              <div class="mdl-card__title mdl-color--blue mdl-color-text--white">
                <h2 class="mdl-card__title-text">Getting Started</h2>
              </div>
              <div class="getting-started">
                <div class="mdl-grid">
                  <p class="mdl-cell mdl-cell--12-col">
                    Welcome Ma'am / Sir, before you can start using BEAM here's a few things you need:<br>
                    <br>1. Your mobile phone
                    <br>2. A list of your subjects
                    <br>3. (Optional) A list of your students for each subject
                    <br><br>All set? Click the button below to signup!<br>
                  </p>
                  <a style="border: 1px solid" href="<?php echo base_url('teacher/signup') ?>" class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--flat mdl-js-ripple-effect mdl-color-text--blue">
                    Signup
                  </a>
                </div>
              </div>
            </div> -->

            <div class="mdl-color-text--white mdl-cell mdl-cell--4-col-desktop mdl-cell--4-offset-desktop mdl-cell--12-col mdl-card mdl-shadow--4dp">
              <div class="mdl-color--red mdl-card__title">
                <h2 class="mdl-color-text--white mdl-card__title-text">Teacher Login</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="mdl-color-text--white material-icons">work</i>
              </div>
              <div class="mdl-card__supporting-text getting-started">
                <?php echo form_open('teacher/login', 'class="mdl-grid"') ?>

                  <?php if(! is_null($msg)) { ?>
                  <div class="mdl-cell mdl-cell--12-col form-error mdl-typography--text-center">
                    <?php echo $msg ?>                  
                  </div>
                  <?php } ?>

                  <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--1-offset-desktop mdl-cell--12-col mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" value="<?php echo set_value('username') ?>" maxlength="5" minlength="5" pattern="[0-9]+" name="username" type="text" id="username">
                    <label class="mdl-textfield__label" for="username">ID Number</label>
                    <span class="mdl-textfield__error">Invalid ID Number</span>
                  </div>

                  <div class="mdl-cell mdl-cell--5-col mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" name="password" minlength="8" maxlength="24" type="password" id="password">
                    <label class="mdl-textfield__label" for="password">Password</label>
                    <span class="mdl-textfield__error">Password too short</span>
                  </div><br>

                  <button type="submit" class="mdl-color-text--white mdl-cell--1-offset-desktop mdl-cell mdl-cell--10-col mdl-button mdl-js-button mdl-button--colored mdl-color--primary mdl-js-ripple-effect">
                    Login
                  </button>
                </form>
              </div>
            </div>
          </div>
          <center>
            <a href="<?php echo base_url('teacher/signup') ?>">Sign up for an account</a>
          </center>
        </div>
      </main>
    </div>
