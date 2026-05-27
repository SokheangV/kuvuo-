document.addEventListener("DOMContentLoaded", function () {
  var path = window.location.pathname.split("/").pop() || "privacy-policy.html";
  var navLinks = document.querySelectorAll("[data-page]");

  navLinks.forEach(function (link) {
    if (link.getAttribute("data-page") === path) {
      link.classList.add("active");
    }
  });

  var yearTarget = document.querySelector("[data-year]");
  if (yearTarget) {
    yearTarget.textContent = new Date().getFullYear();
  }

  var faqToggles = document.querySelectorAll(".faq-toggle");
  faqToggles.forEach(function (button) {
    button.addEventListener("click", function () {
      var item = button.closest(".faq-item");
      if (!item) {
        return;
      }

      var expanded = item.classList.toggle("open");
      button.setAttribute("aria-expanded", expanded ? "true" : "false");
    });
  });

  var tocLinks = Array.from(document.querySelectorAll(".toc a"));
  var sections = tocLinks
    .map(function (link) {
      var id = link.getAttribute("href");
      return id ? document.querySelector(id) : null;
    })
    .filter(Boolean);

  if (!tocLinks.length || !sections.length || !("IntersectionObserver" in window)) {
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }

        tocLinks.forEach(function (link) {
          link.classList.toggle(
            "active",
            link.getAttribute("href") === "#" + entry.target.id
          );
        });
      });
    },
    {
      rootMargin: "-20% 0px -60% 0px",
      threshold: 0.2
    }
  );

  sections.forEach(function (section) {
    observer.observe(section);
  });
});
