
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

export default () => ({
  isActive: false,

  init() {
    if (!this.$el.href) return;

    this.isActive =
      this.$el.href.split("?")[0].split("#")[0] ===
      this.$store.global.currentLocation;
    if (this.isActive) {
      if (this.acc_id) this.expanded = true;
      this.$el.scrollIntoView({ block: "center" });
    }
  },
});
