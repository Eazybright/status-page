<html>
  <head>
    <title>Status Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
    <script src="{{ asset("vendor/status-page/js/status-page.js") }}"></script>
  </head>
  <body>
    <div class="pageContainer">
      <div class="headline">
        <img src="logo.svg" alt="Logo" width="200px" />
        <span> System Status </span>
      </div>
      <div id="reports" class="reportContainer"></div>
      <div id="tooltip" class="tooltip" style="opacity: 0">
        <div id="tooltipArrow" class="tooltipArrow"></div>
        <div id="tooltipDateTime" class="tooltipDateTime"></div>
        <div id="tooltipStatus" class="tooltipStatus"></div>
        <hr />
        <div id="tooltipDescription" class="tooltipDescription"></div>
      </div>
      <div id="templates" style="display: none">
        <div
          id="statusSquareTemplate"
          class="statusSquare $color"
          data-status="$color"
        ></div>
        <div id="statusLineTemplate" class="statusLine"></div>
        <div
          id="statusStreamContainerTemplate"
          class="statusStreamContainer"
        ></div>
        <div id="statusContainerTemplate" class="statusContainer">
          <div class="statusHeader">
            <h6 class="statusTitle">$title&nbsp;</h6>
            <div class="$color statusHeadline">$status</div>
          </div>
          <div class="statusSubtitle">
            <div class="sectionUrl"><a href="$url">$url</a></div>
            <div class="statusUptime">$upTime in the last 30 days</div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      Forked from
      <a href="https://github.com/statsig-io/statuspage/"
        >Statsig's Open-Source Status Page</a
      >.
    </footer>
  </body>
  <script>
    genAllReports();
  </script>
</html>
