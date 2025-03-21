
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

export default (userOptions) => {
  const options = {
    content: userOptions.content,
    onSuccess: userOptions.success ?? function () {},
    onError: userOptions.error ?? function () {},
  };

  if (userOptions.content === "") return;

  if (typeof userOptions.content === "function") {
    userOptions.content = userOptions.content();
  }

  navigator.clipboard.writeText(options.content).then(
    function () {
      options.onSuccess();
    },
    function (err) {
      options.onError(err);
    }
  );
};
