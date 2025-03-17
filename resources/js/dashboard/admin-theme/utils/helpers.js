
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

export function toggleCode(e) {
  const card = e.target.closest(".card");
  const codeWrapper = card.querySelector(".code-wrapper");

  e.target.checked
    ? codeWrapper.classList.remove("hidden")
    : codeWrapper.classList.add("hidden");
}

export function getBrwoserScrollbarWidth() {
  return window.innerWidth - document.documentElement.clientWidth;
}
