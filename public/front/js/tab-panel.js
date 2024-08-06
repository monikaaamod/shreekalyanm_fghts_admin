let totalTabsCount = 0;
  let activeTabIndex = 1;
  let tabChangeTimeout = 6000;

  totalTabsCount = $("#v-pills-tab .nav-link").length;

  function tabChangeHandler() {
    if (activeTabIndex == totalTabsCount) {
      activeTabIndex = 1;
    } else {
      activeTabIndex++;
    }
    $("#v-pills-tab .nav-link")
      .eq(parseInt(activeTabIndex - 1))
      .trigger("click");
  }

// let AUTO_CHANGE_TIMER = setInterval(tabChangeHandler, tabChangeTimeout);

// IF PAUSE AUTO CHANGE ON HOVER THEN FOLLOW BELOW CODE
    // $("#v-pills-tab .nav-link").hover(
    //   function () {
    //     clearInterval(AUTO_CHANGE_TIMER);
    //   },
    //   function () {
    //     AUTO_CHANGE_TIMER = setInterval(tabChangeHandler, tabChangeTimeout);
    //   }
    // );