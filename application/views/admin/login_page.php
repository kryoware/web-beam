  <title>Admin Login | Beam</title>
  </head>
  <body class="mdl-color--grey-100">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-desktop-drawer-button">
      <header class="mdl-layout__header mdl-color--white">
        <div class="mdl-layout__header-row">
          <div class="mdl-layout-spacer"></div>
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

            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-offset-desktop mdl-cell--12-col mdl-card mdl-shadow--4dp">
              <div class="mdl-color-text--white mdl-color--primary mdl-card__title">
                <h2 class="mdl-color-text--white mdl-card__title-text">Admin Login</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">vpn_key</i>
              </div>
              <div class="mdl-card__supporting-text getting-started">
                <?php echo form_open('admin/login', 'class="mdl-grid"') ?>

                  <?php if(! is_null($msg)) { ?>
                  <div class="mdl-cell mdl-cell--12-col form-error mdl-typography--text-center">
                    <?php echo $msg ?>                  
                  </div>
                  <?php } ?>

                  <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--1-offset-desktop mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input pattern="[0-9]+" class="mdl-textfield__input" name="username" minlength="5" maxlength="5" type="text" id="username" value="<?php echo set_value('username') ?>">
                    <label class="mdl-textfield__label" for="username">ID Number</label>
                    <span class="mdl-textfield__error">Invalid ID Number</span>
                  </div>

                  <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="password" minlength="8" maxlength="24" type="password" id="password">
                    <label class="mdl-textfield__label" for="password">Password</label>
                    <span class="mdl-textfield__error">Password too short</span>
                  </div><br>

                  <button type="submit" class="mdl-cell--10-col-desktop mdl-cell--1-offset-desktop mdl-color-text--white mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--colored mdl-color--primary mdl-js-ripple-effect">
                    Login
                  </button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
