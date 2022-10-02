const obserser = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("visible");
    } else {
      entry.target.classList.remove("visible");
    }
  });
});

setTimeout((e) => {
  const hiddenElements = document.querySelectorAll("#app hidden");

  hiddenElements.forEach((el) => obserser.observe(el));
}, 0);
