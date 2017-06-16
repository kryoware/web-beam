<title>View Log | Beam</title>
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

        <section class="mdl-cell mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-cell--6-col-desktop mdl-cell--3-offset-desktop mdl-card mdl-shadow--4dp">
          <div class="mdl-card__title mdl-color--blue-grey mdl-color-text--white">
            <h2 class="mdl-card__title-text">Log Details</h2>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">assignment</i>
          </div>
          <div class="mdl-grid">
            <div class="mdl-cell--6-col-desktop mdl-cell--order-3-phone mdl-cell--order-3-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="moderator" value="<?php $d = strtotime($log->timestamp); echo date('m-d-y h:i:s:A',$d); ?>" readonly>
              <label class="mdl-textfield__label" for="moderator">Timestamp</label>
            </div>
            <div class="mdl-cell--6-col-desktop mdl-cell--order-3-phone mdl-cell--order-3-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="moderator" value="<?php echo $log->username ?>" readonly>
              <label class="mdl-textfield__label" for="moderator">Administrator</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell--order-2-phone mdl-cell--order-2-tablet mdl-cell mdl-cell--3-col-phone mdl-cell--4-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="group_name" value="<?php echo $log->action ?>" readonly>
              <label class="mdl-textfield__label" for="group_name">Action</label>
            </div>

            <div class="mdl-cell--12-col-desktop mdl-cell--order-4-phone mdl-cell--order-4-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <textarea class="mdl-textfield__input" type="text" rows= "3" id="details" readonly><?php echo $log->details ?></textarea>
              <label class="mdl-textfield__label" for="details">Details<label>
            </div>

            <a href="<?php echo base_url('admin/dashboard') ?>" class="mdl-cell--order-5-phone mdl-cell--order-5-tablet mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--white mdl-color--primary">
                Go back
            </a>

          </div>
        </section>
      </div>
    </div>
  </main>
</div>
