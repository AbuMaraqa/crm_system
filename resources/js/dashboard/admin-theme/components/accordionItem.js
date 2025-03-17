
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

export default (id) => ({
  acc_id: id,
  get expanded() {
    return this.expandedItem === this.acc_id;
  },
  set expanded(val) {
    this.expandedItem = val ? this.acc_id : null;
  }
});
