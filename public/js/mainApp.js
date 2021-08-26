$(".ui.checkbox").checkbox();

$("#userDropdown").dropdown({
  on: "hover",
});

$(".ui.inline.dropdown").dropdown({
  on: "hover",
});

$("#toast-status").toast({
    closeOnClick: true,
    displayTime: 4000,
    class: "#fb6400",
});

$("#toast-success").toast({
    closeOnClick: true,
    displayTime: 4000,
    class: "green",
});

$("#toast-error").toast({
    closeOnClick: true,
    displayTime: 4000,
    class: "red",
});

$(".ui.search").search({
    source: content,
    maxResults: 10,
});

